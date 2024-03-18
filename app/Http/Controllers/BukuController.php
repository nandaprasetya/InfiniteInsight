<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
use App\Models\KategoriBuku;
use App\Models\Peminjaman;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Notifications\PeminjamanNotification;
use Illuminate\Support\Facades\Notification;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Buku::with('kategori')->get();
        return view('user.buku')->with('items', $items)
        ->with('pageName','BookPage');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $items = KategoriBuku::all();
        return view('buku.formBuku')
        ->with('items', $items)
        ->with('pagetype', 'post');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $item = new Buku();
        $this->creup($request,$item,'post');
        return redirect(route('buku.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $buku = Buku::find($id);
        $kategoriTerpilih = DB::table('buku_relasi')
        ->where('buku_id', $id)
        ->pluck('kategori_id')
        ->toArray();
        $kategori = KategoriBuku::whereIn('id', $kategoriTerpilih)->get();
        return view('user.detailbuku')
        ->with('buku', $buku)
        ->with('kategoris', $kategori);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $buku = Buku::get();
        $field = Buku::find($id);
        $items = KategoriBuku::all();
        $kategoriTerpilih = DB::table('buku_relasi')
        ->where('buku_id', $id)
        ->pluck('kategori_id')
        ->toArray();
        return view('buku.formBuku')
        ->with('buku', $buku)
        ->with('pagetype', 'patch')
        ->with('items', $items)
        ->with('field', $field)
        ->with('kategoriTerpilih', $kategoriTerpilih);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $item = Buku::find($id);
        $this->creup($request,$item,'patch');
        return redirect(route('buku.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = Buku::find($id);
        $item->kategori()->detach();
        $item->delete();
        return redirect(route('buku.index'));
    }

    public function creup(Request $request,$item,$pagetype){
        \Validator::make($request->all(),[
            'judul' => 'required',
            'penulis' => 'required',
            'penerbit' => 'required',
            'cover' => 'image | mimes:jpeg,png,jpg,gif',
            'deskripsi' => 'required',
            'kategori' => 'required',
            'bahasa' => 'required',
            'file' => 'required',
            'halaman' => 'required'
        ])->setAttributeNames([
            'judul' => 'Judul',
            'penulis' => 'Penulis',
            'penerbit' => 'Penerbit',
            'cover' => 'Cover',
            'deskripsi' => 'Deskripsi',
            'kategori' => 'Kategori',
            'halaman' => 'Halaman'
        ])->validate();

        
        if($request->file('cover')){
            $cover = $request->file('cover');
            $filename = uniqid().'.'.$cover->getClientOriginalExtension();
            $path = $cover->storeAs('public/storage/buku', $filename);
            $item->cover = $filename;
        }elseif ($pagetype == 'patch') {
            
        }
        if($request->file('file')){
            $file = $request->file('file');
            $filename = uniqid().'.'.$file->getClientOriginalExtension();
            $path = $file->storeAs('public/storage/buku', $filename);
            $item->file = $filename;
        }
        $item->judul = $request->judul;
        $item->penulis = $request->penulis;
        $item->penerbit = $request->penerbit;
        $item->tahun_terbit = $request->tahun_terbit;
        $item->deskripsi = $request->deskripsi;
        $item->halaman = $request->halaman;
        $item->bahasa = $request->bahasa;
        $item->save();
        $item->kategori()->sync($request->kategori);
    }

    public function search(Request $request){
        $search = $request->input('search');
        $items = Buku::where('judul', 'like', '%'.$search.'%')->get();
        return view('user.search')
        ->with('bukus', $items)
        ->with('query', $search);
    }

    public function peminjamanform($id){
        $buku = Buku::find($id);
        return view('user.peminjaman')
        ->with('buku', $buku);
    }

    public function peminjaman(Request $request, $id){
        $item = new Peminjaman();
        $item->buku_id = $id;
        $buku = Buku::find($id);
        $user = User::find(Auth::id());
        $item->user_id = Auth::id();
        $item->tanggal_peminjaman = $request->tgl_pinjam;
        $item->tanggal_pengembalian = $request->tgl_kembali;
        $item->status_peminjaman = 'dipinjam';
        $item->save();
        Notification::route('mail', 'nandaprasetya712@gmail.com')
        ->notify(new PeminjamanNotification($buku, $user));
        return redirect(route('buku.index'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KategoriBuku;
use Illuminate\Support\Facades\Validator;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('kategori.formKategori');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kategori.formKategori');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $item = new KategoriBuku();
        $this->creup($request, $item, 'post');
        return redirect(route('kategori.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function creup(Request $request, $item, $pagetype){
        \Validator::make($request->all(),[
            'nama' => 'required',
            'icon' => 'required | image | mimes:jpeg,png,jpg,gif',
        ])->setAttributeNames([
            'nama' => 'nama',
            'icon' => 'icon'
        ])->validate();

        $item->nama_kategori = $request->nama;
        if($request->file('icon')){
            $image = $request->file('icon');
            $filename = uniqid().'.'.$image->getClientOriginalExtension();
            $path = $image->storeAs('public/storage', $filename);
            $item->icon = $filename;
        }
        $item->save();
    }
}

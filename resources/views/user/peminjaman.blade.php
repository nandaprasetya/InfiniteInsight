@extends('template.template')

@section('title', 'Peminjaman Buku')

@section('content')
    <form action="{{route('peminjaman', $buku->id)}}" method="post">
        @csrf
        <input type="date" name="tgl_pinjam" id="">
        <input type="date" name="tgl_kembali" id="">
        <button class="btn">Kirim</button>
    </form>
@endsection
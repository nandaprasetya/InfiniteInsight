@extends('template.template')

@section('title', 'Form Kategori | Infinite Insight')

@section('content')
    <form action="{{route('kategori.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="text" name="nama" placeholder="nama">
        <input type="file" name="icon" id="">
        <input type="submit" value="KIRIM">
    </form>
@endsection
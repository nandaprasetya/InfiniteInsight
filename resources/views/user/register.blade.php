@extends('template.template')

@section('title', 'Register | Infinite Insight')

@section('content')
    <form action="{{route('register')}}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="text" name="username" placeholder="username">
        <input type="email" name="email" placeholder="email" id="">
        <input type="password" name="password" placeholder="password" id="">
        <input type="text" name="nama" placeholder="nama">
        <input type="file" name="foto" id="">
        <input type="text" name="alamat" placeholder="alamat">
        <input type="submit" value="KIRIM">
    </form>
@endsection
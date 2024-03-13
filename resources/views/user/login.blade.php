@extends('template.template')

@section('title', 'Login | Infinite Insight')

@section('content')
    <form action="{{route('login')}}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="email" name="email" placeholder="email" id="">
        <input type="password" name="password" placeholder="password" id="">
        <input type="submit" value="KIRIM">
    </form>
@endsection
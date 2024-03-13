@extends('template.template')

@section('title', 'Login | Infinite Insight')

@section('content')
    <form action="{{route('admin.login')}}" method="post" enctype="multipart/form-data">
        @csrf
        <h1>Login Admin</h1>
        <input type="email" name="email" placeholder="email" id="">
        <input type="password" name="password" placeholder="password" id="">
        <input type="submit" value="KIRIM">
    </form>
@endsection
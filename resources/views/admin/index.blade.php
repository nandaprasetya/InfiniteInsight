@extends('template.template')

@section('title', 'Admin | Infinite Insight')

@section('content')
    <h1>Welcome Admin</h1>
    <a href="{{ route("admin.logout") }}">Logout</a>
@endsection

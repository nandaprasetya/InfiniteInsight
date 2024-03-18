@extends('template.template')

@section('title', 'Uprole')

@section('content')
    <form action="" method="post">
        @csrf
        <button type="submit">Kirim</button>
    </form>
@endsection
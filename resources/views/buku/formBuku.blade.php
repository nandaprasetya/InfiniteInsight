@extends('template.template')

@section('title', 'Form Buku | Infinite Insight')

@section('content')
    <form action="@if ($pagetype == 'patch') {{route('buku.update', $field->id)}} @else {{route('buku.store')}} @endif" method="post" enctype="multipart/form-data">
    @if($pagetype == "patch")    
        @method('patch')
    @endif
    @csrf
        <input type="text" @if($pagetype == 'patch') value="{{$field->judul}}" @endif name="judul" placeholder="judul">
        <input type="text" @if($pagetype == 'patch') value="{{$field->penulis}}" @endif name="penulis" placeholder="penulis">
        <input type="text" @if($pagetype == 'patch') value="{{$field->penerbit}}" @endif name="penerbit" placeholder="penerbit">
        <input type="date" @if($pagetype == 'patch') value="{{$field->tahun_terbit}}" @endif name="tahun_terbit" id="">
        <input type="text" @if($pagetype == 'patch') value="{{$field->deskripsi}}" @endif name="deskripsi" placeholder="deskripsi">
        <div class="form-group">
            <select name="kategori[]" style="width:300px;" multiple="multiple" class="select2 select2bs4" data-placeholder="Select a State" data-dropdown-css-class="select2-purple">
                @foreach($items as $item)
                <option value="{{$item->id}}" @if($pagetype == 'patch') {{ in_array($item->id, $kategoriTerpilih) ? 'selected' : ''}} @endif>{{$item->nama_kategori}}</option>
                @endforeach
            </select>
        </div>
        <input type="file" @if($pagetype == 'patch') value="{{$field->cover}}" @endif name="cover" id="">
        <input @if($pagetype == 'patch') value="{{$field->halaman}}" @endif type="number" name="halaman" id="">
        <input type="submit" value="KIRIM">
    </form>
@endsection
@section('script')
    <script>
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    });
    </script>
@endsection
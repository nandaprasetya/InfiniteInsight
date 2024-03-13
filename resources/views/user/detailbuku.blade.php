@extends('template.template')

@section('title', 'Buku '.$buku->judul)
@section('addcss')
    <link rel="stylesheet" href="{{asset('css/book.css')}}">
@endsection
@section('content')
    <div class="detail-buku container pt-5 d-flex flex-column align-items-center">
        <div class="area-cover col-12">
            <img class="col-4" id="cover-buku" src="{{asset('storage/storage/buku/'.$buku->cover)}}" alt="">
            <div class="judul-buku col-6 ">
                <h1 class="mb-3">{{$buku->judul}}</h1>
                <p class="mb-4">{{$buku->deskripsi}}</p>
                <!-- <h6 class="mb-4">{{$buku->penulis}}</h6> -->
                <div class="action-buku">
                    <a href="">Start reading
                        <img src="{{asset('asset/up-right-arrow.png')}}" alt="">
                    </a>
                    <div class="area-action-buku d-flex">
                        <div id="bookmark-btn" class="action-btn-buku d-flex justify-content-center align-items-center">
                            <img src="{{asset('asset/bookmark-buku.png')}}" alt="">
                        </div>
                        <div id="share-btn" class="action-btn-buku d-flex justify-content-center align-items-center">
                            <img src="{{asset('asset/share-btn.png')}}" alt="">
                        </div>
                    </div>
                </div>
                <div class="deskripsi-buku mt-5 d-flex">
                    <div class="col-6 d-flex flex-column">
                        <div class="box-deskripsi mb-4">
                            <h6>Penulis</h6>
                            <p>{{$buku->penulis}}</p>
                        </div>
                        <div class="box-deskripsi mb-4">
                            <h6>Tahun Terbit</h6>
                            <p>{{$buku->tahun_terbit}}</p>
                        </div>
                        <div class="box-deskripsi mb-4">
                            <h6>Kategori</h6>
                            <p> @foreach($kategoris as $kategori)
                                    {{$kategori->nama_kategori}} <br>
                                @endforeach
                            </p>
                        </div>
                    </div>
                    <div class="col-6 d-flex flex-column">
                        <div class="box-deskripsi mb-4">
                            <h6>Penerbit</h6>
                            <p>{{$buku->penerbit}}</p>
                        </div>
                        <div class="box-deskripsi mb-4">
                            <h6>Halaman</h6>
                            <p>{{$buku->halaman}} Halaman</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        let tinggi = $('#cover-buku').height();
        console.log(tinggi);
    </script>
@endsection
    @extends('template.template')

    @section('title', 'Explore Book')
    @section('addcss')
        <link rel="stylesheet" href="{{asset('css/book.css')}}">
    @endsection
    @section('content')
        <div class="header-search">
            <div class="sc-bg-ats d-flex align-items-end justify-content-center">
                <form action="{{ route('search')}}" method="GET" class="search d-flex align-items-center mb-0">
                    <button role="submit" id="search-icon" class="d-flex align-items-center">
                        <img src="{{asset('asset/search.png')}}" alt="">
                    </button>
                    <input type="text" name="search" value="{{$query}}" placeholder="Seach Book" id="search">
                    <div class="reset-search d-flex align-items-center justify-content-center">
                    <button type="reset" id="reset-search">
                        <img src="{{asset('asset/cross.png')}}" alt="">
                    </button>
                    </div>
                </form>
            </div>
            <div class="area-sf d-flex flex-column align-items-center">
                <h1>{{$query}}</h1>
            </div>
        </div>
        <div class="area-buku">
            <div id="area-buku" class="inner-area-buku">
                @foreach($bukus as $buku)
                <a href="{{ route('buku.show', $buku->id)}}" class="box-buku px-0 mx-2 my-3">
                    <img src="{{asset('storage/storage/buku/'.$buku->cover)}}" class="mb-2" alt="">
                    <h1>{{$buku->judul}}</h1>
                    <div class="area-penulis d-flex justify-content-between align-items-center">
                        <p class="col-8">{{$buku->penulis}}</p>
                        <div class="bookmark col-3">
                            <div class="me-3 col-6 d-flex align-items-center">
                                <img src="{{asset('asset/bookmark.png')}}" alt="">
                                <p class="ms-1">{{$buku->halaman}}</p>
                            </div>
                            <div class="d-flex col-6 align-items-center">
                                <img src="{{asset('asset/chat.png')}}" alt="">
                                <p class="ms-1">{{$buku->id}}</p>
                            </div>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
    @endsection
    @section('script')
        <script>
            $('#search').on('input', function () {
                    if ($(this).val().trim() !== '') {
                        $('#reset-search').css("display", "flex");
                    } else {
                        $('#reset-search').css("display", "none");
                    }
                });

                $('#reset-search').on('click', function () {
                    $('#reset-search').css("display", "none");
                });
        </script>
    @endsection
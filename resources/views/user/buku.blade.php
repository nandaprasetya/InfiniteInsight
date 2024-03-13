@extends('user.dashboard')

@section('contentdashboard')
    <div class="container-fluid d-flex flex-column">
        <a href="{{route('buku.create')}}" class="btn bg-primary mb-3">ADD BOOK</a>
        <form action="{{ route('search')}}" method="GET">
            <input type="text" name="search" id="search">
            <button type="submit">Kirim</button>
        </form>
        <table id="tableBuku" class="table table-striped row-border">
            <thead>
                <th>ID</th>
                <th>Judul</th>
                <th>Penulis</th>
                <th>Penerbit</th>
                <th>Tahun Terbit</th>
                <th>Kategori</th>
                <th>Halaman</th>
                <th>Action</th>
            </thead>
            <tbody>
                @foreach($items as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->judul}}</td>
                        <td>{{$item->penulis}}</td>
                        <td>{{$item->penerbit}}</td>
                        <td>{{$item->tahun_terbit}}</td>
                        <td> 
                            <div class="d-flex flex-column">
                                @foreach ($item->kategori as $kategori)
                                <p class="mb-1">{{ $kategori->nama_kategori}}</p>
                                @endforeach</td>
                            </div>
                        <td>{{$item->halaman}}</td>
                        <td>
                        <div class="d-flex align-items-center justify-content-evenly">
                            <a style="height:100%; aspect-ratio:1/1;" href="{{route('buku.edit',$item->id)}}" class="d-flex justify-content-center align-items-center bg-primary rounded px-2 py-2">
                                <i class="fa fa-cog"></i>
                            </a>
                            <form id="delete-cuti" action="{{route('buku.destroy',$item->id)}}" method="POST">
                                <button role="submit" style="height:100%; aspect-ratio:1/1;" class="d-flex justify-content-center align-items-center btn btn-danger px-2 py-2">
                                    @method('DELETE')
                                    @csrf
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                        </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
@section('script')
    <script>
        $("#tableBuku").DataTable({
            paging: true,
            lengthChange: false,
            searching: true,
            ordering: true,
            info: false,
            responsive: true
        });
    </script>
@endsection
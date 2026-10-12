@extends('layouts.app')
@section('title', 'Portal Berita')
@section('content')
    
<h2>Data Berita</h2>
<a href="{{ route('berita.create')}}" class="btn btn-primary mb-2 float-end">Buat Berita</a>
<table class="table table-stripped table-bordered">
    <thead class="table table-success">
        <tr>
            <th>No</th>
            <th>Judul</th>
            <th>Kategori</th>
            <th>Gambar</th>
            <th>Tanggal</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($berita as $index => $b)
            <tr>
                <td>{{$berita->firstItem() + $loop->index }}</td>
                <td>{{$b->judul}}</td>
                <td>{{$b->kategori->nama_kategori}}</td>
                <td>
                    <img src="{{ asset('storage/'.$b->gambar)}}" alt="" height="30px">
                </td>
                <td>{{$b->tanggal}}</td>
                <td>
                    <a href="{{ url('/berita/'.$b->id)}}" class="btn btn-outline-primary">Detail</a>
                    <a href="{{ route('berita.edit', $b->id)}}" class="btn btn-outline-warning">Edit</a>
                    <form action="{{ route('berita.destroy', $b->id)}}" method="post" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="delete" class="btn btn-outline-danger" onclick="return confirm('Yakin ingin menghapus ini?')">
                    </form>
                </td>
            </tr>
        @empty
            
        @endforelse
    </tbody>
</table>
{{$berita->links('pagination::bootstrap-5')}}
@endsection
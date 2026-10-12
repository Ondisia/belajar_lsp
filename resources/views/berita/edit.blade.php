@extends('layouts.app')
@section('title', 'Portal Berita')
@section('content')
    
<h2>Edit Berita</h2>
<form action="{{ route('berita.update', $berita->id)}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <input type="text" name="judul" id="" class="form-control mt-3" value="{{ $berita->judul}}" placeholder="Judul" required>
    <select name="kategori_id" id="" class="form-control mt-3">
        <option value="">Pilih Kategori</option>
        @foreach ($kategori as $k)
            <option value="{{$k->id}}"{{$berita->kategori_id == $k->id ? 'selected' : ''}}>{{$k->nama_kategori}}</option>
        @endforeach
    </select>
    <textarea name="isi" id="" cols="30" rows="10" class="form-control mt-3" placeholder="Isi"  required>{{$berita->isi}}</textarea>
    <p class="text-muted  small mt-2">File sebelumnya:<strong>{{$berita->gambar}}</strong></p>
    <input type="file" name="gambar" id="" class="form-control mt-3" >
    <input type="date" name="tanggal" value="{{ date('Y-m-d')}}" id="" class="form-control mt-3" required>
    <button type="submit" class="btn btn-primary form-control mt-3">Tambah</button>
</form>
@endsection
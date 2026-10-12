@extends('layouts.app')
@section('title', 'Portal Berita')
@section('content')
    
<h2>{{$berita->judul}}</h2>
<div>
    <img src="{{ url('storage/'.$berita->gambar)}}" alt="" style="border-radius: 5px" height="350px">
    <p>{{$berita->kategori->nama_kategori}}</p>
    <p class="fs-5 mt-4">{{$berita->isi}}</p>
    <p class="badge text-bg-secondary">{{$berita->tanggal}}</p>
    <p>Ditulis oleh <strong>{{$berita->penulis->nama}}</strong></p>
</div>
<a href="/" class="btn btn-primary">Kembali</a>
@endsection
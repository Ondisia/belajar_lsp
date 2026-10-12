@extends('layouts.app')
@section('title', 'Portal Berita')
@section('content')
<div class="row mb-4">
        <div class="col-md-6 offset-md-3">
            <form action="{{ url()->current() }}" method="GET">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Cari berita..." value="{{ request('search') }}">
                    <button class="btn btn-primary" type="submit">Cari</button>
                    @if(request('search'))
                        <a href="{{ url()->current() }}" class="btn btn-outline-secondary">Reset</a>
                    @endif
                </div>
            </form>
        </div>
    </div>
    <div class="row row-cols-md-3 g-3">
        @foreach ($berita as $b)
            <div class="col">
                <div class="card shadow-sm">
                    <img src="{{ url('storage/'.$b->gambar)}}" alt="" style="border-radius: 5px" height="300px">
                    <div class="card-body">
                        <h2>{{ $b->judul }}</h2>
                        <p>{{ Str::limit($b->isi, 100, '....')}}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <a href="{{ url('/berita/'.$b->id)}}" class="btn btn-sm btn-outline-secondary">
                                    Selengkapnya.....
                                </a>
                            </div>
                            <small class="text-muted small mt-3 btn-outline-secondary">{{$b->tanggal}}</small>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="d-flex justify-content-center mt-4">
        {{ $berita->appends(['search' => request('search')])->links('pagination::bootstrap-5') }}
    </div>
@endsection
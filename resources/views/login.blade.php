@extends('layouts.app')
@section('title', 'Portal Berita')
@section('content')
    
<h2>Login</h2>

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success')}}
    </div>
@endif
@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error')}}
    </div>
@endif

<form action="{{route('login')}}" method="POST">
    @csrf
    <input type="email" name="email" class="form-control mt-3" id="" placeholder="Email" required>
    <input type="password" name="password" class="form-control mt-3" id="" placeholder="Password" required>
    <button type="submit" class="btn btn-primary form-control mt-3">Login</button>
</form>
@endsection
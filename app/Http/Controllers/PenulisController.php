<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penulis;

class PenulisController extends Controller
{
    public function index()
    {
        if(session()->has('key')) {
            return redirect()->route('berita.index');
        }
        return view('login');
    }
    public function login(Request $request)
    {
        $key = Penulis::where('email', $request->email)->where('password', $request->password)->get();
        if(!$key->isEmpty()) {
            session()->put('key', $key);
            return redirect('/home');
        }
        return redirect('/login');
    }
    public function logout()
    {
        session()->flush();
        return redirect('/');
    }
}

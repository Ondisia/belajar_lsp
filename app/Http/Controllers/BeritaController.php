<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\Berita;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function welcome(Request $request)
    {
        $search = $request->input('search');

        $berita = Berita::when($search, function ($query, $search) {
            return $query->where('judul', 'like', "%{$search}%")->orWhere('isi', 'like', "%{$search}%");
        })
        ->latest()
        ->paginate(6);

        return view('welcome', compact('berita'));
    }

    public function home()
    {
        if(!session()->has('key')){
            return redirect()->route('login')->with('error', 'silahkan login terlebih dahulu');
        }
        return view('home');
    }

    public function about()
    {
        return view('about');
    }

    public function index(Request $request)
    {
    if (!session()->has('key')) {
        return redirect()->route('login')->with('error', 'Silahkan login terlebih dahulu');
        }

    $search = $request->input('search');

    $berita = Berita::when($search, function ($query, $search) {
        return $query->where('judul', 'like', "%{$search}%")->orWhere('isi', 'like', "%{$search}%");
    })
    ->latest()
    ->paginate(5);

    return view('berita.index', compact('berita'));
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = Kategori::all();
        return view('berita.create', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $gambar = $request->file('gambar')->store('images', 'public');
        $input = $request->all();
        $input ['gambar'] = "$gambar";
        $input ['penulis_id'] = session('key.0.id');

        Berita::create($input);
        return redirect()->route('berita.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $berita = Berita::find($id);
        $kategori = Kategori::all();
        return view('detail', compact('kategori','berita'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $berita = Berita::find($id);
        $kategori = Kategori::all();
        return view('berita.edit', compact('kategori','berita'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $berita = Berita::find($id);
        if ($request->hasFile('gambar'))
            {
                $gambar = $request->file('gambar')->store('images', 'public');
                $berita->gambar = $gambar;
            }
            $berita->kategori_id = $request->kategori_id;
            $berita->judul = $request->judul;
            $berita->isi = $request->isi;
            $berita->tanggal = $request->tanggal;
            $berita->save();

            return redirect()->route('berita.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $berita = Berita::destroy($id);
        return redirect()->back();
    }
}

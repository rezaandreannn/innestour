<?php

namespace App\Http\Controllers;

use App\Models\Wisata;
use Illuminate\Http\Request;

class WisataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $breadcrumbs = [
            'Dashboard' => route('dashboard'),
            'Wisata' => route('wisata.index')
        ];

        $theads = ['No', 'Nama paket', 'Obyek wisata', 'Tempat duduk', 'Harga', 'fasilitas', 'Aksi'];

        $wisatas = Wisata::all();

        return view('wisata.index', compact('wisatas', 'breadcrumbs', 'theads'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $breadcrumbs = [
            'Dashboard' => route('dashboard'),
            'Tambah' => route('wisata.create')
        ];
        return view('wisata.create', compact('breadcrumbs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        dd($request);
        $data = $request->validate([
            'image' => 'required|image|max:1024',
            'nama_obyek_wisata' => 'required',
            'durasi' => 'required',
        ]);

        $data['image'] = $request->file('image')->store('wisata/images');

        Wisata::create($data);

        return redirect()->route('wisata.index')->with('message', 'Berhasil menambahkan data wisata ');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Wisata  $wisata
     * @return \Illuminate\Http\Response
     */
    public function show(Wisata $wisata)
    {
        $breadcrumbs = [
            'Dashboard' => route('dashboard'),
            'Wisata' => route('wisata.index'),
            'Detail' => route('wisata.show', $wisata->id)
        ];

        return view('wisata.show', compact('wisata', 'breadcrumbs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Wisata  $wisata
     * @return \Illuminate\Http\Response
     */
    public function edit(Wisata $wisata)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Wisata  $wisata
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Wisata $wisata)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Wisata  $wisata
     * @return \Illuminate\Http\Response
     */
    public function destroy(Wisata $wisata)
    {

        // dd($wisata);
        Wisata::where('id', $wisata->id)
            ->delete();

        return redirect()->route('wisata.index')->with('message', 'Berhasil menghapus data wisata ');
    }
}

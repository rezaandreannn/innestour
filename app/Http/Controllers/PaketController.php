<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use Illuminate\Http\Request;

class PaketController extends Controller
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
            'Paket' => route('wisata.index')
        ];

        $theads = ['No', 'Nama paket', 'Nama program', 'Tempat duduk', 'Harga', 'fasilitas', 'Aksi'];

        $pakets = Paket::all();

        return view('paket.index', compact('pakets', 'breadcrumbs', 'theads'));
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
            'Paket' => route('paket.index'),
            'Tambah' => route('paket.create')
        ];

        return view('paket.create', compact('breadcrumbs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = $request->validate([
            'nama_paket' => 'required',
            'nama_program' => 'required',
            'tempat_duduk' => 'required|numeric',
            'harga' => 'required|numeric',
            'fasilitas' => 'required',
        ]);


        Paket::create($data);

        return redirect()->route('paket.index')->with('message', 'Berhasil menambahkan data paket ');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Paket  $paket
     * @return \Illuminate\Http\Response
     */
    public function show(Paket $paket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Paket  $paket
     * @return \Illuminate\Http\Response
     */
    public function edit(Paket $paket)
    {
        $breadcrumbs = [
            'Dashboard' => route('dashboard'),
            'Paket' => route('paket.index'),
            'Edit' => route('paket.edit', $paket->id)
        ];

        $paket = $paket;

        return view('paket.edit', compact('paket', 'breadcrumbs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Paket  $paket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Paket $paket)
    {

        $data = $request->validate([
            'nama_paket' => 'required',
            'nama_program' => 'required',
            'tempat_duduk' => 'required|numeric',
            'harga' => 'required|numeric',
            'fasilitas' => 'required',
        ]);

        Paket::where('id', $paket->id)
            ->update($data);


        return redirect()->route('paket.index')->with('message', 'Berhasil mengubah data paket ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Paket  $paket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Paket $paket)
    {
        Paket::where('id', $paket->id)
            ->delete();

        return redirect()->route('paket.index')->with('message', 'Berhasil menghapus data paket ');
    }
}

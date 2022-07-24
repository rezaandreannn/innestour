<?php

namespace App\Http\Controllers;

use App\Models\Wisata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

        $theads = ['No', 'gambar', 'Nama obyek wisata', 'Wilayah', 'Durasi', 'Aksi'];

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

        $data = $request->validate([
            'image' => 'required|image|max:1024',
            'wilayah' => 'required',
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

        $breadcrumbs = [
            'Dashboard' => route('dashboard'),
            'Wisata' => route('wisata.index'),
            'Edit' => route('wisata.show', $wisata->id)
        ];
        return view('wisata.edit', compact('wisata', 'breadcrumbs'));
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


        $data = $request->validate([
            'image' => 'image|file|max:1024',
            'wilayah' => 'required',
            'nama_obyek_wisata' => 'required',
            'durasi' => 'required',
        ]);


        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $data['image'] = $request->file('image')->store('wisata/images');
        } else {
            $data['image'] = $request->oldImage;
        }


        Wisata::where('id', $wisata->id)
            ->update($data);

        return redirect()->route('wisata.index')->with('message', 'Berhasil mengubah data wisata ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Wisata  $wisata
     * @return \Illuminate\Http\Response
     */
    public function destroy(Wisata $wisata)
    {

        if ($wisata->image) {
            Storage::delete($wisata->image);
        }

        Wisata::destroy($wisata->id);

        return redirect()->route('wisata.index')->with('message', 'Berhasil menghapus data wisata ');
    }
}

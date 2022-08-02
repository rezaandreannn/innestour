<?php

namespace App\Http\Controllers;

use App\Models\DetailPaket;
use App\Models\Paket;
use App\Models\Wisata;
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
            'Dashboard' => route('dashboard.index'),
            'Paket' => route('wisata.index')
        ];

        $theads = ['No', 'Nama paket', 'Program', 'Tempat duduk', 'Harga', 'fasilitas', 'Aksi'];

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
            'Dashboard' => route('dashboard.index'),
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
            'nama_paket' => ['required', 'string', 'max:255', 'unique:pakets'],
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
        // $breadcrumbs = [
        //     'Dashboard' => route('dashboard.index'),
        //     'Paket' => route('paket.index'),
        //     'detail' => route('paket.show', $paket->id)
        // ];

        // $details = DetailPaket::where('paket_id', $paket->id)
        //     ->get();

        // return view('paket.show', compact('paket', 'breadcrumbs', 'details'));
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
            'Dashboard' => route('dashboard.index'),
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
            'harga' => 'required|numeric',
            'fasilitas' => 'required',
            'wisata' => 'required'
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

    public function createDetail()
    {
        //     $breadcrumbs = [
        //         'Dashboard' => route('dashboard.index'),
        //         'Paket' => route('paket.index'),
        //         'Create Detail' => route('detail.create')
        //     ];
        //     $pakets = Paket::pluck('id', 'nama_paket');

        //     // dd($pakets);
        //     $wisatas = Wisata::orderBy('nama_obyek_wisata', 'asc')->get();

        //     return view('detailpaketwisata.create', compact('pakets', 'wisatas', 'breadcrumbs'));
        // }
    }

    public function storeDetailPaket(Request $request)
    {

        // $wisata_id[] = $request->wisata_id;

        // dd($request->wisata_id);

        //     $data = $request->validate([
        //         'paket_id' => 'required',
        //         'wisata_id' => 'required',
        //     ]);


        //     $data['wisata_id'] = $request->input('wisata_id');

        //     DetailPaket::create($data);



        //     return back()->with('message', 'berhasil menambahkan obyek wisata ke paket');
        // }
    }
}

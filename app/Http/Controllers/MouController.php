<?php

namespace App\Http\Controllers;

use App\Models\Balasan;
use App\Models\Mou;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MouController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mous = Mou::with('user')->get();
        $breadcrumbs = [
            'Dashboard' => route('dashboard'),
            'MOU' => route('mou.index')
        ];

        $theads = ['No', 'Nama User', 'Logo', 'Nama Perusahaan', 'Dokumen', 'Di buat', 'Status', 'Aksi'];


        return view('mou.index', compact('breadcrumbs', 'theads', 'mous'));
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
            'MOU' => route('mou.index'),
            'Tambah' => route('mou.create')
        ];

        return view('mou.create', compact('breadcrumbs'));
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
            'user_id' => '',
            'logo' => 'image|file|max:1024',
            'nama_perusahaan' => 'required',
            'email_perusahaan' => ['required', 'string', 'email', 'max:255', 'unique:mous'],
            'no_hp_perusahaan' => 'required|numeric',
            'dokumen' => 'required|mimes:pdf|max:1024'
        ]);

        if ($request->file('logo')) {
            $data['logo'] = $request->file('logo')->store('mou/logo');
        }

        $data['user_id'] = Auth::user()->id;
        $data['dokumen'] = $request->file('dokumen')->store('mou/dokumen');

        $mou = Mou::with('user')->get();

        foreach ($mou as $value) {
            if ($value->user_id == Auth::user()->id) {
                return redirect()->route('mou.create')->with('message', 'Anda sudah melakukan kerjasama bersama kami. Terimakasih 👍');
            } else {
                Mou::create($data);
            }
        }


        return redirect()->route('mou.index')->with('message', 'berhasil menambahkan data MOU');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mou  $mou
     * @return \Illuminate\Http\Response
     */
    public function show(Mou $mou)
    {

        $breadcrumbs = [
            'Dashboard' => route('dashboard'),
            'MOU' => route('mou.index'),
            'Detail' => route('mou.show', $mou->id)
        ];

        return view('mou.balasan-form', compact('breadcrumbs', 'mou'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mou  $mou
     * @return \Illuminate\Http\Response
     */
    public function edit(Mou $mou)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mou  $mou
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mou $mou)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mou  $mou
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mou $mou)
    {
        //
    }

    public function approve(Request $request)
    {
        $id = $request->input('id');
        $nama = $request->input('nama_perusahaan');

        $data =  $request->validate([
            'deskripsi' => 'required',
            'dokumen' => 'required|mimes:pdf|max:1024'
        ]);

        $data['dokumen'] = $request->file('dokumen')->store('mou/dokumen/balasan');

        $data['user_id'] = Auth::user()->id;
        $data['mou_id'] = $id;

        Balasan::create($data);

        Mou::where('id', $id)->update([
            'status' => 'approve'
        ]);

        // foreach (Mou::all() as $key) {
        //     if ($key->status == 'approve') {
        //         return redirect()->route('mou.index')->with('failed', 'anda sudah melakukan acc pada perusahaan ' . $nama . ' ');
        //     } else {
        //         Mou::where('id', $id)->update([
        //             'status' => 'approve'
        //         ]);
        //     }
        // }

        return redirect()->route('mou.index')->with('success', 'Berhasil malakukan acc pada perusahan   ' . $nama . ' ');
    }
}
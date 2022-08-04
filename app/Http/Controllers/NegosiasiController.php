<?php

namespace App\Http\Controllers;

use App\Models\Negosiasi;
use App\Models\Paket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NegosiasiController extends Controller
{

    public function index()
    {

        $breadcrumbs = [
            'Dashboard' => route('dashboard.index'),
            // 'Negosiasi' => route('wisata.index')
        ];

        $theads = ['No', 'Nama Pemesan', 'Paket',  'Harga', 'Status', 'Aksi'];
        $negosiasis = Negosiasi::all();

        // dd($negosiasis);
        return view('negosiasi.index', compact('negosiasis', 'breadcrumbs', 'theads'));
    }

    public function create($paket_id)
    {

        $paket = Paket::where('id', $paket_id)->first();

        $harga_default = (int)$paket->harga;

        $hargas = [
            1 => $harga_default - 2000,
            2 => $harga_default - 3000,
            3 => $harga_default - 4000,
        ];

        return view('negosiasi.create', compact('paket', 'hargas'));
    }
    public function store(Request $request)
    {

        $paket = $request->input('paket_id');
        // dd($paket);

        $data =  $request->validate([
            'harga' => 'required'
        ]);

        $data['user_id'] = Auth::user()->id;
        $data['paket_id'] = $paket;

        Negosiasi::create($data);

        return redirect()->back()->with('message', 'berhasil');
    }

    public function update(Request $request, $id)
    {
        Negosiasi::where('id', $id)
            ->update([
                'status' => $request->input('status')
            ]);

        return redirect()->back()->with('message', 'Berhasil melakukan acc ');
    }
}

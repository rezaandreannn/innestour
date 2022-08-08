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
        if (Auth::user()->role_id == 1) {
            $breadcrumbs = [
                'Dashboard' => route('dashboard.index'),
            ];

            $theads = ['No', 'Nama Pemesan', 'Paket',  'Harga', 'Status', 'Aksi'];
            $negosiasis = Negosiasi::all();

            return view('negosiasi.index', compact('negosiasis', 'breadcrumbs', 'theads'));
        }

        $negosiasis = Negosiasi::where('user_id', Auth::user()->id)->get();

        return view('frondend.negosiasi', compact('negosiasis'));
    }

    public function create($paket_id)
    {

        $paket = Paket::where('id', $paket_id)->first();



        return view('negosiasi.create', compact('paket'));
    }
    public function store(Request $request)
    {

        $paket = $request->input('paket_id');

        $ambil_paket = Paket::where('id', $paket)->first();
        $harga_paket = $ambil_paket->harga;
        $nilai = (95 / 100) * $harga_paket;


        $data =  $request->validate([
            'harga' => 'required'
        ]);

        if ($data['harga'] < $nilai) {
            return redirect()->back()->withErrors(['harga' => 'Harga yang anda masukan lebih dari 5%']);
        }

        $neg = Negosiasi::where([
            'user_id' => Auth::user()->id,
            'paket_id' => $paket
        ])->first();

        if ($neg) {
            return redirect()->back()->with('message', 'Anda sudah melakukan penawaran pada paket ini.');
        }


        $data['user_id'] = Auth::user()->id;
        $data['paket_id'] = $paket;



        Negosiasi::create($data);

        return redirect()->route('negosiasi.index')->with('message', 'berhasil mengajukan penawaran');
    }

    public function update(Request $request, $id)
    {
        if ($request->status == 'acc') {
            $keterangan = 'selamat penawaran anda diterima oleh admin';
        } else {
            $keterangan = 'maaf penawaran anda tidak diterima oleh admin';
        }

        Negosiasi::where('id', $id)
            ->update([
                'status' => $request->input('status'),
                'keterangan' => $keterangan
            ]);

        return redirect()->back()->with('message', 'Berhasil melakukan perubahan pada penawaran');
    }

    public function destroy(Negosiasi $negosiasi)
    {
        Negosiasi::where('id', $negosiasi->id)
            ->delete();


        return redirect()->route('negosiasi.index')->with('message', 'Berhasil menghapus data penawaran ');
    }
}

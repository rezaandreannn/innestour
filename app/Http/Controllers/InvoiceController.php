<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Negosiasi;
use App\Models\Paket;
use App\Models\User;
use App\Models\Wisata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InvoiceController extends Controller
{
    public function detail($paket_id)
    {

        $paket_id = Paket::where('id', $paket_id)->first();
        $paket = Paket::find($paket_id)->first();
        // dd($paket_id);


        $negosiasi =  Negosiasi::where([
            'user_id' => Auth::user()->id,
            'paket_id' => $paket_id->id
        ])->first();

        // dd($negosiasi);
        // )
        // ->orWhere(')
        // ->first();

        if ($negosiasi) {
            if ($negosiasi->status == 'acc') {
                $paket_r = $negosiasi;
            } else {
                $paket_r = $paket_id;
            }
        } else {
            $paket_r = $paket;
        }

        // dd($paket);

        return view('frondend.invoice', compact('paket_r', 'paket'));
    }

    public function store(Request $request)
    {

        $paket_id = $request->input('paket_id');
        // $user = User::where('id', Auth::user()->id)->first();

        // $paket = Paket::find($paket_id);

        // ubah int
        $paket_harga = (int)$request->harga;
        $kursi = (int)$request->kursi;

        $total = $paket_harga * $kursi;

        // dd($total);
        $data =  $request->validate([
            'kursi' => 'required',
            'tgl_berangkat' => 'required'
        ]);
        dd($data);

        $data['user_id'] = Auth::user()->id;
        $data['paket_id'] = $paket_id;
        $data['total_tagihan'] = $total;

        Invoice::create($data);

        return view('frondend.invoice_berhasil');

        // dd($total);


        // dd($paket);
        // $data =  $request->validate([
        //     'wisata_id' => 'required',
        //     'kursi' => 'required'
        // ]);



        // foreach ($request->wisata_id as $key => $value) {
        //     $data = new Invoice();
        //     $data->paket_id = $paket_id;
        //     $data->user_id = $user->id;
        //     $data->wisata_id = $value;
        //     $data->kursi = $request->kursi;
        //     $data->total_tagihan = $total;
        //     $data->save();




        //     [
        //         'user_id' => $user->id,
        //         'paket_id' => $paket_id,
        //         'wisata_id' => $value,
        //         'kursi' => $request->kursi
        //     ];
        //     Invoice::create($data);
        // }

        // $data['paket_id'] = $paket_id;
        // $data['user_id'] = $user->id;
    }
}

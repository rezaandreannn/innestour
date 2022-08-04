<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Paket;
use App\Models\Wisata;
use App\Models\Invoice;
use App\Models\Negosiasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class InvoiceController extends Controller
{

    public function index(Request $request)
    {

        if (Auth::user()->role_id == 1) {

            $tgl_aktif = Carbon::now();
            $data = Invoice::with('user')->where('tgl_berangkat', '<', $tgl_aktif)
                ->where('status', 'pending')
                ->get();
            if ($data) {
                foreach ($data as $value) {
                    $value->delete();
                }
            }

            $theads = ['No', 'Nama User', 'Nama paket', 'Kursi', 'Total tagihan', 'Status', 'Bukti', 'Tgl', 'Aksi'];
            $breadcrumbs = [
                'Dashboard' => route('dashboard.index'),
                'Pembayaran' => route('invoice.index')
            ];

            $invoices = Invoice::orderBy('created_at', 'desc')->get();

            return view('admin.invoice.index', compact('invoices', 'theads', 'breadcrumbs'));
        }

        // user
        $bayar = $request->bayar;
        if (!$bayar) {
            $bayar = 'pending';
        }

        $invoices = Invoice::where('user_id', Auth::user()->id)
            ->where('status', $bayar)
            ->orderBy('created_at', 'desc')
            ->get();

        $tgl_aktif = Carbon::now();
        $data = Invoice::where('tgl_berangkat', '<', $tgl_aktif)
            ->where('status', 'pending')
            ->get();
        if ($data) {
            foreach ($data as $value) {
                $value->delete();
            }
        }

        return view('frondend.invoices.index', compact('invoices'));
    }

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

        // dd($request);
        $paket_id = $request->input('paket_id');
        // ubah int
        $paket_harga = (int)$request->harga;
        $kursi = (int)$request->kursi;

        $total = $paket_harga * $kursi;

        $data =  $request->validate([
            'kursi' => 'required',
            'tanggal' => 'required',
            'waktu' => 'required'
        ]);

        $now = Carbon::now();

        $tgl_berangkat = date("Y-m-d H:i:s", strtotime($request->tanggal . " " . $request->waktu));

        if ($tgl_berangkat <= $now) {
            return back()->withErrors(['tanggal' => '
            tanggal yang anda masukan sudah terlewati']);
        }

        $data['user_id'] = Auth::user()->id;
        $data['paket_id'] = $paket_id;
        $data['tgl_berangkat'] = $tgl_berangkat;
        $data['total_tagihan'] = $total;

        Invoice::create($data);

        $tanggal = $data['tgl_berangkat'];

        $day = date('D', strtotime($tanggal));
        $dayList = array(
            'Sun' => 'Minggu',
            'Mon' => 'Senin',
            'Tue' => 'Selasa',
            'Wed' => 'Rabu',
            'Thu' => 'Kamis',
            'Fri' => 'Jumat',
            'Sat' => 'Sabtu'
        );

        // dd($dayList[$day]);
        $hari = $dayList[$day];

        $waktu = date('H:i', strtotime($tanggal));
        $tanggal = date('d-m-Y', strtotime($tanggal));

        // get paket;
        $nama_paket = Paket::where('id', $paket_id)->pluck('nama_paket')->first();

        $limit = date('d-m-Y', strtotime('-2 days', strtotime($tanggal)));
        // dd($limit);

        return view('frondend.invoice_berhasil', compact('data', 'hari', 'waktu', 'tanggal', 'nama_paket'))->with('message', 'bayar sebelum tanggal ' . $limit . ' ');
    }

    public function edit(Invoice $invoice)
    {
        if (Auth::user()->role_id == 1) {
            return view('admin.invoice.cek', compact('invoice'));
        }

        // dd($invoice);
        return view('frondend.invoices.bayar', compact('invoice'));
    }

    public function update(Request $request, Invoice $invoice)
    {

        if (Auth::user()->role_id == 1) {
            $data = $request->validate([
                'status' => 'required',
            ]);

            Invoice::where('id', $invoice->id)
                ->update($data);

            return redirect()->route('invoice.index')->with('message', ' Berhasil melakukan acc');
        }

        // user
        $data = $request->validate([
            'bank' => 'required',
            'bukti' => 'image|file|max:1024',

        ]);

        $data['bukti'] = $request->file('bukti')->store('invoice/bukti');

        Invoice::where('id', $invoice->id)
            ->update($data);

        return redirect()->route('invoice.index')->with('message', 'Yey, Berhasil melakukan pembayaran');
    }

    public function destroy(Invoice $invoice)
    {


        Invoice::where('id', $invoice->id)
            ->delete();

        return back()->with('message', 'berhasil menghapus pesanan anda');
    }
}

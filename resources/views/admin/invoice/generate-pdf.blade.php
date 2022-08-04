<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kuitansi Pembayaran</title>

    <style type="text/css">
        .lead {
            font-family: "Verdana";
            font-weight: bold;
        }

        .value {
            font-family: "Verdana";
        }

        .value-big {
            font-family: "Verdana";
            font-weight: bold;
            font-size: large;
        }

        .td {
            valign: "top";
        }

        hr.new2 {
            border-top: 1px dashed rgb(74, 68, 165);
        }



        /* @page { size: with x height */
        /*@page { size: 20cm 10cm; margin: 0px; }*/
        @page {
            size: A4;
            margin: 0px;
        }

        /*		@media print {
          html, body {
              width: 210mm;
          }
        }*/
        /*body { border: 2px solid #000000;  }*/
    </style>
</head>

<body>
    {{-- <div width="80px" class="header">
        <img class="kolom" src="{{ asset('frondend/img/asita.png') }}" width="80px" />
        <h5 class="kolom">fjkdfds</h5>
    </div> --}}
    <table border="0">
        <tr>
            <td>
                <table cellpadding="3">
                    <tr>
                        <td width="200px">
                            <div class="lead"> <img class="kolom" src="{{ asset('frondend/img/asita.png') }}"
                                    width="100%" />
                        </td>
                        <td>
                            <div class="value">
                                <h1>
                                    <strong>Innes Arsen Wisata </strong> <br>
                                </h1>
                                <span style="color: #FA3C3C"> Event For Family, School, University and Company

                                </span> <br>
                                <span>
                                    Alamat : Jln. Tawes No 38. Iringmulyo, Metro Timur, Kota Metro.
                                    <br>
                                    HP: 081379879199
                                    <br>
                                    <a href="mailto:ptinnesarsenwisata@gmail.com">
                                        Email : ptinnesarsenwisata@gmail.com
                                    </a>
                                </span>
                            </div>
                        </td>
                    </tr>

                </table>
            </td>
        </tr>
    </table>
    <hr class="new2">

    <table border="0">
        <tr>
            <td>
                <table cellpadding="4">
                    <tr>
                        <td width="200px">
                            <div class="lead">
                        </td>
                        <td>
                            <div class="value"></div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="lead">Kode Pesan</div>
                        </td>
                        <td>
                            <div class="value">: {{ $invoice->kode }}</div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="lead">Telah terima dari</div>
                        </td>
                        <td>
                            <div class="value">: {{ $invoice->user->name }}</div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="lead">Untuk Pembayaran</div>
                        </td>
                        <td>
                            <div class="value">: Tour Paket {{ $invoice->paket->nama_paket }}</div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="lead">Jumlah Kursi</div>
                        </td>
                        <td>
                            <div class="value">: {{ $invoice->kursi }} Kursi</div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="lead">Tanggal berangkat</div>
                        </td>
                        <td>
                            <div class="value">: {{ date('d/m/Y', strtotime($invoice->tgl_berangkat)) }}</div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="lead">Waktu berangkat</div>
                        </td>
                        <td>
                            <div class="value">: {{ date('H:i', strtotime($invoice->tgl_berangkat)) }} wib</div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="lead">Rupiah</div>
                        </td>
                        <td>
                            <div class="value-big">: @currency($invoice->total_tagihan)</div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="lead">Uang Sejumlah</div>
                        </td>
                        <td>
                            <div class="value">: {{ $terbilang }} rupiah</div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">&nbsp;</td>
                    </tr>
                    <tr>
                        <td>
                            <div class="lead"></div>
                        </td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>LUNAS</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>
                            <div class="value"></div>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

    {{-- <table width="800" border="0" cellpadding="4" cellspacing="0" style="border: 1px solid #000;">
        <tr>
            <td rowspan="6" width="120" style="border-right:1px solid #000;"> </td>
            <td width="150" valign="top"> Tanggal </td>
            <td valign="top"> : 1 </td>
        </tr>
        <tr>
            <td valign="top"> Telah Diterima Dari </td>
            <td valign="top"> : {{ $invoice->user->name }} </td>
        </tr>
        <tr>
            <td valign="top"> Uang Sejumlah </td>
            <td valign="top"> : {{ $terbilang }}</td>
        </tr>
        <tr>
            <td valign="top"> Untuk Pembayaran </td>
            <td valign="top"> : {{ $invoice->paket->nama_paket }}</td>
        </tr>
        <tr>
            <td valign="bottom">
                <h3>@currency($invoice->total_tagihan) </h3>
            </td>
            <td valign="top" align="right" height="100"> Metro,
                {{ date('d-m-Y', strtotime($invoice->updated_at)) }} </td>
        </tr>
    </table>
    <style>
        a {
            text-decoration: none;
            color: #0903E8;
            font-family: verdana;
        }

        a:hover {
            color: #FA3C3C;
        }
    </style> --}}

    {{-- <div class="logo">
        <img alt="image" src="{{ asset('frondend/img/asita.png') }}" class="rounded-circle mr-1" width="70px">
        <h5>Innes Tour </h5>
    </div>
    <h5>Kuitansi</h5>
    <p>{{ $invoice->user->name }}</p>
    <p>{{ $terbilang }}</p> --}}
</body>

</html>

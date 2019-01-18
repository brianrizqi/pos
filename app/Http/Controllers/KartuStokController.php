<?php

namespace App\Http\Controllers;

use App\Barang;
use App\Kartu_Stok;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KartuStokController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barang = Barang::all();
        return view('kartu_stok', ['barang' => $barang]);
    }

    public function fetch($id)
    {
        $data = DB::table('detail_pembelians')
            ->join('pembelians', function ($join) {
                $join->on('detail_pembelians.id_pembelian', '=', 'pembelians.id_pembelian');
            })
            ->join('barangs', function ($join) {
                $join->on('detail_pembelians.id_barang', '=', 'barangs.id_barang');
            })
            ->where('detail_pembelians.id_barang', $id)
            ->get();
        $no = 0;
        $output = '<table class="table sparkle-table">
                                        <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal</th>
                                            <th>No Faktur</th>
                                            <th>Keterangan</th>
                                            <th>Masuk</th>
                                            <th>Keluar</th>
                                            <th>Saldo</th>
                                        </tr>
                                        </thead>
                                        <tbody>';
        foreach ($data as $item) {
            $no++;
            $output .= '                     <tr>
                                            <td>' . $no . '</td>
                                            <td>' . $item->tanggal . '</td>
                                            <td>'.$item->id_pembelian.'</td>
                                            <td></td>
                                            <td>' . $item->jumlah . '</td>
                                            <td></td>
                                            <td>'.$item->stok.'</td>
                                        </tr>';
        }
        $output .= '
                                        </tbody>
                                    </table>';
        echo $output;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kartu_Stok $kartu_Stok
     * @return \Illuminate\Http\Response
     */
    public function show(Kartu_Stok $kartu_Stok)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kartu_Stok $kartu_Stok
     * @return \Illuminate\Http\Response
     */
    public function edit(Kartu_Stok $kartu_Stok)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Kartu_Stok $kartu_Stok
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kartu_Stok $kartu_Stok)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kartu_Stok $kartu_Stok
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kartu_Stok $kartu_Stok)
    {
        //
    }
}

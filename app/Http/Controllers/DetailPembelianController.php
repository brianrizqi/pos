<?php

namespace App\Http\Controllers;

use App\Detail_Pembelian;
use App\Pembelian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Cart;

class DetailPembelianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pembelian = Pembelian::join('suppliers', function ($join) {
            $join->on('pembelians.id_supplier', '=', 'suppliers.id');
        })
            ->orderBy('pembelians.created_at', 'DESC')
            ->get();
        return view('detail_pembelian', ['pembelian' => $pembelian]);
    }

    public function pdf($id)
    {
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($this->
        convert_barang($id));
        return $pdf->stream();
    }

    function convert_barang($id)
    {
        $pembelians = DB::table('detail_pembelians')
            ->join('barangs', function ($join) {
                $join->on('barangs.id_barang', '=', 'detail_pembelians.id_barang');
            })
            ->where('detail_pembelians.id_pembelian', $id)
            ->get();
        $pembelian = DB::table('detail_pembelians')
            ->join('pembelians', function ($join) {
                $join->on('pembelians.id_pembelian', '=', 'detail_pembelians.id_pembelian');
            })
            ->join('suppliers', function ($join) {
                $join->on('suppliers.id', '=', 'pembelians.id_supplier');
            })
            ->where('detail_pembelians.id_pembelian', $id)
            ->first();
        if ($pembelian->sisa_piutang == 0) {
            $lunas = "Lunas";
        } else {
            $lunas = "Belum lunas";
        }
        $output = '
        <div class="datatable-dashv1-list custom-datatable-overright">
                                <div id="toolbar" style="text-align: justify">
                                    <label style="font-size: 15pt;">No Faktur : ' . $pembelian->id_pembelian . '</label>
                                    <br>
                                    <label style="font-size: 15pt;">Tanggal : ' . $pembelian->tanggal . '</label>
                                    <br>
                                    <label style="font-size: 15pt;">Supplier : ' . $pembelian->nama . '</label>
                                    <br>
                                    
                                    <label style="font-size: 15pt;">Status : ' . $lunas . '</label>
                                </div>
                                <table id="table" data-toggle="table" data-toolbar="#toolbar">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Barang</th>
                                        <th>Nama Barang</th>
                                        <th>Jumlah</th>
                                        <th>Harga Beli</th>
                                        <th>Diskon Satu</th>
                                        <th>Diskon Dua</th>
                                        <th>Total</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    
        ';
        $no = 0;
        foreach ($pembelians as $item) {
            $no++;
            $output .= '
            
                                        <tr>
                                            <td>' . $no . '</td>
                                            <td>' . $item->id_barang . '</td>
                                            <td>' . $item->nama_barang . '</td>
                                            <td>' . $item->jumlah . '</td>
                                            <td>Rp. ' . number_format($item->harga_beli, 0, ".", ".") . '</td>
                                            <td>' . $item->diskon_satu . '%</td>
                                            <td>Rp. ' . number_format($item->diskon_dua, 0, ".", ".") . '</td>
                                            <td>Rp. ' . number_format($item->total_harga, 0, ".", ".") . '</td>
                                        </tr>';
        }
        $output .= '</tbody>
                                </table>
                            </div>';
        return $output;

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
     * @param  \App\Detail_Pembelian $detail_Pembelian
     * @return \Illuminate\Http\Response
     */
    public function show(Detail_Pembelian $detail_Pembelian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Detail_Pembelian $detail_Pembelian
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $hutang = Pembelian::join('suppliers', function ($join) {
            $join->on('pembelians.id_supplier', '=', 'suppliers.id');
        })
            ->where('id_pembelian', $id)
            ->first();
        return view('hutang_pembelian', ['hutang' => $hutang]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Detail_Pembelian $detail_Pembelian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $sisa = Pembelian::where('id_pembelian', $id)
            ->first();
        $barang = DB::table('pembelians')
            ->where('id_pembelian', $id)->
            update([
                'sisa_piutang' => $sisa->sisa_piutang - $request->bayar,
            ]);
        return redirect('detail_pembelian');
    }

    public function barang($id, $id_pembelian)
    {
        $barang = DB::table('detail_pembelians')
            ->join('barangs', function ($join) {
                $join->on('detail_pembelians.id_barang', '=', 'barangs.id_barang');
            })
            ->where('detail_pembelians.id_barang', $id)
            ->where('detail_pembelians.id_pembelian', $id_pembelian)
            ->first();
        $output = '<div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-3">
                                                                <label class="login2 pull-right pull-right-pro">Stok</label>
                                                            </div>
                                                            <div class="col-lg-9">
                                                                <input type="number" class="form-control" name="telepon"
                                                                       placeholder="Telepon" value="' . $barang->stok . '"
                                                                       disabled/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-3">
                                                                <label class="login2 pull-right pull-right-pro">Pembelian</label>
                                                            </div>
                                                            <div class="col-lg-9">
                                                                <input type="number" class="form-control" name="telepon"
                                                                       placeholder="Telepon" value="' . $barang->jumlah . '"
                                                                       disabled/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-3">
                                                                <label class="login2 pull-right pull-right-pro">Jumlah</label>
                                                            </div>
                                                            <div class="col-lg-9">
                                                                <input type="number" class="form-control" name="retur"
                                                                       placeholder="Jumlah Retur Barang"
                                                                       max="' . $barang->jumlah . '" required/>
                                                            </div>
                                                        </div>
                                                    </div>';
        echo $output;
    }

    public function retur($id)
    {
        $data = Cart::getContent();
        $barang = DB::table('detail_pembelians')
            ->join('barangs', function ($join) {
                $join->on('detail_pembelians.id_barang', '=', 'barangs.id_barang');
            })
            ->where('detail_pembelians.id_pembelian', $id)
            ->get();
        return view('retur_pembelian', ['data' => $barang, 'barang' => $data, 'id' => $id]);
    }

    public function returBarang(Request $request)
    {
        $retur = DB::table('retur_pembelian')
            ->insert([
                'id_retur' => $request->id_retur,
                'id_pembelian' => $request->id_pembelian,
                'tanggal' => date('Y-m-d'),
                'total' => $request->total
            ]);
        $id_retur = DB::table('retur_pembelian')
            ->where('id_pembelian', $request->id_pembelian)
            ->orderBy('created_at', 'DESC')
            ->take(1)
            ->first();
        $data = Cart::getContent();
        foreach ($data as $item) {
            $barang = DB::table('barangs')
                ->where('id_barang', $item->id)
                ->first();
            $pembelian = DB::table('detail_pembelians')
                ->where('id_pembelian', $request->id_pembelian)
                ->where('id_barang', $item->id)
                ->first();
            $stok = DB::table('barangs')
                ->where('id_barang', $item->id)
                ->update([
                    'stok' => $barang->stok - $item->quantity,
                ]);
            $jumlah = DB::table('detail_pembelians')
                ->where('id_pembelian', $request->id_pembelian)
                ->where('id_barang', $item->id)
                ->update([
                    'jumlah' => $pembelian->jumlah - $item->quantity
                ]);
            $detail = DB::table('detail_retur_pembelian')
                ->insert([
                    'id_retur' => $id_retur->id_retur,
                    'id_barang' => $item->id,
                    'jumlah' => $item->quantity,
                    'total_harga' => $item->quantity * $item->price
                ]);
        }
        Cart::clear();
        return redirect('detail_pembelian');
    }

    public function tambahBarang(Request $request)
    {
        $barang = DB::table('barangs')
            ->where('id_barang', $request->id_barang)
            ->first();
        $add = Cart::add([
            'id' => $request->id_barang,
            'price' => $barang->harga_beli,
            'name' => $barang->nama_barang,
            'quantity' => $request->retur
        ]);
        if ($add) {
            return redirect('detail_pembelian/retur/' . $request->id_pembelian);
        }
    }

    public function hapusBarang($id, $id_pembelian)
    {
        Cart::remove($id);
        return redirect('detail_pembelian/retur/' . $id_pembelian);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Detail_Pembelian $detail_Pembelian
     * @return \Illuminate\Http\Response
     */
    public function destroy(Detail_Pembelian $detail_Pembelian)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Detail_Pembelian;
use App\Pembelian;
use App\Supplier;
//use Darryldecode\Cart\Cart;
use Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PembelianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $supplier = Supplier::all();
        $data = Cart::getContent();
        return view('pembelian', ['supplier' => $supplier], ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $barang = DB::table('barangs')
            ->where('id_supplier', $id)
            ->get();
        return view('create_pembelian', ['barang' => $barang]);
    }

    public function barang($id)
    {
        $data = DB::table('barangs')
            ->where('id_barang', $id)
            ->first();
        $harga = $data->harga_beli;
        $output = '<div class="form-group-inner">
                                                    <div class="row">
                                                        <div class="col-lg-3">
                                                            <label class="login2 pull-right pull-right-pro">Harga Beli</label>
                                                        </div>
                                                        <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                                                                <div class="input-group">
                                                                    <span class="input-group-addon">Rp.</span>
                                                            <input type="number" id="harga" class="form-control diskon" name="harga_beli"
                                                                   placeholder="Harga Beli"
                                                                   value="' . $harga . '" required/>
                                                             </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-3">
                                                                <label class="login2 pull-right pull-right-pro">Satuan</label>
                                                            </div>
                                                            <div class="col-lg-9">
                                                                <select class="form-control custom-select-value"
                                                                        name="satuan">
                                                                        <option>' . $data->satuan_satu . '</option>
                                                                        <option>' . $data->satuan_dua . '</option>
                                                                        <option>' . $data->satuan_tiga . '</option>
                                                                        <option>' . $data->satuan_empat . '</option>
</select>
                                                            </div>
                                                        </div>
                                                    </div>';
        echo $output;
    }

    public function fetch($id)
    {
//        $value = $_GET['id'];
        $data = DB::table('suppliers')
            ->where('id', $id)
            ->first();
        $output = '<table class="table sparkle-table">
<tr>
<td>Alamat</td>
<td>' . $data->alamat . '</td>
</tr>
<tr>
<td>Telepon Perusahaan</td>
<td>' . $data->telepon . '</td>
</tr>
<tr>
<td>Nama CP</td>
<td>' . $data->nama_cp . '</td>
</tr>
<tr>
<td>Telepon CP</td>
<td>' . $data->telepon_cp . '</td>
</tr>
</table>';
        echo $output;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function tambahBarang(Request $request)
    {
        $barang = DB::table('barangs')
            ->where('id_barang', $request->id_barang)
            ->first();
        $diskon = $request->diskon_satu / 100 * $request->harga_beli;
        $add = Cart::add([
            'id' => $request->id_barang,
            'price' => $request->harga_beli,
            'name' => $barang->nama_barang,
            'quantity' => $request->jumlah,
            'attributes' => [
                'satuan' => $request->satuan,
                'diskon_satu' => $request->diskon_satu,
                'diskon_dua' => $diskon
            ]
        ]);
        if ($add) {
            return redirect('pembelian');
        }
    }

    public function store(Request $request)
    {
        $pembelian = new Pembelian();
        $pembelian->id_pembelian = $request->id_pembelian;
        $pembelian->id_supplier = $request->id_supplier;
        $pembelian->no_bukti = $request->no_bukti;
        $pembelian->tanggal = $request->tanggal;
        $pembelian->biaya_kirim = $request->biaya_kirim;
        $pembelian->diskon_satu = $request->diskon_satu;
        $pembelian->diskon_dua = $request->diskon_dua;
        $pembelian->jenis_transaksi = $request->jenis_transaksi;
        $pembelian->jatuh_tempo = $request->jatuh_tempo;
        $pembelian->neto = $request->neto;
        $pembelian->uang_muka = $request->uang_muka;
        $pembelian->sisa_piutang = $request->sisa_piutang;
        $pembelian->total = $request->total;
        $pembelian->save();
        $idpembelian = DB::table('pembelians')
            ->where('id_supplier', $request->id_supplier)
            ->orderBy('created_at', 'DESC')
            ->take(1)
            ->first();
        $data = Cart::getContent();
        foreach ($data as $item) {
            $stok = DB::table('barangs')->where("id_barang", $item->id)
                ->first();
            $barang = DB::table('barangs')
                ->where('id_barang', $item->id)
                ->update([
                    'stok' => $stok->stok + $item->quantity,
                    'harga_beli' => $item->price
                ]);
            $detail = new Detail_Pembelian();
            $detail->id_pembelian = $idpembelian->id_pembelian;
            $detail->id_barang = $item->id;
            $detail->jumlah = $item->quantity;
            $detail->satuan = $item->attributes['satuan'];
            $detail->diskon_satu = $item->attributes['diskon_satu'];
            $detail->diskon_dua = $item->attributes['diskon_dua'];
            $detail->total_harga = $item->price * $item->quantity;
            $detail->save();
        }
        Cart::clear();
        return redirect('barang');
    }

    public function clear()
    {
        Cart::clear();
        return redirect('pembelian');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pembelian $pembelian
     * @return \Illuminate\Http\Response
     */
    public function show(Pembelian $pembelian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pembelian $pembelian
     * @return \Illuminate\Http\Response
     */
    public function edit(Pembelian $pembelian)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Pembelian $pembelian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pembelian $pembelian)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pembelian $pembelian
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pembelian $pembelian)
    {
        //
    }
}

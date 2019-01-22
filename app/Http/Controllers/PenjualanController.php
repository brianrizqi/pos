<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Detail_Penjualan;
use App\Penjualan;
use Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customer = Customer::all();
        $data = Cart::getContent();
        return view('penjualan', ['customer' => $customer], ['data' => $data]);
    }

    public function fetch($id)
    {
        $data = DB::table('customer')
            ->where('id_customer', $id)
            ->first();
        $output = '<table class="table sparkle-table">
<tr>
<td>Alamat</td>
<td>' . $data->alamat . '</td>
</tr>
<tr>
<td>Telepon</td>
<td>' . $data->telepon . '</td>
</tr>
<tr>
<td>Keterangan</td>
<td>' . $data->keterangan . '</td>
</tr>
<tr>
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
        $barang = DB::table('barangs')
            ->get();
        return view('create_penjualan', ['barang' => $barang]);
    }

    public function tambahBarang(Request $request)
    {
        $barang = DB::table('barangs')
            ->where('id_barang', $request->id_barang)
            ->first();
        $add = Cart::add([
            'id' => $request->id_barang,
            'price' => $request->harga_jual,
            'name' => $barang->nama_barang,
            'quantity' => $request->jumlah
        ]);
        if ($add) {
            return redirect('penjualan');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $penjualan = new Penjualan();
        $penjualan->id_penjualan = $request->id_penjualan;
        $penjualan->id_customer = $request->id_customer;
        $penjualan->tanggal = $request->tanggal;
        $penjualan->total = $request->total;
        $penjualan->save();
        $idpenjualan = DB::table('penjualans')
            ->where('id_customer', $request->id_customer)
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
                    'stok' => $stok->stok - $item->quantity,
                ]);
            $detail = new Detail_Penjualan();
            $detail->id_penjualan = $idpenjualan->id_penjualan;
            $detail->id_barang = $item->id;
            $detail->jumlah = $item->quantity;
            $detail->total_harga = $item->price * $item->quantity;
            $detail->save();
        }
        Cart::clear();
        return redirect('detail_penjualan');
    }

    public function barang($id)
    {
        $data = DB::table('barangs')
            ->where('id_barang', $id)
            ->first();
        $harga = $data->harga_jual;
        $output = '<div class="form-group-inner">
                                                    <div class="row">
                                                        <div class="col-lg-3">
                                                            <label class="login2 pull-right pull-right-pro">Harga Jual</label>
                                                        </div>
                                                        <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                                                                <div class="input-group">
                                                                    <span class="input-group-addon">Rp.</span>
                                                            <input type="number" id="harga" class="form-control diskon" name="harga_jual"
                                                                   placeholder="Harga Jual"
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Penjualan $penjualan
     * @return \Illuminate\Http\Response
     */
    public function show(Penjualan $penjualan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Penjualan $penjualan
     * @return \Illuminate\Http\Response
     */
    public function edit(Penjualan $penjualan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Penjualan $penjualan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Penjualan $penjualan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Penjualan $penjualan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Penjualan $penjualan)
    {
        //
    }

    public function detail_barang($id)
    {
        $penjualan = Detail_Penjualan::where('id_penjualan',$id)
            ->first();
        return view('detail_penjualan_barang', ['penjualan' => $penjualan]);
    }
}

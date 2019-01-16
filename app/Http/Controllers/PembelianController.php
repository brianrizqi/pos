<?php

namespace App\Http\Controllers;

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
                                                        <div class="col-lg-9">
                                                            <input type="number" class="form-control" name="harga_beli"
                                                                   placeholder="Harga Beli"
                                                                   value="' . $harga . '" required/>
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
    public function store(Request $request)
    {
//        $cart = $request->session()->get('cart');
//        $cart [$request->id_barang] = array(
//            'id_barang' => $request->id_barang,
//            'harga_beli'=>$request->harga_beli,
//            'satuan'=>$request->satuan,
//            'jumlah'=>$request->jumlah
//        );
//
//        $request->session()->put('cart',$cart);
//        $request->session()->flash('success','barang berhasil ditambahkan');
        $barang = DB::table('barangs')
            ->where('id_barang', $request->id_barang)
            ->first();

        $add = Cart::add([
            'id' => $request->id_barang,
            'price' => $request->harga_beli,
            'name' => $barang->nama_barang,
//            'quantitiy' => $request->satuan,
            'quantity' => $request->jumlah,
            'attributes' => [
                'satuan' => $request->satuan
            ]
        ]);
        if ($add) {
            return redirect('pembelian');
        }
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

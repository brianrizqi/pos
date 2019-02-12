<?php

namespace App\Http\Controllers;

use App\HutangPembelian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HutangPembelianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hutang = DB::table('hutang_pembelian')
            ->join('pembelians', function ($join) {
                $join->on('pembelians.id_pembelian', '=', 'hutang_pembelian.id_pembelian');
            })
            ->join('suppliers', function ($join) {
                $join->on('suppliers.id', '=', 'pembelians.id_supplier');
            })
            ->select('hutang_pembelian.id_pembelian', 'hutang_pembelian.tanggal',
                'suppliers.nama', 'hutang_pembelian.total_bayar', 'pembelians.sisa_piutang')
            ->get();
        return view('hutang', ['hutang' => $hutang]);
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
     * @param  \App\HutangPembelian $hutangPembelian
     * @return \Illuminate\Http\Response
     */
    public function show(HutangPembelian $hutangPembelian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\HutangPembelian $hutangPembelian
     * @return \Illuminate\Http\Response
     */
    public function edit(HutangPembelian $hutangPembelian)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\HutangPembelian $hutangPembelian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HutangPembelian $hutangPembelian)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\HutangPembelian $hutangPembelian
     * @return \Illuminate\Http\Response
     */
    public function destroy(HutangPembelian $hutangPembelian)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Retur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReturController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $retur = DB::table('retur_pembelian')
            ->join('pembelians', function ($join) {
                $join->on('pembelians.id_pembelian', '=', 'retur_pembelian.id_pembelian');
            })
            ->join('suppliers', function ($join) {
                $join->on('suppliers.id', '=', 'pembelians.id_supplier');
            })
            ->select('retur_pembelian.tanggal', 'retur_pembelian.id_retur',
                'suppliers.nama', 'retur_pembelian.id_pembelian', 'retur_pembelian.total')
            ->orderBy('retur_pembelian.created_at', "DESC")
            ->get();
        return view('retur', ['retur' => $retur]);
    }

    public function detail($id)
    {
        $retur = DB::table('detail_retur_pembelian')
            ->join('barangs', function ($join) {
                $join->on('barangs.id_barang', '=', 'detail_retur_pembelian.id_barang');
            })
            ->where('detail_retur_pembelian.id_retur', $id)
            ->get();
        return view('detail_retur_pembelian', ['retur' => $retur]);
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
     * @param  \App\Retur $retur
     * @return \Illuminate\Http\Response
     */
    public function show(Retur $retur)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Retur $retur
     * @return \Illuminate\Http\Response
     */
    public function edit(Retur $retur)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Retur $retur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Retur $retur)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Retur $retur
     * @return \Illuminate\Http\Response
     */
    public function destroy(Retur $retur)
    {
        //
    }
}

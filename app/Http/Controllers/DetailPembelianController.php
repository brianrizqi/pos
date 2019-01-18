<?php

namespace App\Http\Controllers;

use App\Detail_Pembelian;
use App\Pembelian;
use Illuminate\Http\Request;

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
            ->orderBy('pembelians.created_at','DESC')
            ->get();
        return view('detail_pembelian', ['pembelian' => $pembelian]);
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
    public function edit(Detail_Pembelian $detail_Pembelian)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Detail_Pembelian $detail_Pembelian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Detail_Pembelian $detail_Pembelian)
    {
        //
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

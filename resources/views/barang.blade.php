@extends('layout.app')
@section('title','POS')
@section('fitur','Barang')
@section('content')
    <div class="data-table-area mg-b-15">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="sparkline13-list shadow-reset">
                        <div class="sparkline13-hd">
                            <div class="main-sparkline13-hd">
                                <h1>Tabel <span class="table-project-n">Barang</span></h1>
                            </div>
                        </div>
                        <div class="sparkline13-graph">
                            <div class="datatable-dashv1-list custom-datatable-overright">
                                <div id="toolbar">
                                    <a href="/barang/create" class="btn btn-sm btn-primary login-submit-cs">
                                        Tambah
                                    </a>
                                </div>
                                <table id="table" data-toggle="table" data-pagination="true" data-search="true"
                                       data-toolbar="#toolbar">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Barang</th>
                                        <th>Nama Perusahaan</th>
                                        <th>Kategori</th>
                                        <th>Harga Beli</th>
                                        <th>Harga Jual</th>
                                        <th>Laba</th>
                                        <th>Stok </th>
                                        <th>Satuan Dua</th>
                                        <th>Satuan Tiga</th>
                                        <th>Satuan Empat</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $no = 0?>
                                    @foreach($barang as $item)
                                        <?php
                                        $no++?>
                                        <tr>
                                            <td>{{$no}}</td>
                                            <td>{{$item->nama_barang}}</td>
                                            <td>{{$item->nama}}</td>
                                            <td>{{$item->kategori}}</td>
                                            <td>Rp. {{number_format($item->harga_beli,0,".",".")}}</td>
                                            <td>Rp. {{number_format($item->harga_jual,0,".",".")}}</td>
                                            <td>{{$item->laba}} %</td>
                                            @if($item->satuan_terakhir == $item->satuan_satu)
                                                <td>{{$item->stok ." ".$item->satuan_satu}}</td>
                                                @if($item->stok_dua == "")
                                                    <td></td>
                                                @else
                                                    <td>{{floor($item->stok/$item->stok_dua)." ".$item->satuan_dua." / ".$item->stok_dua." ".$item->satuan_turunan_dua}}</td>
                                                @endif
                                                @if($item->stok_tiga== "")
                                                    <td>{{$item->satuan_tiga}}</td>
                                                @else
                                                    <td>{{floor($item->stok/$item->stok_tiga/$item->stok_dua)." ".$item->satuan_tiga." / ".$item->stok_tiga." ".$item->satuan_turunan_tiga}}</td>
                                                @endif
                                                @if($item->stok_empat =="")
                                                    <td>{{$item->satuan_empat}}</td>
                                                @else
                                                    <td>{{floor($item->stok / $item->stok_empat / $item->stok_tiga / $item->stok_dua)." ".$item->satuan_empat." / ".$item->stok_empat." ".$item->satuan_turunan_empat}}</td>
                                                @endif
                                            @elseif($item->satuan_terakhir == $item->satuan_dua)
                                                <td>{{$item->stok ." ".$item->satuan_satu}}</td>
                                                <td>{{floor($item->stok/$item->stok_dua)." ".$item->satuan_dua." / ".$item->stok_dua." ".$item->satuan_turunan_dua}}</td>
                                                <td>{{$item->satuan_tiga}}</td>
                                                <td>{{$item->satuan_empat}}</td>
                                            @elseif($item->satuan_terakhir == $item->satuan_tiga)
                                                @if($item->satuan_turunan_tiga == $item->satuan_satu)
                                                    <td>{{$item->stok ." ".$item->satuan_satu}}</td>
                                                    <td>{{floor($item->stok/$item->stok_dua)." ".$item->satuan_dua." / ".$item->stok_dua." ".$item->satuan_turunan_dua}}</td>
                                                    <td>{{floor($item->stok/$item->stok_tiga)." ".$item->satuan_tiga." / ".$item->stok_tiga." ".$item->satuan_turunan_tiga}}</td>
                                                    <td>{{$item->satuan_empat}}</td>
                                                @else
                                                    <td>{{$item->stok ." ".$item->satuan_satu}}</td>
                                                    <td>{{floor($item->stok/$item->stok_dua)." ".$item->satuan_dua." / ".$item->stok_dua." ".$item->satuan_turunan_dua}}</td>
                                                    <td>{{floor($item->stok/$item->stok_tiga/$item->stok_dua)." ".$item->satuan_tiga." / ".$item->stok_tiga." ".$item->satuan_turunan_tiga}}</td>
                                                    <td>{{$item->satuan_empat}}</td>
                                                @endif
                                            @elseif($item->satuan_terakhir == $item->satuan_empat)
                                                @if($item->satuan_turunan_empat == $item->satuan_satu)
                                                    <td>{{$item->stok ." ".$item->satuan_satu}}</td>
                                                    <td>{{floor($item->stok/$item->stok_dua)." ".$item->satuan_dua." / ".$item->stok_dua." ".$item->satuan_turunan_dua}}</td>
                                                    <td>{{floor($item->stok/$item->stok_tiga/$item->stok_dua)." ".$item->satuan_tiga." / ".$item->stok_tiga." ".$item->satuan_turunan_tiga}}</td>
                                                    <td>{{floor($item->stok / $item->stok_empat)." ".$item->satuan_empat." / ".$item->stok_empat." ".$item->satuan_turunan_empat}}</td>
                                                @elseif($item->satuan_turunan_empat == $item->satuan_dua)
                                                    <td>{{$item->stok ." ".$item->satuan_satu}}</td>
                                                    <td>{{floor($item->stok/$item->stok_dua)." ".$item->satuan_dua." / ".$item->stok_dua." ".$item->satuan_turunan_dua}}</td>
                                                    <td>{{floor($item->stok/$item->stok_tiga/$item->stok_dua)." ".$item->satuan_tiga." / ".$item->stok_tiga." ".$item->satuan_turunan_tiga}}</td>
                                                    <td>{{floor($item->stok / $item->stok_dua / $item->stok_empat)." ".$item->satuan_empat." / ".$item->stok_empat." ".$item->satuan_turunan_empat}}</td>
                                                @elseif($item->satuan_turunan_tiga == $item->satuan_satu)
                                                    <td>{{$item->stok ." ".$item->satuan_satu}}</td>
                                                    <td>{{floor($item->stok/$item->stok_dua)." ".$item->satuan_dua." / ".$item->stok_dua." ".$item->satuan_turunan_dua}}</td>
                                                    <td>{{floor($item->stok/$item->stok_tiga/$item->stok_dua)." ".$item->satuan_tiga." / ".$item->stok_tiga." ".$item->satuan_turunan_tiga}}</td>
                                                    <td>{{floor($item->stok / $item->stok_tiga / $item->stok_empat)." ".$item->satuan_empat." / ".$item->stok_empat." ".$item->satuan_turunan_empat}}</td>
                                                @else
                                                    <td>{{$item->stok ." ".$item->satuan_satu}}</td>
                                                    <td>{{floor($item->stok/$item->stok_dua)." ".$item->satuan_dua." / ".$item->stok_dua." ".$item->satuan_turunan_dua}}</td>
                                                    <td>{{floor($item->stok/$item->stok_tiga/$item->stok_dua)." ".$item->satuan_tiga." / ".$item->stok_tiga." ".$item->satuan_turunan_tiga}}</td>
                                                    <td>{{floor($item->stok / $item->stok_empat / $item->stok_tiga / $item->stok_dua)." ".$item->satuan_empat." / ".$item->stok_empat." ".$item->satuan_turunan_empat}}</td>
                                                @endif
                                            @endif
                                            <td>
                                                <form action="/barang/edit/{{$item->id_barang}}" method="get">
                                                    <button class="btn btn-primary" style="width: 37px;">
                                                        <i class="fa fa-pencil-square-o"></i>
                                                    </button>
                                                </form>
                                                {{--<a href="/barang/edit/{{$item->id_barang}}" class="btn btn-primary">--}}
                                                {{--<i class="fa fa-pencil-square-o" style="color: #fff;"></i>--}}
                                                {{--</a>--}}
                                                <form action="/barang/{{$item->id_barang}}" method="POST">
                                                    <button class="btn btn-danger">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                    {{csrf_field()}}
                                                    <input type="hidden" name="_method" value="DELETE">
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
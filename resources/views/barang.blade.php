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
                                        <th>Ukuran</th>
                                        <th>Stok (pack/gr)</th>
                                        <th>Stok (pres/kg)</th>
                                        <th>Stok (bal)</th>
                                        <th>Stok (box)</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $no = 0?>
                                    @foreach($barang as $item)
                                        <?php $no++?>
                                        <tr>
                                            <td>{{$no}}</td>
                                            <td>{{$item->nama_barang}}</td>
                                            <td>{{$item->nama}}</td>
                                            <td>{{$item->kategori}}</td>
                                            <td>Rp. {{number_format($item->harga_beli,0,".",".")}}</td>
                                            <td>Rp. {{number_format($item->harga_jual,0,".",".")}}</td>
                                            <td>{{$item->laba}} %</td>
                                            <td>{{$item->ukuran}}</td>
                                            <td>{{$item->stok}}</td>
                                            <td>
                                                {{floor(($item->stok)/10)}}
                                            </td>
                                            <td>
                                                {{floor(($item->stok)/200)}}
                                            </td>
                                            <td>
                                                {{floor(($item->stok)/40)}}
                                            </td>
                                            <td>
                                                <a href="/barang/edit/{{$item->id_barang}}" class="btn btn-primary">
                                                    <i class="fa fa-pencil-square-o" style="color: #fff;"></i>
                                                </a>
                                                <form action="/barang/{{$item->id_barang}}" method="POST">
                                                    <input class="btn btn-danger" type="submit" name="submit"
                                                           value="Delete">
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
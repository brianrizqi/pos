@extends('layout.app')
@section('title','POS')
@section('fitur','Retur Pembelian')
@section('content')
    <div class="data-table-area mg-b-15">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="sparkline13-list shadow-reset">
                        <div class="sparkline13-hd">
                            <div class="main-sparkline13-hd">
                                <h1>Tabel <span class="table-project-n">Retur Pembelian</span></h1>
                            </div>
                        </div>
                        <div class="sparkline13-graph">
                            <div class="datatable-dashv1-list custom-datatable-overright">
                                <div id="toolbar">
                                </div>
                                <table id="table" data-toggle="table" data-pagination="true" data-search="true"
                                       data-toolbar="#toolbar">
                                    <thead>
                                    <tr>
                                        <th>No Retur</th>
                                        <th>No Faktur</th>
                                        <th>Tanggal</th>
                                        <th>Supplier</th>
                                        <th>Total</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($retur as $item)
                                        <tr>
                                            <td>{{$item->id_retur}}</td>
                                            <td>{{$item->id_pembelian}}</td>
                                            <td>{{$item->tanggal}}</td>
                                            <td>{{$item->nama}}</td>
                                            <td>Rp. {{number_format($item->total,0,".",".")}}</td>
                                            <td>
                                                <a href="{{route('detail_retur')}}" class="btn btn-primary">
                                                    <i class="fa fa-eye" style="color: white"></i>
                                                </a>
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

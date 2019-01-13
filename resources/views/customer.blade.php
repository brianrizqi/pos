@extends('layout.app')
@section('title','POS')
@section('fitur','Customer')
@section('content')
    <div class="data-table-area mg-b-15">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="sparkline13-list shadow-reset">
                        <div class="sparkline13-hd">
                            <div class="main-sparkline13-hd">
                                <h1>Tabel <span class="table-project-n">Customer</span></h1>
                            </div>
                        </div>
                        <div class="sparkline13-graph">
                            <div class="datatable-dashv1-list custom-datatable-overright">
                                <div id="toolbar">
                                    <a href="/customer/create" class="btn btn-sm btn-primary login-submit-cs">
                                        Tambah
                                    </a>
                                </div>
                                <table id="table" data-toggle="table" data-pagination="true" data-search="true"
                                       data-toolbar="#toolbar">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Alamat</th>
                                        <th>Telepon</th>
                                        <th>Kategori</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $no = 0?>
                                    @foreach($customer as $item)
                                        <?php $no++?>
                                        <tr>
                                            <td>{{$no}}</td>
                                            <td>{{$item->nama}}</td>
                                            <td>{{$item->email}}</td>
                                            <td>{{$item->alamat}}</td>
                                            <td>{{$item->telepon}}</td>
                                            <td>{{$item->keterangan}}</td>
                                            <td>
                                                <a href="/customer/edit/{{$item->id_customer}}" class="btn btn-primary">
                                                    <i class="fa fa-pencil-square-o" style="color: #fff;"></i>
                                                </a>
                                                <form action="/customer/{{$item->id_customer}}" method="POST">
                                                    <input class="btn btn-danger" type="submit" name="submit"
                                                           value="delete">
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
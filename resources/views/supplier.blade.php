@extends('layout.app')
@section('title','POS')
@section('fitur','Supplier')
@section('content')
    <div class="data-table-area mg-b-15">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="sparkline13-list shadow-reset">
                        <div class="sparkline13-hd">
                            <div class="main-sparkline13-hd">
                                <h1>Tabel <span class="table-project-n">Supplier</span></h1>
                            </div>
                        </div>
                        <div class="sparkline13-graph">
                            <div class="datatable-dashv1-list custom-datatable-overright">
                                <div id="toolbar">
                                    <a href="/supplier/create" class="btn btn-sm btn-primary login-submit-cs">
                                        Tambah
                                    </a>
                                </div>
                                <table id="table" data-toggle="table" data-pagination="true" data-search="true"
                                       data-toolbar="#toolbar">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Perusahaan</th>
                                        <th>Alamat</th>
                                        <th>Email</th>
                                        <th>Telepon</th>
                                        <th>Fax</th>
                                        <th>Website</th>
                                        <th>Nama CP</th>
                                        <th>Telepon CP</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $no = 0?>
                                    @foreach($supplier as $item)
                                        <?php $no++?>
                                        <tr>
                                            <td>{{$no}}</td>
                                            <td>{{$item->nama}}</td>
                                            <td>{{$item->alamat}}</td>
                                            <td>{{$item->email}}</td>
                                            <td>{{$item->telepon}}</td>
                                            <td>{{$item->fax}}</td>
                                            <td>{{str_replace("http://","",$item->website)}}</td>
                                            <td>{{$item->nama_cp}}</td>
                                            <td>{{$item->telepon_cp}}</td>
                                            <td>
                                                <form action="/supplier/edit/{{$item->id}}"
                                                      style="display: inline">
                                                    <button class="btn btn-primary" style="width: 37px;">
                                                        <i class="fa fa-pencil-square-o"></i>
                                                    </button>
                                                </form>
                                                <form action="/supplier/{{$item->id}}" method="POST"
                                                      style="display: inline">
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
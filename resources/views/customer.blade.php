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
                                    <a href="{{route('create_customer')}}" class="btn btn-sm btn-primary login-submit-cs">
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
                                                <form action="{{route('edit_customer')}}"
                                                      style="display: inline">
                                                    <button class="btn btn-primary" style="width: 37px;">
                                                        <i class="fa fa-pencil-square-o"></i>
                                                    </button>
                                                </form>
                                                <form action="{{route('destroy_customer')}}" method="POST"
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
    <script>
        document.addEventListener("keydown", e => {
            if (e.key == "F5") {
                e.preventDefault()
            }
            ;
        });
        window.addEventListener("keyup", checkKey, false);

        function checkKey(key) {
            if (key.keyCode == "116") {
                window.location.href = "{{route('detail_penjualan')}}";
            }
        }
    </script>
@endsection
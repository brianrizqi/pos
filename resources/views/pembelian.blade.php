@extends('layout.app')
@section('title','POS')
@section('fitur','Pembelian')
@section('content')
    <div class="static-table-area mg-b-15">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="sparkline8-list shadow-reset">
                        <div class="sparkline8-hd">
                            <div class="main-sparkline8-hd">
                                <h1>Basic Table</h1>
                                <div class="sparkline8-outline-icon">
                                    <span class="sparkline8-collapse-link"><i class="fa fa-chevron-up"></i></span>
                                    <span><i class="fa fa-wrench"></i></span>
                                    <span class="sparkline8-collapse-close"><i class="fa fa-times"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="sparkline8-graph">
                            <div class="static-table-list">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Username</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Mamun</td>
                                        <td>Roshid</td>
                                        <td>@Facebook</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Suhag</td>
                                        <td>Khan</td>
                                        <td>@Twitter</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Sakil</td>
                                        <td>Shak</td>
                                        <td>@Linkedin</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="sparkline9-list sparkel-pro-mg-t-30 shadow-reset">
                        <div class="sparkline9-hd">
                            <div class="main-sparkline9-hd">
                                <h1>Sparkle Table</h1>
                                <div class="sparkline9-outline-icon">
                                    <span class="sparkline9-collapse-link"><i class="fa fa-chevron-up"></i></span>
                                    <span><i class="fa fa-wrench"></i></span>
                                    <span class="sparkline9-collapse-close"><i class="fa fa-times"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="sparkline9-graph">
                            <div class="static-table-list">
                                <table class="table sparkle-table">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Data</th>
                                        <th>User</th>
                                        <th>Value</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td><span id="sparkline1"></span>
                                        </td>
                                        <td>Roshid</td>
                                        <td><i class="fa fa-level-up"></i> 50%</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td><span id="sparkline2"></span>
                                        </td>
                                        <td>Khan</td>
                                        <td><i class="fa fa-level-down"></i> 70%</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td><span class="sparklineadminpro"></span>
                                        </td>
                                        <td>Shak</td>
                                        <td><i class="fa fa-level-up"></i> 90%</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="data-table-area mg-b-15">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="sparkline13-list shadow-reset">
                        <div class="sparkline13-hd">
                            <div class="main-sparkline13-hd">
                                <h1>Tabel <span class="table-project-n">Pembelian</span></h1>
                            </div>
                            <form>
                                <div class="form-group-inner">
                                    <div class="col-lg-8">
                                        <label class="login2 pull-right pull-right-pro">
                                            Nama Supplier
                                        </label>
                                    </div>
                                    <div class="col-lg-4">
                                        <select id="supplier" class="form-control" name="supplier"
                                                onchange="pilihSupplier()">
                                            <option></option>
                                            @foreach($supplier as $item)
                                                <option value="{{$item->id}}">{{$item->nama}}</option>
                                            @endforeach
                                        </select>
                                        {{csrf_field()}}
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="sparkline13-graph">
                            <div class="datatable-dashv1-list custom-datatable-overright">
                                <div class="row">
                                    <div class="col-lg-1">
                                        <a href="#" class="btn btn-sm btn-primary login-submit-cs" id="myHref"
                                           onclick="onClick();">
                                            Tambah
                                        </a>
                                    </div>
                                    <div class="col-lg-4"></div>
                                    <div class="col-lg-6">
                                        <div id="detail_sup">
                                            <p>

                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <table id="table" data-toggle="table" data-pagination="true"
                                       data-toolbar="#toolbar">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Barang</th>
                                        <th>Nama Barang</th>
                                        <th>Jumlah</th>
                                        <th>Satuan</th>
                                        <th>Harga Beli</th>
                                        <th>Diskon (%)</th>
                                        <th>Diskon (Rp)</th>
                                        <th>Sub Total</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $no = 0?>
                                    {{--                                    @foreach($barang as $item)--}}
                                    <?php
                                    $no++?>
                                    <tr>
                                        <td>{{$no}}</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>2</td>
                                        <td>
                                            1
                                        </td>
                                    </tr>
                                    {{--@endforeach--}}
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            Total
                                        </td>
                                        <td>
                                            Rp.10.000
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                                <div class="row">
                                    <div class="col-lg-10">

                                    </div>
                                    <div class="col-lg-2" style="margin-top: 10px;">
                                        <a href="/barang/create" class="btn btn-sm btn-danger login-submit-cs">
                                            Cancel
                                        </a>
                                        <a href="/barang/create" class="btn btn-sm btn-primary login-submit-cs">
                                            Masukkan
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        function pilihSupplier() {
            var xmlhttp = new XMLHttpRequest();
            var value = document.getElementById("supplier").value;
            if (value != "") {
                xmlhttp.open("GET", "/pembelian/fetch/" + value, false);
                xmlhttp.send(null);
                document.getElementById("detail_sup").innerHTML = xmlhttp.responseText;
            } else {
                alert('Supplier Kosong')
            }
        }

        function onClick() {
            var value = document.getElementById("supplier").value;
            if (value != "") {
                window.location.href = "/pembelian/create/" + value;
            } else {
                alert('Supplier Kosong');
            }
        }
    </script>
@endsection
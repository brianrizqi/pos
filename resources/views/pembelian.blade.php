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
                                <div class="form-group-inner">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <label class="login2 pull-right pull-right-pro">No Entry</label>
                                        </div>
                                        <div class="col-lg-9">
                                            <input type="email" class="form-control" name="email" placeholder="Email"
                                                   value="{{old('email')}}" required/>
                                            @if($errors->has('email'))
                                                <p>{{$errors->first('email')}}</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group-inner">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <label class="login2 pull-right pull-right-pro">Tanggal</label>
                                        </div>
                                        <div class="col-lg-9">
                                            <input type="date" class="form-control" name="tanggal"
                                                   data-date-format="yyyy-MM-dd"
                                                   value="{{old('email')}}" required/>
                                            @if($errors->has('email'))
                                                <p>{{$errors->first('email')}}</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group-inner">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <label class="login2 pull-right pull-right-pro">No Bukti</label>
                                        </div>
                                        <div class="col-lg-9">
                                            <input type="email" class="form-control" name="email" placeholder="Email"
                                                   value="{{old('email')}}" required/>
                                            @if($errors->has('email'))
                                                <p>{{$errors->first('email')}}</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="sparkline9-list sparkel-pro-mg-t-30 shadow-reset">
                        <div class="sparkline9-hd">
                            <div class="main-sparkline9-hd">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <h1>Supplier</h1>
                                    </div>
                                    <div class="col-lg-3"></div>
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
                                <div class="sparkline9-outline-icon">
                                </div>
                            </div>
                        </div>
                        <div class="sparkline9-graph">
                            <div class="static-table-list">
                                <div id="detail_sup">
                                    <table class="table sparkle-table">
                                        <tr>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    </table>
                                </div>
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
                                    @foreach($data as $item)
                                        <?php
                                        $no++?>
                                        <tr>
                                            <td>{{$no}}</td>
                                            <td>{{$item->id}}</td>
                                            <td>{{$item->name}}</td>
                                            <td>{{$item->quantity}}</td>
                                            <td>{{$item->attirbutes[0]}}</td>
                                            <td>{{$item->price}}</td>
                                            <td>1</td>
                                            <td>2</td>
                                            <td>
                                                1
                                            </td>
                                        </tr>
                                    @endforeach
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
                                        <a href="/pembelian/clear" class="btn btn-sm btn-danger login-submit-cs">
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
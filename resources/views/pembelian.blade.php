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
                                            <input type="text" class="form-control" name="email"
                                                   placeholder="No Faktur"/>
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
                                                   data-date-format="yyyy-MM-dd" required/>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group-inner">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <label class="login2 pull-right pull-right-pro">No Bukti</label>
                                        </div>
                                        <div class="col-lg-9">
                                            <input type="text" class="form-control" name="email" placeholder="No Bukti"
                                                   required/>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group-inner">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <label class="login2 pull-right pull-right-pro">Jenis Bayar</label>
                                        </div>
                                        <div class="col-lg-9">
                                            <div class="form-select-list">
                                                <select id="jenis_transaksi"
                                                        class="form-control custom-select-value"
                                                        name="jenis_transaksi" onchange="pilihBayar();">
                                                    <option value="Tunai">Tunai</option>
                                                    <option value="Kredit">Kredit</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="jatuh_tempo" class="form-group-inner" style="display: none;">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <label class="login2 pull-right pull-right-pro">Jatuh Tempo</label>
                                        </div>
                                        <div class="col-lg-9">
                                            <input type="date" class="form-control" name="tanggal"
                                                   data-date-format="yyyy-MM-dd" required/>
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
                                            <td>Alamat</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Telepon Perusahaan</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Nama CP</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Telepon CP</td>
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
                                        <th>Harga Beli</th>
                                        <th>Jumlah</th>
                                        <th>Satuan</th>
                                        <th>Diskon (%)</th>
                                        <th>Diskon (Rp)</th>
                                        <th>Sub Total</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $no = 0;
                                    $totalBayar = 0;
                                    ?>
                                    @foreach($data as $item)
                                        <?php
                                        $total = ($item->price - $item->attributes['diskon_dua']) * $item->quantity;
                                        $totalBayar += $total;
                                        $no++?>
                                        <tr>
                                            <td>{{$no}}</td>
                                            <td>{{$item->id}}</td>
                                            <td>{{$item->name}}</td>
                                            <td>Rp. {{number_format($item->price,0,".",".")}}</td>
                                            <td>{{$item->quantity}}</td>
                                            <td>{{$item->attributes['satuan']}}</td>
                                            <td>{{$item->attributes['diskon_satu']}} %</td>
                                            <td>Rp. {{number_format($item->attributes['diskon_dua'],0,".",".")}}</td>
                                            <td>
                                                Rp. {{number_format(($item->price-$item->attributes['diskon_dua'])*$item->quantity,0,".",".")}}
                                            </td>
                                            <?php

                                            ?>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            Biaya Kirim
                                        </td>
                                        <td>
                                            <div class="row">
                                                <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="input-group">
                                                        <input type="number" id="uang"
                                                               class="form-control uang" name="uang"
                                                               placeholder="Biaya Kirim"/>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            Total
                                        </td>
                                        <td>
                                            <div class="row">
                                                <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="input-group">
                                                        <input type="number" id="uang"
                                                               class="form-control uang" name="uang"
                                                               placeholder="Total"
                                                               value="<?=number_format($totalBayar, 0, ".", ".")?>"
                                                               disabled/>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            Uang Muka
                                        </td>
                                        <td>
                                            <div class="row">
                                                <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="input-group">
                                                        <input type="number" id="uang"
                                                               class="form-control uang" name="uang"
                                                               placeholder="Uang Muka"/>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            Diskon (%)
                                        </td>
                                        <td>
                                            <div class="row">
                                                <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="input-group">
                                                        <input type="number" id="uang"
                                                               class="form-control uang" name="uang"
                                                               placeholder="Diskon (%)"
                                                               required/>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            Sisa Piutang
                                        </td>
                                        <td>
                                            <div class="row">
                                                <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="input-group">
                                                        <input type="number" id="uang"
                                                               class="form-control uang" name="uang"
                                                               placeholder="Sisa Piutang"/>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            Diskon (Rp.)
                                        </td>
                                        <td>
                                            <div class="row">
                                                <div class="col-lg-8">
                                                    <input id="sisa" type="number" class="form-control"
                                                           placeholder="Diskon (Rp)">
                                                </div>
                                                <div class="col-lg-4">
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            Netto
                                        </td>
                                        <td>
                                            <div class="row">
                                                <div class="col-lg-8">
                                                    <input id="sisa" type="number" class="form-control"
                                                           placeholder="Netto">
                                                </div>
                                                <div class="col-lg-4">
                                                </div>
                                            </div>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">

    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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

        function pilihBayar() {
            var bayar = document.getElementById("jenis_transaksi").value;
            var tempo = document.getElementById("jatuh_tempo");
            if (bayar == "Kredit") {
                tempo.style.display = "inline";
            } else {
                tempo.style.display = "none";
            }
        }
    </script>
@endsection
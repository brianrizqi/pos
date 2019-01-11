@extends('layout.app')
@section('title','POS')
@section('fitur','Barang')
@section('content')
    <div class="basic-form-area mg-b-15">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="sparkline12-list shadow-reset mg-t-30">
                        <div class="sparkline12-hd">
                            <div class="main-sparkline12-hd">
                                <h1>Edit Barang</h1>
                            </div>
                        </div>
                        <div class="sparkline12-graph">
                            <div class="basic-login-form-ad">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="all-form-element-inner">
                                            <form action="/barang/{{$barang->id_barang}}/edit" method="POST">
                                                <div class="form-group-inner">
                                                    <div class="row">
                                                        <div class="col-lg-3">
                                                            <label class="login2 pull-right pull-right-pro">Nama
                                                                Barang</label>
                                                        </div>
                                                        <div class="col-lg-9">
                                                            <input type="text" class="form-control" name="nama_barang" placeholder="Nama Barang" value="{{$barang->nama_barang}}"/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group-inner">
                                                    <div class="row">
                                                        <div class="col-lg-3">
                                                            <label class="login2 pull-right pull-right-pro">Nama
                                                                Supplier</label>
                                                        </div>
                                                        <div class="col-lg-9">
                                                            <div class="form-select-list">
                                                                <select class="form-control custom-select-value"
                                                                        name="id_supplier">
                                                                    <option value="{{$barang->id}}">{{$barang->nama}}</option>
                                                                    @foreach($supplier as $item)
                                                                        <option value="{{$item->id}}">{{$item->nama}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group-inner">
                                                    <div class="row">
                                                        <div class="col-lg-3">
                                                            <label class="login2 pull-right pull-right-pro">Kategori</label>
                                                        </div>
                                                        <div class="col-lg-9">
                                                            <div class="form-select-list">
                                                                <select class="form-control custom-select-value"
                                                                        name="id_kategori">
                                                                    <option value="{{$barang->id_kategori}}">{{$barang->kategori}}</option>
                                                                    @foreach($kategori as $item)
                                                                        <option value="{{$item->id_kategori}}">{{$item->kategori}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group-inner">
                                                    <div class="row">
                                                        <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                                                            <label class="login2 pull-right pull-right-pro">Harga Beli
                                                                (Rp.)</label>
                                                        </div>
                                                        <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                                                            <div class="input-group">
                                                                <span class="input-group-addon">Rp.</span>
                                                                <input type="number" id="beli" placeholder="Harga Beli"
                                                                       class="form-control harga" name="harga_beli" value="{{$barang->harga_beli}}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group-inner">
                                                    <div class="row">
                                                        <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                                                            <label class="login2 pull-right pull-right-pro">Harga Jual
                                                                (Rp.)</label>
                                                        </div>
                                                        <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                                                            <div class="input-group">
                                                                <span class="input-group-addon">Rp.</span>
                                                                <input type="number" id="jual" placeholder="Harga Jual"
                                                                       class="form-control harga" name="harga_jual" value="{{$barang->harga_jual}}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group-inner">
                                                    <div class="row">
                                                        <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                                                            <label class="login2 pull-right pull-right-pro">Laba
                                                                (%)</label>
                                                        </div>
                                                        <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                                                            <div class="input-group">
                                                                <input type="number" id="laba" name="laba" placeholder="0"
                                                                       class="form-control" disabled value="{{$barang->laba}}">
                                                                <span class="input-group-addon">%</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group-inner">
                                                    <div class="row">
                                                        <div class="col-lg-3">
                                                            <label class="login2 pull-right pull-right-pro">Satuan</label>
                                                        </div>
                                                        <div class="col-lg-9">
                                                            <div class="form-select-list">
                                                                <select class="form-control custom-select-value"
                                                                        name="ukuran">
                                                                    <option>{{$barang->ukuran}}</option>
                                                                    <option>Pack</option>
                                                                    <option>Berat</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group-inner">
                                                    <div class="row">
                                                        <div class="col-lg-3">
                                                            <label class="login2 pull-right pull-right-pro">Stok</label>
                                                        </div>
                                                        <div class="col-lg-9">
                                                            <input type="number" class="form-control" placeholder="Stok" name="stok" value="{{$barang->stok}}"/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group-inner">
                                                    <div class="login-btn-inner">
                                                        <div class="row">
                                                            <div class="col-lg-3"></div>
                                                            <div class="col-lg-9">
                                                                <div class="login-horizental cancel-wp pull-left">
                                                                    <button class="btn btn-white" type="submit">Cancel
                                                                    </button>
                                                                    <button class="btn btn-sm btn-primary login-submit-cs"
                                                                            type="submit">Save Change
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                {{csrf_field()}}
                                                <input type="hidden" name="_method" value="PUT">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script>
        $('.input-group').on('input', '.harga', function () {
            var laba = 0;
            $('.input-group .harga').each(function () {
                var beli = $('#beli').val();
                var jual = $('#jual').val();
                var input = $(this).val();
                if ($.isNumeric(input)) {
                    // laba += parseFloat(input);
                    laba = parseFloat((jual - beli) / beli) * 100;
                }
            })
            $('#laba').val(laba);
        })
    </script>
@endsection
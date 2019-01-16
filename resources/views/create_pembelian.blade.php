@extends('layout.app')
@section('title','POS')
@section('fitur','Pembelian')
@section('content')
    <div class="basic-form-area mg-b-15">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="sparkline12-list shadow-reset mg-t-30">
                        <div class="sparkline12-hd">
                            <div class="main-sparkline12-hd">
                                <h1>Tambah Pembelian</h1>
                            </div>
                        </div>
                        <div class="sparkline12-graph">
                            <div class="basic-login-form-ad">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="all-form-element-inner">
                                            <form method="POST" action="/pembelian">
                                                <div class="form-group-inner">
                                                    <div class="row">
                                                        <div class="col-lg-3">
                                                            <label class="login2 pull-right pull-right-pro">Nama
                                                                Barang</label>
                                                        </div>
                                                        <div class="col-lg-9">
                                                            <div class="form-select-list">
                                                                <select id="barang"
                                                                        class="form-control custom-select-value"
                                                                        name="id_barang" onchange="pilihBarang();">
                                                                    <option></option>
                                                                    @foreach($barang as $item)
                                                                        <option value="{{$item->id_barang}}">{{$item->nama_barang}}</option>
                                                                    @endforeach
                                                                </select>
                                                                @if($errors->has('id_barang'))
                                                                    <p>{{$errors->first('id_barang')}}</p>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="detail_barang">

                                                    <div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-3">
                                                                <label class="login2 pull-right pull-right-pro">Harga
                                                                    Beli</label>
                                                            </div>
                                                            <div class="col-lg-9">
                                                                <input type="text" class="form-control" name="harga_beli"
                                                                       placeholder="Alamat" value="{{old('alamat')}}"
                                                                       required/>
                                                                @if($errors->has('alamat'))
                                                                    <p>{{$errors->first('alamat')}}</p>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-3">
                                                                <label class="login2 pull-right pull-right-pro">Satuan</label>
                                                            </div>
                                                            <div class="col-lg-9">
                                                                <select class="form-control custom-select-value"
                                                                        name="satuan">
                                                                    <option></option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group-inner">
                                                    <div class="row">
                                                        <div class="col-lg-3">
                                                            <label class="login2 pull-right pull-right-pro">Jumlah</label>
                                                        </div>
                                                        <div class="col-lg-9">
                                                            <input type="number" class="form-control" name="jumlah"
                                                                   placeholder="Jumlah" value="{{old('email')}}"
                                                                   required/>
                                                            @if($errors->has('email'))
                                                                <p>{{$errors->first('email')}}</p>
                                                            @endif
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
                                                                            type="submit">Tambah
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                {{csrf_field()}}
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
    <script>
        function pilihBarang() {
            var xmlhttp = new XMLHttpRequest();
            var value = document.getElementById("barang").value;
            if (value != "") {
                xmlhttp.open("GET", "/pembelian/barang/" + value, false);
                xmlhttp.send(null);
                document.getElementById("detail_barang").innerHTML = xmlhttp.responseText;
            } else {
                alert('Supplier Kosong')
            }
        }
    </script>
@endsection
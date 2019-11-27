@extends('layout.app')
@section('title','POS')
@section('fitur','Detail Pembelian')
@section('content')
    <div class="basic-form-area mg-b-15">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="sparkline12-list shadow-reset mg-t-30">
                        <div class="sparkline12-hd">
                            <div class="main-sparkline12-hd">
                                <h1>Bayar Hutang</h1>
                            </div>
                        </div>
                        <div class="sparkline12-graph">
                            <div class="basic-login-form-ad">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="all-form-element-inner">
                                            <form method="POST" action="{{route('update_detail_pembelian', ['id'=>$hutang->id_pembelian])}}">
                                                <div class="form-group-inner">
                                                    <div class="row">
                                                        <input type="hidden" name="id_pembelian" value="{{$hutang->id_pembelian}}">
                                                        <div class="col-lg-3">
                                                            <label class="login2 pull-right pull-right-pro">No
                                                                Faktur</label>
                                                        </div>
                                                        <div class="col-lg-9">
                                                            <input id="nama" type="text" class="form-control"
                                                                   name="nama" placeholder="No Faktur"
                                                                   value="{{$hutang->id_pembelian}}" disabled/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group-inner">
                                                    <div class="row">
                                                        <div class="col-lg-3">
                                                            <label class="login2 pull-right pull-right-pro">Supplier</label>
                                                        </div>
                                                        <div class="col-lg-9">
                                                            <input type="text" class="form-control" name="Supplier"
                                                                   placeholder="Alamat" value="{{$hutang->nama}}"
                                                                   disabled/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group-inner">
                                                    <div class="row">
                                                        <div class="col-lg-3">
                                                            <label class="login2 pull-right pull-right-pro">Tanggal Pembelian</label>
                                                        </div>
                                                        <div class="col-lg-9">
                                                            <input type="text" class="form-control" name=""
                                                                   placeholder="Alamat" value="{{$hutang->tanggal}}"
                                                                   disabled/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group-inner">
                                                    <div class="row">
                                                        <div class="col-lg-3">
                                                            <label class="login2 pull-right pull-right-pro">Jatuh Tempo</label>
                                                        </div>
                                                        <div class="col-lg-9">
                                                            <input type="text" class="form-control"
                                                                   placeholder="Jatuh Tempo" value="{{$hutang->jatuh_tempo}}"
                                                                   disabled/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group-inner">
                                                    <div class="row">
                                                        <div class="col-lg-3">
                                                            <label class="login2 pull-right pull-right-pro">Sisa Piutang</label>
                                                        </div>
                                                        <div class="col-lg-9">
                                                            <input type="text" class="form-control"
                                                                   placeholder="Jatuh Tempo" value="{{number_format($hutang->sisa_piutang,0,".",".")}}"
                                                                   disabled/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group-inner">
                                                    <div class="row">
                                                        <div class="col-lg-3">
                                                            <label class="login2 pull-right pull-right-pro">Bayar</label>
                                                        </div>
                                                        <div class="col-lg-9">
                                                            <input type="number" min="0" max="{{$hutang->sisa_piutang}}" class="form-control" name="bayar"
                                                                   placeholder="Bayar"
                                                                   required/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group-inner">
                                                    <div class="login-btn-inner">
                                                        <div class="row">
                                                            <div class="col-lg-3"></div>
                                                            <div class="col-lg-9">
                                                                <div class="login-horizental cancel-wp pull-left">
                                                                    <button class="btn btn-sm btn-primary login-submit-cs"
                                                                            type="submit">Tambah
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
@endsection

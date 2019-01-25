@extends('layout.app')
@section('title','POS')
@section('fitur','Dashboard')
@section('content')
    <div class="income-order-visit-user-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3">
                    <div class="income-dashone-total income-monthly shadow-reset nt-mg-b-30">
                        <div class="income-title">
                            <div class="main-income-head">
                                <h2>Press F7</h2>
                                <div class="main-income-phara">
                                    <a href="/barang">
                                        <p>
                                            <i style="color: white" class="fa big-icon fa-archive"></i>
                                        </p>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="income-dashone-pro">
                            <div class="income-rate-total">
                                <div class="price-adminpro-rate">
                                    <h3>Barang</h3>
                                </div>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="income-dashone-total orders-monthly shadow-reset nt-mg-b-30">
                        <div class="income-title">
                            <div class="main-income-head">
                                <h2>Press F4</h2>
                                <div class="main-income-phara order-cl">
                                    <a href="/supplier">
                                        <p><i class="fa fa-user"></i></p>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="income-dashone-pro">
                            <div class="income-rate-total">
                                <div class="price-adminpro-rate">
                                    <h3>Supplier</h3>
                                </div>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="income-dashone-total visitor-monthly shadow-reset nt-mg-b-30">
                        <div class="income-title">
                            <div class="main-income-head">
                                <h2>Press F6</h2>
                                <div class="main-income-phara visitor-cl">
                                    <a href="/customer">
                                        <p><i class="fa fa-users"></i></p>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="income-dashone-pro">
                            <div class="income-rate-total">
                                <div class="price-adminpro-rate">
                                    <h3>Customer</h3>
                                </div>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="income-dashone-total user-monthly shadow-reset nt-mg-b-30">
                        <div class="income-title">
                            <div class="main-income-head">
                                <h2>Press F8</h2>
                                <div class="main-income-phara low-value-cl">
                                    <a href="/kartu_stok">
                                        <p><i class="fa big-icon fa-archive"></i></p>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="income-dashone-pro">
                            <div class="income-rate-total">
                                <div class="price-adminpro-rate">
                                    <h3>Kartu Stok</h3>
                                </div>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3">
                    <div class="income-dashone-total income-monthly shadow-reset nt-mg-b-30">
                        <div class="income-title">
                            <div class="main-income-head">
                                <h2>Press F2</h2>
                                <div class="main-income-phara">
                                    <a href="/pembelian">
                                        <p>
                                            <i class="fa fa-arrow-circle-o-down"></i>
                                        </p>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="income-dashone-pro">
                            <div class="income-rate-total">
                                <div class="price-adminpro-rate">
                                    <h3>Pembelian</h3>
                                </div>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="income-dashone-total orders-monthly shadow-reset nt-mg-b-30">
                        <div class="income-title">
                            <div class="main-income-head">
                                <h2>Press F9</h2>
                                <div class="main-income-phara order-cl">
                                    <a href="/detail_pembelian">
                                        <p><i class="fa fa-arrow-circle-o-down"></i></p>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="income-dashone-pro">
                            <div class="income-rate-total">
                                <div class="price-adminpro-rate">
                                    <h3>Detail Pembelian</h3>
                                </div>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="income-dashone-total visitor-monthly shadow-reset nt-mg-b-30">
                        <div class="income-title">
                            <div class="main-income-head">
                                <h2>Press F10</h2>
                                <div class="main-income-phara visitor-cl">
                                    <a href="/penjualan">
                                        <p><i class="fa fa-arrow-circle-o-up"></i></p>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="income-dashone-pro">
                            <div class="income-rate-total">
                                <div class="price-adminpro-rate">
                                    <h3>Penjualan</h3>
                                </div>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="income-dashone-total user-monthly shadow-reset nt-mg-b-30">
                        <div class="income-title">
                            <div class="main-income-head">
                                <h2>Press F11</h2>
                                <div class="main-income-phara low-value-cl">
                                    <a href="/detail_penjualan">
                                        <p><i class="fa fa-arrow-circle-o-up"></i></p>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="income-dashone-pro">
                            <div class="income-rate-total">
                                <div class="price-adminpro-rate">
                                    <h3>Detail Penjualan</h3>
                                </div>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
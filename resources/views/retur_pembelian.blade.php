@extends('layout.app')
@section('title','POS')
@section('fitur','Detail Pembelian')
@section('content')
    <div class="basic-form-area mg-b-15">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-5">
                    <div class="sparkline12-list shadow-reset mg-t-30">
                        <div class="sparkline12-hd">
                            <div class="main-sparkline12-hd">
                                <h1>Retur Barang</h1>
                            </div>
                        </div>
                        <div class="sparkline12-graph">
                            <div class="basic-login-form-ad">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="all-form-element-inner">
                                            <form method="POST"
                                                  action="{{route('tambahBarang_detail_pembelian')}}">
                                                <input type="hidden" name="id_pembelian" value="{{$id}}">
                                                <div class="form-group-inner">
                                                    <div class="row">
                                                        <div class="col-lg-3">
                                                            <label class="login2 pull-right pull-right-pro">Barang</label>
                                                        </div>
                                                        <div class="col-lg-9">
                                                            <div class="form-select-list">
                                                                <select name="id_barang" id="barang"
                                                                        onchange="pilihBarang()"
                                                                        class="form-control custom-select-value">
                                                                    <option></option>
                                                                    @foreach($data as $item)
                                                                        <option value="{{$item->id_barang}}">{{$item->nama_barang}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="detail_barang">
                                                    <div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-3">
                                                                <label class="login2 pull-right pull-right-pro">Stok</label>
                                                            </div>
                                                            <div class="col-lg-9">
                                                                <input type="number" class="form-control" name="telepon"
                                                                       placeholder="Stok Barang" value=""
                                                                       disabled/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-3">
                                                                <label class="login2 pull-right pull-right-pro">Pembelian</label>
                                                            </div>
                                                            <div class="col-lg-9">
                                                                <input type="number" class="form-control" name="telepon"
                                                                       placeholder="Jumlah Pembelian" value=""
                                                                       disabled/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-3">
                                                                <label class="login2 pull-right pull-right-pro">Jumlah</label>
                                                            </div>
                                                            <div class="col-lg-9">
                                                                <input type="number" class="form-control" name="retur"
                                                                       placeholder="Jumlah Retur Barang"/>
                                                            </div>
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
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="sparkline12-list shadow-reset mg-t-30">
                        <div class="sparkline12-hd">
                            <div class="main-sparkline12-hd">
                                {{--<h1>Retur Barang</h1>--}}
                            </div>
                        </div>
                        <div class="sparkline12-graph">
                            <div class="basic-login-form-ad">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="all-form-element-inner">
                                            <form method="POST"
                                                  action="{{route('returBarang_detail_pembelian')}}">
                                                <div class="form-group-inner">
                                                    <div class="row">
                                                        <div class="col-lg-3">
                                                            <label class="login2 pull-right pull-right-pro">Kode
                                                                Retur</label>
                                                        </div>
                                                        <div class="col-lg-9">
                                                            <input type="text" class="form-control" name="id_retur"
                                                                   placeholder="Kode Retur"
                                                                   required/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <table id="results" class="table sparkle-table">
                                                    <thead>
                                                    <tr>
                                                        <th>Barang</th>
                                                        <th>Jumlah Retur</th>
                                                        <th>Harga</th>
                                                        <th>Subtotal</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php $no = 0;
                                                    $totalBayar = 0;
                                                    ?>
                                                    @foreach($barang as $item)
                                                        <?php
                                                        $totalBayar += ($item->price * $item->quantity);?>
                                                        <tr>
                                                            <td>{{$item->name}}</td>
                                                            <td>{{$item->quantity}}</td>
                                                            <td>Rp. {{number_format($item->price,0,".",".")}}</td>
                                                            <td>
                                                                Rp. {{number_format($item->price * $item->quantity,0,".",".")}}</td>
                                                            <td>
                                                                <a href="{{route('hapusBarang_detail_pembelian')}}"
                                                                   class="btn btn-danger"><i
                                                                            class="fa fa-trash"></i></a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td>Total</td>
                                                        <td>
                                                            {{--<div class="row">--}}
                                                            {{--<div class="col-lg-8">--}}
                                                            <div class="input-group" style="width: 100px;">
                                                                <input type="number" id="total"
                                                                       class="form-control kirim" name="total"
                                                                       placeholder="Total"
                                                                       value="<?=$totalBayar?>"/>
                                                                {{--</div>--}}
                                                                {{--</div>--}}
                                                            </div>
                                                        </td>
                                                        <td></td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                                <input type="hidden" name="id_pembelian" value="{{$id}}">
                                                <button type="submit" class="btn btn-primary">Retur</button>
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
            var id = '<?=$id?>';
            var xmlhttp = new XMLHttpRequest();
            var value = document.getElementById("barang").value;
            if (value != "") {
                xmlhttp.open("GET", "/detail_pembelian/barang/" + value + "/" + id, false);
                xmlhttp.send(null);
                document.getElementById("detail_barang").innerHTML = xmlhttp.responseText;
            } else {
                alert('Supplier Kosong')
            }
        }
    </script>
@endsection

@extends('layout.app')
@section('title','POS')
@section('fitur','Barang')
@section('content')
    <div class="data-table-area mg-b-15">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="sparkline13-list shadow-reset">
                        <div class="sparkline13-hd">
                            <div class="main-sparkline13-hd">
                                <h1>Tabel <span class="table-project-n">Barang</span></h1>
                            </div>
                        </div>
                        <div class="sparkline13-graph">
                            <div class="datatable-dashv1-list custom-datatable-overright">
                                <div id="toolbar">
                                    <a href="{{route('create_barang')}}" class="btn btn-sm btn-primary login-submit-cs">
                                        Tambah
                                    </a>
                                    <a href="{{route('cetak_barang')}}" class="btn btn-sm btn-primary login-submit-cs">
                                        Print
                                    </a>
                                </div>
                                <table id="table" data-toggle="table" data-pagination="true" data-search="true"
                                       data-toolbar="#toolbar">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Barang</th>
                                        <th>Nama Barang</th>
                                        <th>Nama Perusahaan</th>
                                        <th>Kategori</th>
                                        <th>Harga Beli</th>
                                        <th>Harga Jual</th>
                                        <th>Laba</th>
                                        <th>Stok</th>
                                        <th>Stok Kemasan</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $no = 0?>
                                    @foreach($barang as $item)
                                        <?php
                                        $no++?>
                                        <tr>
                                            <td>{{$no}}</td>
                                            <td>{{$item->id_barang}}</td>
                                            <td>{{$item->nama_barang}}</td>
                                            <td>{{$item->nama}}</td>
                                            <td>{{$item->kategori}}</td>
                                            <td>Rp. {{number_format($item->harga_beli,0,".",".")}}</td>
                                            <td>Rp. {{number_format($item->harga_jual,0,".",".")}}</td>
                                            <td>{{substr($item->laba,0,5)}} %</td>
                                            <td>{{$item->stok." ".$item->satuan_satu}}</td>
                                            <td>
                                                @if($item->satuan_empat != "")
                                                    {{
                                                    floor($item->stok/$item->stok_empat/$item->stok_tiga/$item->stok_dua)." ".$item->satuan_empat
                                                    ." ".floor(($item->stok % ($item->stok_dua*$item->stok_empat*$item->stok_tiga))/($item->stok_tiga*$item->stok_dua))." ".$item->satuan_tiga
                                                    ." ".floor((($item->stok % ($item->stok_dua*$item->stok_empat*$item->stok_tiga)) % ($item->stok_tiga*$item->stok_dua))/$item->stok_dua)." ".$item->satuan_dua
                                                    ." ".(($item->stok % ($item->stok_dua*$item->stok_empat*$item->stok_tiga)) % ($item->stok_tiga*$item->stok_dua))%$item->stok_dua." ".$item->satuan_satu
                                                    }}
                                                @elseif($item->satuan_tiga != "")
                                                    @if($item->satuan_turunan_tiga == $item->satuan_satu)
                                                        {{floor($item->stok/$item->stok_tiga)." ".$item->satuan_tiga." ".floor(($item->stok % $item->stok_tiga) / $item->stok_dua)." ".
                                                        $item->satuan_dua." ".(($item->stok % $item->stok_tiga) % $item->stok_dua)." ".$item->satuan_satu}}
                                                    @else
                                                        {{floor($item->stok/$item->stok_tiga/$item->stok_dua)." ".$item->satuan_tiga." ".floor(($item->stok % ($item->stok_tiga*$item->stok_dua)/$item->stok_dua)).
                                                        " ".$item->satuan_dua." ".($item->stok % ($item->stok_tiga * $item->stok_dua) % $item->stok_dua)." ".$item->satuan_satu}}
                                                    @endif
                                                @elseif($item->satuan_dua != "")
                                                    {{floor($item->stok/$item->stok_dua)." ".$item->satuan_dua." ".($item->stok % $item->stok_dua." ".$item->satuan_satu)}}
                                                @else
                                                    {{$item->stok." ".$item->satuan_satu}}
                                                @endif
                                            </td>
                                            <td>
                                                <form action="{{route('edit_barang', ['id_barang'=>$item->id_barang])}}" method="get"
                                                      style="display: inline">
                                                    <button class="btn btn-primary" style="width: 37px;">
                                                        <i class="fa fa-pencil-square-o"></i>
                                                    </button>
                                                </form>
                                                <form action="{{route('destroy_barang', ['id'=>$item->id_barang])}}" method="POST"
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
    <script type="text/javascript">
        document.addEventListener("keydown", e => {
            if (e.key == "F5") {
                e.preventDefault()
            }
            ;
        });
        window.addEventListener("keyup", checkKey, false);

        function checkKey(key) {
            if (key.keyCode == "116") {
                window.location.href = "{{route('create_barang')}}";
            }
        }
    </script>
@endsection
@extends('layout.app')
@section('title','POS')
@section('fitur','Kartu Stok')
@section('content')
    <div class="static-table-area mg-b-15">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="sparkline8-list shadow-reset">
                        <div class="sparkline8-hd">
                            <div class="main-sparkline8-hd">
                                <h1>Pilih Barang</h1>
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
                                            <select class="form-control" onchange="kartuStok()" id="kartu" name="kartu">
                                                <option></option>
                                                @foreach($barang as $item)
                                                    <option value="{{$item->id_barang}}">{{$item->nama_barang}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="sparkline8-list sparkel-pro-mg-t-30 shadow-reset">
                        <div class="sparkline8-hd">
                            <div class="main-sparkline9-hd">
                                <h1>Kartu Stok</h1>
                            </div>
                        </div>
                        <div class="sparkline8-graph">
                            <div class="static-table-list">
                                <div id="detail_sup">
                                    <table id="results" class="table sparkle-table">
                                        <thead>
                                        <tr>
                                            <th>Tanggal</th>
                                            <th>No Faktur</th>
                                            <th>Keterangan</th>
                                            <th>Masuk</th>
                                            <th>Keluar</th>
                                            <th>Saldo</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
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
    </div>
    <script>
        function kartuStok() {
            var xmlhttp = new XMLHttpRequest();
            var value = document.getElementById("kartu").value;
            if (value != "") {
                xmlhttp.open("GET", "/kartu_stok/fetch/" + value, false);
                xmlhttp.send(null);
                document.getElementById("detail_sup").innerHTML = xmlhttp.responseText;
                var tbody = document.querySelector("#results tbody");
                // get trs as array for ease of use
                var rows = [].slice.call(tbody.querySelectorAll("tr"));

                rows.sort(function(a,b) {
                    return convertDate(a.cells[0].innerHTML) - convertDate(b.cells[0].innerHTML);
                });

                rows.forEach(function(v) {
                    tbody.appendChild(v); // note that .appendChild() *moves* elements
                });
            } else {
                alert('Barang Kosong')
            }

        }
        function convertDate(d) {
            var p = d.split("/");
            return +(p[2]+p[1]+p[0]);
        }

        function sortByDate() {

        }
    </script>
@endsection
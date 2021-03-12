@extends('layout/main')

@section('container')
    <div class="main">
        <!-- MAIN CONTENT -->
        <div class="main-content">
            <div class="container-fluid">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Tunggakan SPP</h3>
                    </div>
                    <div class="panel-body">

                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Jatuh Tempo</th>
                                <th>Jumlah Tagihan</th>
                            </tr>

                            </thead>
                            <tbody>

                            @foreach($spp as $data)
                                <tr>
                                    <th>{{$data->periode_spp_detail}}</th>
                                    <th>{{$data->harga_spp_detail}}</th>
                                </tr>
                            @endforeach
                            <tr>
                                <th></th>
                                <th>Total Tagihan =  &nbsp {{$totalSpp}}</th>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

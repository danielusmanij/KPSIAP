@extends('layout/main')

@section('container')
    <?php
        $id_user = Session::get('id_user');
    ?>
    <div class="main">
        <!-- MAIN CONTENT -->
        <div class="main-content">
            <div class="container-fluid">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title" style="font-size: 60px">Tunggakan SPP</h3>
                    </div>
                    <div class="panel-body">
                        @foreach($adminSpp as $data2)
                        <form action="/buktiPembayaran/{{$data2->id_spp_admin}}" method="POST" enctype="multipart/form-data">
                            @method('patch')
                            {{ csrf_field() }}
                        @endforeach
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Mulai Pembayaran</th>
                                <th>Jatuh Tempo</th>
                                <th>Jumlah Tagihan</th>
                                <th>Pembayaran</th>
                            </tr>

                            </thead>
                            <tbody>

                            @foreach($adminSpp as $data)
                                <tr>
                                    <th>{{$data->tanggal_aktual_pembayaran}}</th>
                                    <th>{{$data->tanggal_jatuh_tempo}}</th>
                                    <th>{{$data->harga_spp_detail}}</th>
                                    @if($data->verifikasi_spp == 'berhasil')
                                        <th>LUNAS</th>
                                        <th>
{{--                                            <span>Silahkan Minta Bukti Pembayaran Ke Admin</span>--}}
{{--                                            <a class="btn btn-primary" href="/download/pdf">Download</a>--}}
                                        </th>
                                    @else
                                        <th><div class="fo  rm-group">
                                                <select class="form-control" name="status_bayar" required onchange="yesnoCheck(this)">
                                                    <option value="upload">Upload Pembayaran</option>
                                                    <option value="bayarLangsung">Bayar Langsung</option>
                                                </select>
                                            </div></th>
                                        <th id="bukti" ><input type="file" name="bukti_pembayaran" ></th>
                                       <th><input type="submit" name="" class="btn btn-success"></th>
                                    @endif

{{--                                    <th>@currency($data->harga_spp_detail)</th>--}}
                                </tr>
                            @endforeach

                            <tr>
{{--                                <th>Total Tagihan =  &nbsp @currency($totalSpp)</th>--}}
{{--                                <th></th>--}}
                            </tr>
                            </tbody>

{{--                           <div>--}}
{{--                               <a href="{{ url('/export/'.$id_user) }}">Export</a>--}}
{{--                           </div>--}}

                        </table>
                            @if (session('messageSuccess'))
                                <br><br>
                                <div class="alert alert-success alert-dismissible" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    <i class="fa fa-check-circle"></i> {{session('messageSuccess')}}
                                </div>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

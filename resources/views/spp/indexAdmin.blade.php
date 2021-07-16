@extends('layout/main')

@section('container')
    <div class="main">
        <!-- MAIN CONTENT -->
        <div class="main-content">
            <div class="container-fluid">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title" style="font-size:60px">Kelola SPP Siswa</h3>
                    </div>
                    <div class="panel-body">
                        <a href="/tambahSpp" class="btn btn-info">Tambah Data</a>
                    </div>

                    <div class="panel-body">
                        <h3 class="panel-title"></h3>
                        <br>
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>NIS</th>
                                    <th>Nama Depan</th>
                                    <th>Nama Belakang</th>
                                    <th>Mulai Pembayaran</th>
                                    <th>Jatuh Tempo</th>
                                    <th>Biaya</th>
                                    <th>Bukti Pembayaran</th>
                                    <th>Verifikasi Pembayaran</th>


                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($spp as $data)
                                        <form action="/verifikasiSpp/{{$data->id_spp_admin}}" method="post">
                                            @method('post')
                                            {{ csrf_field() }}
                                    <tr>
                                        <td class="col-lg-2 col-sm-2">{{$data->NIS}}</td>
                                        <td class="col-lg-2 col-sm-2">{{$data->nama_depan}}</td>
                                        <td class="col-lg-2 col-sm-2">{{$data->nama_belakang}}</td>
                                        <td class="col-lg-2 col-sm-2">{{$data->tanggal_aktual_pembayaran}}</td>
                                        <td class="col-lg-2 col-sm-2">{{$data->tanggal_jatuh_tempo}}</td>
                                        <td class="col-lg-2 col-sm-2">{{$data->harga_spp_detail}}</td>
                                        <td> <a href="{{asset('assets/filePembayaran')}}/{{$data->bukti_pembayaran}}" target="_blank">{{$data->bukti_pembayaran}}</a></td>
                                        <td class="col-lg-2 col-sm-2"><button type="submit" class="btn btn-success" value="berhasil" name="verifikasi_spp">Verifikasi</button></td>
                                    </tr>

                                        </form>
                                    @endforeach
                                </tbody>
                            </table>
                        @if (session('messageSuccess'))
                            <br><br>
                            <div class="alert alert-success alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                <i class="fa fa-check-circle"></i> {{session('messageSuccess')}}
                            </div>
                        @endif
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

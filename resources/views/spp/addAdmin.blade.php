@extends('layout/main')

@section('container')
    <div class="main">
        <!-- MAIN CONTENT -->
        <div class="main-content">
            <div class="container-fluid">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title" style="font-size:60px">Tambah SPP Siswa</h3>
                    </div>
                    <div class="panel">
                        <form action="/sppInputSiswa" method="post">
                            @method('post')
                            {{ csrf_field() }}

                            <div class="panel-body">
                                <label for="NIS">NIS:</label>
                                <input type="number" id="NIS" name="NIS" class="form-control" required><br><br>

                                <label for="tanggal_aktual_pembayaran">Tanggal Pembayaran</label>
                                <input type="date" name="tanggal_aktual_pembayaran"  class="form-control" required><br><br>

                                <label for="tanggal_jatuh_tempo">Tanggal Jatuh Tempo</label>
                                <input type="date" name="tanggal_jatuh_tempo"  class="form-control" required><br><br>

                                <label for="harga_spp_detail">Biaya</label>
                                <input type="number" name="harga_spp_detail"  class="form-control" required><br><br>

                                <input type="submit" class="btn btn-primary btn-lg btn-block">
                                <a href="{{ url()->previous() }}"
                                   class="btn btn-default btn-lg btn-block">Cancel</a>
                                @if (session('message'))
                                    <br><br>
                                    <div class="alert alert-danger alert-dismissible" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                        <i class="fa fa-times-circle"></i> {{session('message')}}
                                    </div>
                                @endif
                                @if (session('messageSuccess'))
                                    <br><br>
                                    <div class="alert alert-success alert-dismissible" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                        <i class="fa fa-check-circle"></i> {{session('messageSuccess')}}
                                    </div>
                                @endif

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@extends('layout/main')

@section('container')
    <div class="main">
        <!-- MAIN CONTENT -->
        <div class="main-content">
            @if (session('message'))
                <br><br>
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                    <i class="fa fa-check-circle"></i> {{session('message')}}
                </div>
            @endif
            <div class="container-fluid">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Kelola Soal Ujian</h3>
                    </div>
                    <div class="panel-body">
                        @foreach ($kelolaSoalUjian->unique('nama_mata_pelajaran') as $data)
                            <h3 class="panel-title">{{$data->nama_mata_pelajaran}}</h3>
                            <br>
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>Keterangan Soal</th>
                                    <th>File Soal</th>
                                    <th>Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($kelolaSoalUjian as $data2)
                                    <tr>
                                        <td>{{$data2->keterangan_soal}}</td>
                                        <td>
                                            <a href="{{asset('assets/fileSoal')}}/{{$data2->file_soal}}" download="" target="_blank">{{$data2->file_soal}}</a>
                                        </td>
                                        <td>
                                            <a href="/jawaban/{{session('id_user')}}/{{$data2->kode_mata_pelajaran}}/{{$data2->id_soal_ujian}}" class="btn btn-default">Masukkan Jawaban</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

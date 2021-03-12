@extends('layout/main')

@section('container')

    <div class="main">
        <!-- MAIN CONTENT -->
        <div class="main-content">
            <div class="container-fluid">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Kelola Jawaban</h3>
                    </div>
                    <div class="panel-body">
                        @foreach($kelolaJawaban->unique('nama_mata_pelajaran') as $data)
                            <h3 class="panel-title">{{$data->nama_mata_pelajaran}}</h3>
                        @endforeach
                        <br>
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Nama Siswa</th>
                                <th>File Jawaban</th>
                                <th>Nilai</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($kelolaJawaban as $data)
                                <tr>
                                    <td>
                                        {{$data->nama_depan}} {{$data->nama_belakang}}
                                    </td>
                                    <td>
                                        <a href="{{asset('assets/fileJawaban')}}/{{$data->file_jawaban}}" download="" target="_blank">{{$data->file_jawaban}}</a>
                                    </td>
                                    <td>
                                        {{$data->poin_nilai}}
                                    </td>
                                    <td>
                                        <a href="/kelolaJawaban/{{session('id_user')}}/{{$data->kode_mata_pelajaran}}/{{$data->id_soal_ujian}}/{{$data->id_nilai}}/edit" class="btn btn-default">Ubah Nilai</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layout/main')

@section('container')
    <div class="main">
        <!-- MAIN CONTENT -->
        <div class="main-content">
            <div class="container-fluid">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title" style="font-size: 60px">Soal Ujian</h3>
                    </div>
                    <div class="panel-body">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>Mata Pelajaran</th>
                                    <th>Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($soalUjian->unique('nama_mata_pelajaran') as $data)
                                    <tr>
                                        <td>{{$data->nama_mata_pelajaran}}</td>
                                        <td>
                                            <a href="/soalUjian/{{session('id_user')}}/{{$data->kode_mata_pelajaran}}" class="btn btn-info">Lihat Soal Ujian</a>
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

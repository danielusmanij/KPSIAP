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
                        <h3 class="panel-title">Kelola Pelajaran</h3>
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
                            @foreach($kelolaPelajaran->unique('kode_mata_pelajaran') as $data)
                                <tr>
                                    <td>{{$data->nama_mata_pelajaran}}</td>
                                    <td>
                                        <a href="/kelolaPelajaran/{{session('id_user')}}/{{$data->kode_mata_pelajaran}}/tambahPertemuan" class="btn btn-info">Tambah Pertemuan</a>
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

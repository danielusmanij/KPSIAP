@extends('layout/main')

@section('container')
    <div class="main">
        <!-- MAIN CONTENT -->
        <div class="main-content">
            <div class="container-fluid">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Kelola Guru</h3>
                    </div>
                    <div class="panel-body">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>NIP</th>
                                <th>Nama</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($kelolaGuru as $data)
                                <tr>
                                    <td>
                                        <a href="/kelolaGuruAdmin/{{session('id_user')}}/{{$data->NIP}}">{{$data->NIP}}</a>
                                    </td>
                                    <td>  {{$data->nama_depan}} {{$data->nama_belakang}} </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

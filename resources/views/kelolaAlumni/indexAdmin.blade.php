@extends('layout/main')

@section('container')
    <div class="main">
        <!-- MAIN CONTENT -->
        <div class="main-content">
            <div class="container-fluid">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Kelola Alumni</h3>
                    </div>
                    <div class="panel-body">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>ID Alumni</th>
                                <th>Tahun Lulus</th>
                                <th>Nama</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($kelolaAlumni as $data)
                                <tr>
                                    <td>
                                        <a href="/kelolaAlumniAdmin/{{session('id_user')}}/{{$data->id_alumni}}">{{$data->id_alumni}}</a>
                                    </td>
                                    <td>
                                        {{$data->tahun_lulus}}
                                    </td>
                                    <td>
                                        {{$data->nama_depan}} {{$data->nama_belakang}}
                                    </td>
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

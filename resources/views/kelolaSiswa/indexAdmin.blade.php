@extends('layout/main')

@section('container')
    <div class="main">
        <!-- MAIN CONTENT -->
        <div class="main-content">
            <div class="container-fluid">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Kelola Siswa</h3>
                    </div>
                    <div class="panel-body">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>NIS</th>
                                <th>Nama</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($kelolaSiswa as $data)
                                <tr>
                                    <td>
                                        <a href="/kelolaSiswaAdmin/{{session('id_user')}}/{{$data->NIS}}">{{$data->NIS}}</a>
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

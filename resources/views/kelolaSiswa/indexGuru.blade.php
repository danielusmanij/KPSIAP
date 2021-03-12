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
                        @foreach ($kelolaSiswa->unique('nama_mata_pelajaran') as $data)
                            <h3 class="panel-title">{{$data->nama_mata_pelajaran}}</h3>
                            <br>
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>NIS</th>
                                    <th>Nama</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($kelolaSiswa->unique('NIS') as $data2)
                                    @if($data2->nama_mata_pelajaran == $data->nama_mata_pelajaran)
                                <tr>
                                    <td><a href="/kelolaSiswaGuru/{{session('id_user')}}/{{$data2->NIS}}/{{$data2->kode_mata_pelajaran}}">{{$data2->NIS}}</a></td>
                                    <td>  {{$data2->nama_depan}} {{$data2->nama_belakang}} </td>
                                </tr>
                                @endif
                                @endforeach
                                </tbody>
                            </table>
                                <br>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

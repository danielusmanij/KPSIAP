@extends('layout/main')

@section('container')
    <div class="main">
        <!-- MAIN CONTENT -->
        <div class="main-content">
            <div class="container-fluid">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Jadwal Mata Pelajaran</h3>
                    </div>
                    <div class="panel-body">
                        @foreach($jadwal->unique('nama_mata_pelajaran') as $data)
                            <h3 class="panel-title">[{{$data->nama_mata_pelajaran}}]</h3>
                        @endforeach
                        <br>
                        @foreach($jadwal->unique('hari') as $data)
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>Hari</th>
                                    <th>Waktu</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($jadwal as $data2)
                                    @if($data2->hari == $data->hari)
                                        <tr>
                                            <td>  {{$data2->hari}} </td>
                                            <td>  {{$data2->waktu}} </td>
                                        </tr>
                                    @endif
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



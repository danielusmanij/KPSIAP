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
                        @foreach ($jadwal->unique('hari') as $data)
                            <h3 class="panel-title">{{$data->hari}}</h3>
                            <br>
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>Mata Pelajaran</th>
                                    <th>Waktu</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($jadwal as $data2)
                                    @if($data2->hari == $data->hari)
                                <tr>
                                    <td>  {{$data2->nama_mata_pelajaran}} </td>
                                    <td>  {{$data2->waktu}} </td>
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

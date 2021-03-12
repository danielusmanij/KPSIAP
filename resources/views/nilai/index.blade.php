@extends('layout/main')

@section('container')
    <div class="main">
        <!-- MAIN CONTENT -->
        <div class="main-content">
            <div class="container-fluid">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Nilai</h3>
                    </div>
                    <div class="panel-body">
                        @foreach ($nilai->unique('nama_mata_pelajaran') as $data)
                            <h3 class="panel-title">{{$data->nama_mata_pelajaran}}</h3>
                            <br>
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>Keterangan</th>
                                    <th>Poin Nilai</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($nilai as $data2)
                                    @if($data2->nama_mata_pelajaran == $data->nama_mata_pelajaran)
                                        <tr>
                                            <td>  {{$data2->keterangan_soal}} </td>
                                            <td>  {{$data2->poin_nilai}} </td>
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

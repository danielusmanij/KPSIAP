@extends('layout/main')

@section('container')
    <div class="main">
        <!-- MAIN CONTENT -->
        <div class="main-content">
            <div class="container-fluid">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title" style="font-size:60px">Nilai</h3>
                    </div>
                    <div class="panel-body">
                        @foreach ($nilai->unique('nama_mata_pelajaran') as $data)
                            <h3 class="panel-title" style="font-family: Peace Sans">{{$data->nama_mata_pelajaran}}</h3>
                            <br>
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th class="col-lg-8 col-sm-4">Keterangan</th>
                                    <th class="col-lg-8 col-sm-4">Poin Nilai</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($nilai as $data2)
                                    @if($data2->nama_mata_pelajaran == $data->nama_mata_pelajaran)
                                        <tr>
                                            <td class="col-lg-8 col-sm-4">  {{$data2->keterangan_soal}} </td>
                                            <td class="col-lg-8 col-sm-4">  {{$data2->poin_nilai}} </td>
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

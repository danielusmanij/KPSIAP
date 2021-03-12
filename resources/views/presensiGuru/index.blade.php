@extends('layout/main')

@section('container')
    <div class="main">
        <!-- MAIN CONTENT -->
        <div class="main-content">
            <div class="container-fluid">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Presensi Guru</h3>
                    </div>
                    <div class="panel-body">
                        <form method="post" action="/presensiGuru/{{session('id_user')}}">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <select class="form-control" name="mataPelajaranGroup" required>
                                    <option value="">(Pilih Pertemuan)</option>
                                    @foreach ($presensiGuru->unique('hari') as $data)
                                        <option value="{{$data->id_pertemuan}}">- [{{$data->nama_mata_pelajaran}}] [{{$data->hari}} {{$data->waktu}}] [{{$data->nama_pertemuan}}]</option>
                                    @endforeach
                                </select>
                            </div>
                            <input value="Hadir" name="btnHadir"
                                   class="btn btn-primary btn-lg btn-block"
                                   type="submit">
                            @if (session('messageSuccess'))
                                <br><br>
                                <div class="alert alert-success alert-dismissible" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    <i class="fa fa-check-circle"></i> {{session('messageSuccess')}}
                                </div>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@extends('layout/main')

@section('container')

    <div class="main">
        <!-- MAIN CONTENT -->
        <div class="main-content">
            <div class="container-fluid">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Kelola Jawaban</h3>
                    </div>
                    <div class="panel-body">
                        @foreach($kelolaJawaban->unique('nama_mata_pelajaran') as $data)
                            <h3 class="panel-title">[{{$data->nama_mata_pelajaran}}] {{$data->nama_depan}} {{$data->nama_belakang}}</h3>
                        <br>
                            <form method="post" action="/kelolaJawaban/{{session('id_user')}}/{{$data->kode_mata_pelajaran}}/{{$data->id_soal_ujian}}/{{$data->id_nilai}}">
                                @method('patch')
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <input type="text" class="form-control" name="txtPoinNilai"
                                           id="txtPoinNilai"
                                           placeholder="Poin Nilai" value="{{ $data->poin_nilai }}"
                                           required>
                                </div>
                                <input type="submit" name="btnSubmit"
                                       class="btn btn-primary btn-lg btn-block">
                                <a href="{{ url()->previous() }}"
                                   class="btn btn-default btn-lg btn-block">Cancel</a>
                            </form>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

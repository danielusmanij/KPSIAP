@extends('layout/main')

@section('container')
    <div class="main">
        <!-- MAIN CONTENT -->
        <div class="main-content">
            <div class="container-fluid">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Ubah File Soal</h3>
                    </div>
                    <div class="panel-body">
                        @foreach ($kelolaSoalUjian as $data)
                            <form method="post"
                                  action="/kelolaSoalUjian/{{session('id_user')}}/{{$data->kode_mata_pelajaran}}/{{$data->id_soal_ujian}}/{{$data->file_soal}}"
                                  enctype="multipart/form-data">
                                @method('patch')
                                {{ csrf_field() }}
                                <h3 class="panel-title">[{{$data->keterangan_soal}}]</h3>
                                <br>
                                <div class="form-group">
                                    <label for="exampleFormControlFile1">Pilih File Soal</label>
                                    <input type="file" name="file_soal" class="form-control-file"
                                           id="exampleFormControlFile1" required>
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

@extends('layout/main')

@section('container')
<div class="main">
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">Ubah Data Kegiatan</h3>
                </div>
                @foreach($kelolaKegiatanSekolah as $data)
                <div class="panel-body">
                    <form method="post"
                          action="/kelolaKegiatanSekolahAdmin/{{session('id_user')}}/{{$data->id_kegiatan}}/{{$data->nama_kegiatan}}"
                          enctype="multipart/form-data">
                        @method('patch')
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Pilih Foto Kegiatan</label>
                            <input type="file" name="file_kegiatan" class="form-control-file"
                                   id="exampleFormControlFile1">
                        </div>
                        <input type="text" class="form-control" name="txtNamaKegiatan"
                               id="txtNamaKegiatan"
                               placeholder="Nama Kegiatan" value="{{$data->nama_kegiatan}}"
                               required>
                        <br>
                        <input type="date" value="{{ $data->waktu_kegiatan }}" name="txtWaktuKegiatan"
                               id="txtWaktuKegiatan">
                        <br><br>
                        <input type="submit" name="btnSubmit"
                               class="btn btn-primary btn-lg btn-block">
                        <a href="{{ url()->previous() }}"
                           class="btn btn-default btn-lg btn-block">Cancel</a>
                    </form>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection

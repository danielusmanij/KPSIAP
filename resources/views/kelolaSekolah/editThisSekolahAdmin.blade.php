@extends('layout/main')
@section('container')
    <div class="main">
        <!-- MAIN CONTENT -->
        <div class="main-content">
            <div class="container-fluid">
                <div class="panel">
                    <form method="post"
                          action="/kelolaSekolahAdmin/{{session('id_user')}}/{{$sekolah->id_sekolah}}" enctype="multipart/form-data">
                        @method('patch')
                        {{ csrf_field() }}
                        <div class="panel-heading">
                            <h3 class="panel-title">Kelola Sekolah</h3>
                        </div>
                        <div class="panel-body">

                            <div class="form-group">
                                <label for="exampleFormControlFile1">Pilih File Foto</label>
                                <input type="file" name="photo" class="form-control-file"
                                       id="exampleFormControlFile1">
                            </div>
                            <input type="text" class="form-control" name="txtNamaSekolah"
                                   id="txtNamaSekolah"
                                   placeholder="Nama Sekolah" value="{{$sekolah->nama_sekolah}}"
                                   required></li>
                            <input type="text" class="form-control" name="txtAlamatSekolah"
                                   id="txtAlamatSekolah"
                                   placeholder="Alamat Sekolah" value="{{$sekolah->alamat_sekolah}}"
                                   required></li>
                            <input type="text" class="form-control" name="txtNoTelepon"
                                   id="txtNoTelepon"
                                   placeholder="Nomor Telepon" value="{{$sekolah->no_telepon_sekolah}}"
                                   required></li>
                            <br>
                            Kurikulum: <select name="txtKurikulum" id="txtKurikulum">
                                @foreach($kurikulum as $data)
                                                            <option value="{{$data->id_kurikulum}}">{{$data->nama_kurikulum}}</option>
                                    {{$data->nama_kurikulum}}
                                @endforeach
                                                                </select>
                            <br><br>
                            <input type="submit" name="btnSubmit"
                            class="btn btn-primary btn-lg btn-block">
                            <a href="{{ url()->previous() }}"
                               class="btn btn-default btn-lg btn-block">Cancel</a>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

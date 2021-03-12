@extends('layout/main')

@section('container')
    <div class="main">
        <!-- MAIN CONTENT -->
        <div class="main-content">
            @if (session('message'))
                <br><br>
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                    <i class="fa fa-check-circle"></i> {{session('message')}}
                </div>
            @endif
            <div class="container-fluid">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Kelola Kegiatan Sekolah</h3>
                    </div>
                    <div class="panel-body">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Nama Kegiatan</th>
                                <th>Waktu Kegiatan</th>
                                <th>Foto Kegiatan</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($kelolaKegiatanSekolah as $data)
                                <tr>
                                    <td>
                                        {{$data->nama_kegiatan}}
                                    </td>
                                    <td>  {{$data->waktu_kegiatan->format('d M Y')}}</td>
                                    <td>  <a href="{{asset('assets/fileKegiatan')}}/{{$data->photo_kegiatan_sekolah}}" target="_blank">{{$data->photo_kegiatan_sekolah}}</a></td>
                                    <td style="display: flex;">
                                        <button><a
                                                href="/kelolaKegiatanSekolahAdmin/{{session('id_user')}}/{{$data->id_kegiatan}}/edit"><span
                                                    class="glyphicon glyphicon-edit"></span></a>
                                        </button>
                                        <form
                                            action="/kelolaKegiatanSekolahAdmin/{{session('id_user')}}/{{$data->id_kegiatan}}/{{$data->nama_kegiatan}}"
                                            method="post">
                                            @method('delete')
                                            {{ csrf_field() }}
                                            <button><a style="color:red"
                                                       onclick="return confirm('Anda yakin menghapus data ini?')"><span
                                                        class="glyphicon glyphicon-trash"></span></a>
                                            </button>
                                        </form>
                                    </td>
                                </tr>

                            @endforeach
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                Tambah Data
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="post" action="/kelolaKegiatanSekolahAdmin/{{session('id_user')}}" enctype="multipart/form-data">
                                                {{ csrf_field() }}
                                                <div class="form-group">
                                                    <label for="exampleFormControlFile1">Pilih Foto Kegiatan</label>
                                                    <input type="file" name="file_kegiatan" class="form-control-file"
                                                           id="exampleFormControlFile1">
                                                </div>
                                                <input type="text" class="form-control" name="txtNamaKegiatan"
                                                       id="txtNamaKegiatan"
                                                       placeholder="Nama Kegiatan"
                                                       required>
                                                <br>
                                                <input type="date" name="txtWaktuKegiatan"
                                                       id="txtWaktuKegiatan">
                                                <br><br>
                                                <input type="submit" name="btnSubmit"
                                                       class="btn btn-primary btn-lg btn-block">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

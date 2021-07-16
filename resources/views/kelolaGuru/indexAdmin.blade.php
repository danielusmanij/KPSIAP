@extends('layout/main')

@section('container')
    <div class="main">
        <!-- MAIN CONTENT -->
        <div class="main-content">
            <div class="container-fluid">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Kelola Guru</h3>
                    </div>
                    <div class="panel-body">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>NIP</th>
                                <th>Nama</th>
                                <th>Agama</th>
                                <th>Jabatan</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($kelolaGuru as $data)
                                <tr>
                                    <td>
                                        <a href="/kelolaGuruAdmin/{{session('id_user')}}/{{$data->NIP}}">{{$data->NIP}}</a>
                                    </td>
                                    <td>
                                        {{$data->nama_depan}} {{$data->nama_belakang}}
                                    </td >
                                    <td>
                                        {{$data->agama}}
                                    </td >
                                    <td>
                                        {{$data->jabatan}}
                                    </td >
                                    <td style="display: flex;">
                                    <form action="/kelolaGuruAdmin/{{$data->NIP}}/delete" method="post">
                                        @method('delete')
                                        {{ csrf_field() }}
                                            <button>
                                                <a style="color:red"
                                                onclick="return confirm('Anda yakin menghapus data ini?')"><span
                                                class="glyphicon glyphicon-trash"></span></a>
                                            </button>
                                    </form>
                                    </td>
                                </tr>
                            @endforeach
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                Tambah Data
                            </button>
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="post" action="/kelolaGuruAdmin/{{session('id_user')}}" enctype="multipart/form-data">
                                                {{ csrf_field() }}
                                                <div class="form-group">
                                                    <label>Input Data Alumni</label>
                                                </div>
                                                <input type="text" class="form-control"
                                                    name="txtNIP"
                                                    id="txtNIP"
                                                    placeholder="NIP"
                                                    value="{{old('txtNIP')}}"
                                                    required>
                                                <br>
                                                <input type="text" class="form-control" name="txtNamaDepan"
                                                    id="txtNamaDepan"
                                                    placeholder="Nama Depan"
                                                    value="{{old('txtNamaDepan')}}"
                                                    required>
                                                <br>
                                                <input type="text" class="form-control" name="txtNamaBelakang"
                                                    id="txtNamaBelakang"
                                                    placeholder="Nama Belakang"
                                                    value="{{old('txtNamaBelakang')}}"
                                                    required>
                                                <br>
                                                <input type="date" class="form-control" name="dateTanggalLahir"
                                                    id="dateTanggalLahir"
                                                    placeholder="Tanggal Lahir"
                                                    value="{{old('dateTanggalLahir')}}"
                                                    required>
                                                <br>
                                                <input type="text" class="form-control" name="txtAgama"
                                                    id="txtAgama"
                                                    placeholder="Agama"
                                                    value="{{old('txtAgama')}}"
                                                    required>
                                                <br>
                                                <input type="text" class="form-control" name="txtNoTelepon"
                                                    id="txtNoTelepon"
                                                    placeholder="NoTelepon"
                                                    value="{{old('txtNoTelepon')}}"
                                                    required>
                                                <br>
                                                <input type="text" class="form-control" name="txtJabatan"
                                                    id="txtJabatan"
                                                    placeholder="Jabatan"
                                                    value="{{old('txtJabatan')}}"
                                                    required>
                                                <br>
                                                    <input type="text" class="form-control" name="txtJenisKelamin"
                                                        id="txtJenisKelamin"
                                                        placeholder="JenisKelamin"
                                                        value="{{old('txtJenisKelamin')}}"
                                                        required>
                                                <br>
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

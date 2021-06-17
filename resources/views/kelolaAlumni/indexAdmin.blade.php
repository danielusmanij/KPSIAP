@extends('layout/main')

@section('container')
    <div class="main">
        <!-- MAIN CONTENT -->
        <div class="main-content">
            <div class="container-fluid">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Kelola Alumni</h3>
                    </div>
                    <div class="panel-body">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>ID Alumni</th>
                                <th>Tanggal Lulus</th>
                                <th>Nama</th>
                                <th>ID Sekolah</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($kelolaAlumni as $data)
                                <tr>
                                    <td>
                                        {{$data->id_alumni}}
                                    </td>
                                    <td>
                                        {{$data->tahun_lulus}}
                                    </td>
                                    <td>
                                        {{$data->nama_depan}} {{$data->nama_belakang}}
                                    </td>
                                    <td>
                                        {{$data->id_sekolah}}
                                    </td>
                                    <td style="display: flex;">
                                        <button>
                                            <a href="/kelolaAlumniAdmin/{{session('id_user')}}/{{$data->id_alumni}}/edit"><span
                                                class="glyphicon glyphicon-edit"></span></a>
                                        </button>
                                        <form
                                        action="/kelolaAlumniAdmin/{{session('id_user')}}/{{$data->id_alumni}}"
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
                                            <form method="post" action="/kelolaAlumniAdmin/{{session('id_user')}}" enctype="multipart/form-data">
                                                {{ csrf_field() }}
                                                <div class="form-group">
                                                    <label>Input Data Alumni</label>
                                                </div>
                                                <input type="text" class="form-control" name="txtidAlumni"
                                                       id="idAlumni"
                                                       placeholder="ID Alumni "
                                                       required>
                                                <br>
                                                <input type="text" class="form-control" name="txtNamaDepan"
                                                       id="nama_depan"
                                                       placeholder="Nama Depan"
                                                       required>
                                                <br>
                                                <input type="text" class="form-control" name="txtNamaBelakang"
                                                       id="nama_belakang"
                                                       placeholder="Nama Belakang"
                                                       required>
                                                <br>
                                                <input type="text" class="form-control" name="txtidSekolah"
                                                       id="idSekolah"
                                                       placeholder="ID Sekolah"
                                                       required>
                                                <br>
                                                <label for ="tanggal_lulus">Tahun Lulus</label>
                                                <br>
                                                <input type="date" name="dateTahunLulus"
                                                       id="tahun_lulus"
                                                       placeholder="Tahun Lulus"
                                                       required>
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

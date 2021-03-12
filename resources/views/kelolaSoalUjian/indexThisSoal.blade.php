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
                        <h3 class="panel-title">Kelola Soal Ujian</h3>
                    </div>
                    <div class="panel-body">
                        @foreach ($kelolaSoalUjian->unique('nama_mata_pelajaran') as $data)
                            <h3 class="panel-title">{{$data->nama_mata_pelajaran}}</h3>
                            <br>
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>Keterangan Soal</th>
                                    <th>File Soal</th>
                                    <th>Jawaban Siswa</th>
                                    <th>Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($kelolaSoalUjian as $data2)
                                    <tr>
                                        <td>{{$data2->keterangan_soal}}</td>
                                        <td>
                                            <a href="{{asset('assets/fileSoal')}}/{{$data2->file_soal}}" download="" target="_blank">{{$data2->file_soal}}</a>
                                        </td>
                                        <td>
                                            <a href="/kelolaJawaban/{{session('id_user')}}/{{$data2->kode_mata_pelajaran}}/{{$data2->id_soal_ujian}}" class="btn btn-default">Jawaban Siswa</a>
                                        </td>
                                        <td style="display: flex;">
                                            <button><a
                                                    href="/kelolaSoalUjian/{{session('id_user')}}/{{$data2->kode_mata_pelajaran}}/{{$data2->keterangan_soal}}/edit"><span
                                                        class="glyphicon glyphicon-edit"></span></a>
                                            </button>
                                            <form
                                                action="/kelolaSoalUjian/{{session('id_user')}}/{{$data2->kode_mata_pelajaran}}/{{$data2->id_soal_ujian}}/{{$data2->file_soal}}"
                                                method="post">
                                                @method('delete')
                                                {{ csrf_field() }}
                                                <button><a style="color:red"
                                                           onclick="return confirm('Anda yakin menghapus soal ini?')"><span
                                                            class="glyphicon glyphicon-trash"></span></a>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

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
                                                <form method="post" action="/kelolaSoalUjian/{{session('id_user')}}/{{$data->kode_mata_pelajaran}}" enctype="multipart/form-data">
                                                    {{ csrf_field() }}
                                                    <div class="form-group">
                                                        <label for="txtKeteranganSoal">Keterangan Soal</label>
                                                        <input type="text" class="form-control" name="txtKeteranganSoal"
                                                               id="txtKeteranganSoal"
                                                               placeholder="Keterangan Soal"
                                                               required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleFormControlFile1">Pilih File Soal</label>
                                                        <input type="file" name="file_soal" class="form-control-file"
                                                               id="exampleFormControlFile1" required>
                                                    </div>
                                                    <input type="submit" name="btnSubmit"
                                                           class="btn btn-primary btn-lg btn-block">
                                                </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <br>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

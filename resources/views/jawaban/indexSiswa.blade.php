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
                        <h3 class="panel-title">Kelola Jawaban</h3>
                    </div>
                    <div class="panel-body">
                        @foreach($jawaban->unique('nama_mata_pelajaran') as $data)
                            <h3 class="panel-title">{{$data->nama_mata_pelajaran}}</h3>
                        @endforeach
                        <br>
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Nama Siswa</th>
                                <th>File Jawaban</th>
                                <th>Nilai</th>
                                <th>Upload Jawaban</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($jawaban as $data)
                                <tr>
                                    <td>
                                        {{$data->nama_depan}} {{$data->nama_belakang}}
                                    </td>
                                    <td>
                                        <a href="{{asset('assets/fileJawaban')}}/{{$data->file_jawaban}}" download=""
                                           target="_blank">{{$data->file_jawaban}}</a>
                                    </td>
                                    <td>
                                        {{$data->poin_nilai}}
                                    </td>
                                    <td>
                                        <input type="file" name="file">
                                        <input type="submit" value="Upload" class="btn btn-primary">
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        <br>
                        @if(count($checkJawaban) == null)
                        <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#exampleModal">
                                Masukkan Jawaban
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="post" action="/jawaban/{{session('id_user')}}/{{session('kode_mata_pelajaran')}}/{{session('id_soal_ujian')}}" enctype="multipart/form-data">
                                                {{ csrf_field() }}
                                                <div class="form-group">
                                                    <label for="exampleFormControlFile1">Pilih File Jawaban</label>
                                                    <input type="file" name="file_jawaban" class="form-control-file"
                                                           id="exampleFormControlFile1" required>
                                                </div>
                                                <input type="submit" name="btnSubmit"
                                                       class="btn btn-primary btn-lg btn-block">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

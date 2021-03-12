@extends('layout/main')
@section('container')
    <div class="main">
        <!-- MAIN CONTENT -->
        <div class="main-content">
            <div class="container-fluid">
                <div class="panel">
                    @foreach($kelolaPelajaran->unique('kode_mata_pelajaran') as $data)
                        <form method="post" action="/kelolaPelajaran/{{session('id_user')}}/{{$data->kode_mata_pelajaran}}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="panel-heading">
                            <h3 class="panel-title">Tambah Pertemuan</h3>
                        </div>
                        <div class="panel-body">
                            <h4 class="panel-title">{{$data->nama_mata_pelajaran}}</h4>
                            <br>
                            <input type="text" class="form-control" name="txtNamaPertemuan"
                                   id="txtNamaPertemuan"
                                   placeholder="Nama Pertemuan"
                                   required></li>
                            <input type="text" class="form-control" name="txtKeteranganPertemuan"
                                   id="txtKeteranganPertemuan"
                                   placeholder="Keterangan Pertemuan"
                                   required></li>
                            </select>
                            <br><br>
                            <input type="submit" name="btnSubmit"
                                   class="btn btn-primary btn-lg btn-block">
                            <a href="{{ url()->previous() }}"
                               class="btn btn-default btn-lg btn-block">Cancel</a>
                        </div>
                    </form>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

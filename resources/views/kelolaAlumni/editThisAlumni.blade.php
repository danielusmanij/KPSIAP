@extends('layout/main')

@section('container')
<div class="main">
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">Ubah Data Alumni</h3>
                </div>
                {{-- @foreach($kelolaAlumni as $data) --}}
                <div class="panel-body">
                    <form method="post"
                        action="/kelolaAlumniAdmin/{{session('id_user')}}/{{$data->id_alumni}}"
                        enctype="multipart/form-data">
                        @method('patch')
                        {{ csrf_field() }}
                        <input type="text" class="form-control" name="txtNamaDepan"
                                    id="txtNamaDepan"
                                    placeholder="Nama Depan"
                                    required>
                            <br>
                            <input type="text" class="form-control" name="txtNamaBelakang"
                                    id="txtNamaBelakang"
                                    placeholder="Nama Belakang"
                                    required>
                            <br>
                            <label for ="tanggal_lulus">Tanggal Lulus</label>
                            <br>
                            <input type="date" name="dateTanggalLulus"
                                    id="dateTanggalLulus"
                                    placeholder="Tanggal Lulus"
                                    required>
                            <br>
                        <br><br>
                            <input type="submit" name="btnSubmitEdit"
                                class="btn btn-primary btn-lg btn-block">
                            <a href="{{ url()->previous() }}"
                                class="btn btn-default btn-lg btn-block">Cancel</a>
                    </form>
                </div>
                {{-- @endforeach --}}
            </div>
        </div>
    </div>
</div>
@endsection

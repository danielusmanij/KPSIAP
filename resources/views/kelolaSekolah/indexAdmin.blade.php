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
                        <h3 class="panel-title">Kelola Sekolah</h3>
                    </div>
                    <div class="panel-body">
                        @foreach($kelolaSekolah as $data)
                        <img class="content" src="{{$data->getSchoolPhoto()}}"
                             width="500px" height="200px">
                        <h3 class="name">{{$data->nama_sekolah}}</h3>
                        <h5 class="name">{{$data->alamat_sekolah}}</h5>
                        <h5 class="name">Nomor Telepon : {{$data->no_telepon_sekolah}}</h5>
                        <h5 class="name">
                            Kurikulum : @if($data->id_kurikulum == 'K04') 2004
                            @elseif($data->id_kurikulum == 'K06') 2006
                            @elseif($data->id_kurikulum == 'K13') 2013
                            @endif
                        </h5>
                            <a href="/kelolaSekolahAdmin/{{session('id_user')}}/{{$data->id_sekolah}}/edit" class="btn btn-info">Ubah Data</a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

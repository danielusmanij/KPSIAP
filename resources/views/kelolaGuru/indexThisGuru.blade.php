@extends('layout/main')
@section('container')
        <!-- MAIN -->
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
                    <div class="panel panel-profile">
                        <div class="clearfix">
                            <!-- LEFT COLUMN -->
                            <div class="profile-left">
                                <!-- PROFILE HEADER -->
                                <div class="profile-header">
                                    <div class="overlay"></div>
                                    <div class="profile-main">
                                        <img src="{{$guru->getProfilePhoto()}}" width="100px" height="100px"
                                             class="img-circle">
                                        <h3 class="name">{{$guru->nama_depan}} {{$guru->nama_belakang}}</h3>

                                        <h4>Guru</h4>

                                    </div>
                                </div>
                                <!-- END PROFILE HEADER -->
                                <!-- PROFILE DETAIL -->
                                <div class="profile-detail">
                                    <div class="profile-info">
                                        <h4 class="heading">Informasi Diri</h4>
                                        <ul class="list-unstyled list-justify">
                                            <li>Tanggal Lahir <span>{{$guru->tanggal_lahir}}</span></li>
                                            <li>Agama <span>{{$guru->agama}}</span></li>
                                            <li>Nomor Telepon <span>{{$guru->no_telepon}}</span></li>
                                            <li>Jabatan <span>{{$guru->jabatan}}</span></li>
                                            <li>Jenis Kelamin <span>@if($guru->jenis_kelamin == 'P') Perempuan
                                                    @elseif($guru->jenis_kelamin == 'L') Laki-Laki
                                                    @endif
                                                </span></li>
                                            <br>
                                            <li><span><a href="/kelolaGuruAdmin/{{session('id_user')}}/{{$guru->NIP}}/edit" class="btn btn-info">Ubah Data</a></span></li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- END PROFILE DETAIL -->
                            </div>
                            <!-- END LEFT COLUMN -->
                            <!-- RIGHT COLUMN -->
                            <div class="profile-right">
                                <div class="custom-tabs-line tabs-line-bottom left-aligned">
                                    <ul class="nav" role="tablist">
                                        <li class="active"><a href="#tab-bottom-left1" role="tab"
                                                              data-toggle="tab">Sekolah</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="tab-content">
                                    <div class="tab-pane fade in active" id="tab-bottom-left1">
                                        <img class="content" src="{{$sekolah->getSchoolPhoto()}}"
                                             width="500px" height="200px">
                                        <h3 class="name">{{$sekolah->nama_sekolah}}</h3>
                                        <h5 class="name">{{$sekolah->alamat_sekolah}}</h5>
                                        <h5 class="name">Nomor Telepon : {{$sekolah->no_telepon_sekolah}}</h5>
                                        <h5 class="name">
                                            Kurikulum : @if($sekolah->id_kurikulum == 'K04') 2004
                                            @elseif($sekolah->id_kurikulum == 'K06') 2006
                                            @elseif($sekolah->id_kurikulum == 'K13') 2013
                                            @endif
                                        </h5>
                                    </div>
                                    <br><br>
                                </div>
                            </div>
                        </div>
                        <!-- END RIGHT COLUMN -->
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT -->
        </div>
        <!-- END MAIN -->
@endsection

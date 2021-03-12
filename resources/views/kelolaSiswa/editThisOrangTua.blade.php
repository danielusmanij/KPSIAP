@extends('layout/main')
@section('container')
    <!-- MAIN -->
    <div class="main">
        <!-- MAIN CONTENT -->
        <div class="main-content">
            <div class="container-fluid">
                <div class="panel panel-profile">
                    <div class="clearfix">
                        <!-- LEFT COLUMN -->
                        <div class="profile-left">
                            <!-- PROFILE HEADER -->
                            <div class="profile-header">
                                <div class="overlay"></div>
                                <div class="profile-main">
                                    <img src="{{$siswa->getProfilePhoto()}}" width="100px" height="100px"
                                         class="img-circle">
                                    <h3 class="name">{{$siswa->nama_depan}} {{$siswa->nama_belakang}}</h3>

                                    <h4>{{$role->nama_role}} - {{$kelas->tingkat_kelas}}
                                        - {{$kelas->nama_kelas}}</h4>

                                </div>
                            </div>
                            <!-- END PROFILE HEADER -->
                            <!-- PROFILE DETAIL -->
                            <div class="profile-detail">
                                <div class="profile-info">
                                    <h4 class="heading">Informasi Diri</h4>
                                    <ul class="list-unstyled list-justify">
                                        <li>Tanggal Lahir <span>{{$siswa->tanggal_lahir}}</span></li>
                                        <li>Alamat <span>{{$siswa->alamat_siswa}}</span></li>
                                        <li>Agama <span>{{$siswa->agama}}</span></li>
                                        <li>Nomor Telepon <span>{{$siswa->no_telepon}}</span></li>
                                        <li>Jenis Kelamin <span>@if($siswa->jenis_kelamin == 'P') Perempuan
                                                @elseif($siswa->jenis_kelamin == 'L') Laki-Laki
                                                @endif
                                                </span></li>
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
                                    <li><a href="#tab-bottom-left1" role="tab"
                                           data-toggle="tab">Sekolah</a>
                                    </li>
                                    <li class="active"><a href="#tab-bottom-left2" role="tab" data-toggle="tab">Orang
                                            Tua</a></li>
                                </ul>
                            </div>
                            <div class="tab-content">
                                <div class="tab-pane " id="tab-bottom-left1">
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

                                    <br><br><br><br><br>
                                </div>
                                <div class="tab-pane fade in active" id="tab-bottom-left2">
                                    @foreach($orangTua as $data)
                                        <form method="post"
                                              action="/kelolaSiswaAdmin/{{session('id_user')}}/{{$siswa->NIS}}/{{$data->id_orang_tua}}">
                                            @method('patch')
                                            {{ csrf_field() }}
                                            <div class="profile-detail">
                                                <h4 class="heading">Informasi Orang Tua</h4>
                                                <ul class="list-unstyled list-justify">
                                                    <li><input type="text" class="form-control"
                                                               name="txtNamaDepanOrangTua"
                                                               id="txtNamaDepanOrangTua"
                                                               placeholder="Nama Depan" value="{{$data->nama_depan}}"
                                                               required></li>
                                                    <li><input type="text" class="form-control"
                                                               name="txtNamaBelakangOrangTua"
                                                               id="txtNamaBelakangOrangTua"
                                                               placeholder="Nama Belakang"
                                                               value="{{$data->nama_belakang}}"
                                                               required></li>
                                                    <li><input type="text" class="form-control" name="txtAlamatOrangTua"
                                                               id="txtAlamatOrangTua"
                                                               placeholder="Alamat" value="{{$data->alamat_orang_tua}}"
                                                               required></li>
                                                    <li><input type="text" class="form-control"
                                                               name="txtKeteranganStatus"
                                                               id="txtKeteranganStatus"
                                                               placeholder="Keterangan Status"
                                                               value="{{$data->keterangan_status}}"
                                                               required></li>
                                                    <li><input type="text" class="form-control" name="txtNomorTelepon"
                                                               id="txtNomorTelepon"
                                                               placeholder="Nomor Telepon"
                                                               value="{{$data->nomor_telepon}}"
                                                               required></li>
                                                    <li><input type="text" class="form-control" name="txtPerkerjaan"
                                                               id="txtPerkerjaan"
                                                               placeholder="Perkerjaan" value="{{$data->perkerjaan}}"
                                                               required></li>
                                                </ul>
                                            </div>
                                            <input type="submit" name="btnSubmit"
                                                   class="btn btn-primary btn-lg btn-block">
                                            <a href="{{ url()->previous() }}"
                                               class="btn btn-default btn-lg btn-block">Cancel</a>
                                        </form>
                                    @endforeach
                                    @if($checkOrangTua == 1)
                                        <br><br><br><br><br><br><br><br><br><br>
                                    @elseif($checkOrangTua == 0)
                                        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END RIGHT COLUMN -->
                </div>
            </div>
            <!-- END MAIN CONTENT -->
        </div>
        <!-- END MAIN -->
@endsection

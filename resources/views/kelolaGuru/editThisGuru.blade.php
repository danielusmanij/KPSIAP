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
                                        <img src="{{$guru->getProfilePhoto()}}" width="100px" height="100px"
                                             class="img-circle">
                                        <h3 class="name">{{$guru->nama_depan}} {{$guru->nama_belakang}}</h3>

                                        <h4>{{$role->nama_role}}</h4>

                                    </div>
                                </div>
                                <!-- END PROFILE HEADER -->
                                <!-- PROFILE DETAIL -->
                                <div class="profile-detail">
                                    <div class="profile-info">
                                            <form method="post"
                                                  action="/kelolaGuruAdmin/{{session('id_user')}}/{{$guru->NIP}}">
                                                @method('patch')
                                                {{ csrf_field() }}
                                                <div class="form-group">
                                                    <ul class="list-unstyled list-justify">
                                                        <li><input type="text" class="form-control" name="txtNamaDepanGuru"
                                                                   id="txtNamaDepanGuru"
                                                                   placeholder="Nama Depan" value="{{$guru->nama_depan}}"
                                                                   required></li>
                                                        <li><input type="text" class="form-control" name="txtNamaBelakangGuru"
                                                                   id="txtNamaBelakangGuru"
                                                                   placeholder="Nama Belakang" value="{{$guru->nama_belakang}}"
                                                                   required></li>
                                                    <li>Tanggal Lahir<span><input type="date" value="{{$guru->tanggal_lahir}}" name="txtTanggalLahir"
                                                           id="txtTanggalLahir"></span></li>
                                                        <li><input type="text" class="form-control" name="txtAgamaGuru"
                                                                                     id="txtAgamaGuru"
                                                                                     placeholder="Agama" value="{{$guru->agama}}"
                                                                                     required></li>
                                                        <li><input type="text" class="form-control" name="txtNoTelepon"
                                                                   id="txtNoTelepon"
                                                                   placeholder="Nomor Telepon" value="{{$guru->no_telepon}}"
                                                                   required></li>
                                                        <li><input type="text" class="form-control" name="txtJabatan"
                                                                   id="txtJabatan"
                                                                   placeholder="Jabatan" value="{{$guru->jabatan}}"
                                                                   required></li>
                                                        <li>Jenis Kelamin<span><select name="txtJenisKelamin" id="txtJenisKelamin">
                                                            <option value="L">Laki-Laki</option>
                                                            <option value="P">Perempuan</option>
                                                                </select></span></li>
                                                    </ul>
                                                </div>
                                                <input type="submit" name="btnSubmit"
                                                       class="btn btn-primary btn-lg btn-block">
                                                <a href="{{ url()->previous() }}"
                                                   class="btn btn-default btn-lg btn-block">Cancel</a>
                                            </form>
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
                                            @elseif($sekolah->id_kurikulum == 'K94') 1994
                                            @endif
                                        </h5>

                                        <br><br><br><br><br><br><br><br><br>
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

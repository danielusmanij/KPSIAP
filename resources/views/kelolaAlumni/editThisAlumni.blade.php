@extends('layout/main')
@section('container')
    @if(session('id_role') == 2)
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
                                <div class="tab-content">
                                    <h4 class="heading">Ubah Nilai</h4>
                                    @foreach ($nilai->unique('nama_mata_pelajaran') as $data)
                                        <form method="post"
                                              action="/kelolaSiswaGuru/{{session('id_user')}}/{{$data->NIS}}/{{$data->id_soal_ujian}}/{{$data->id_nilai}}/{{$data->kode_mata_pelajaran}}">
                                            @method('patch')
                                            {{ csrf_field() }}
                                            <h3 class="panel-title">[{{$data->nama_mata_pelajaran}}]
                                                [{{$data->keterangan_soal}}]</h3>
                                            <br>
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="txtPoinNilai"
                                                       id="txtPoinNilai"
                                                       placeholder="Poin Nilai" value="{{ $data->poin_nilai }}"
                                                       required>
                                            </div>
                                            <input type="submit" name="btnSubmit"
                                                   class="btn btn-primary btn-lg btn-block">
                                            <a href="{{ url()->previous() }}"
                                               class="btn btn-default btn-lg btn-block">Cancel</a>
                                        </form>
                                    @endforeach
                                    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
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
    @elseif(session('id_role') == 1)
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
                                            <form method="post"
                                                  action="/kelolaSiswaAdmin/{{session('id_user')}}/{{$siswa->NIS}}">
                                                @method('patch')
                                                {{ csrf_field() }}
                                                <div class="form-group">
                                                    <ul class="list-unstyled list-justify">
                                                        <li><input type="text" class="form-control" name="txtNamaDepanSiswa"
                                                                   id="txtNamaDepanSiswa"
                                                                   placeholder="Nama Depan" value="{{$siswa->nama_depan}}"
                                                                   required></li>
                                                        <li><input type="text" class="form-control" name="txtNamaBelakangSiswa"
                                                                   id="txtNamaBelakangSiswa"
                                                                   placeholder="Nama Belakang" value="{{$siswa->nama_belakang}}"
                                                                   required></li>
                                                    <li>Tanggal Lahir<span><input type="date" value="{{ $siswa->tanggal_lahir }}" name="txtTanggalLahir"
                                                           id="txtTanggalLahir"></span></li>
                                                    <li><input type="text" class="form-control" name="txtAlamatSiswa"
                                                                                 id="txtAlamatSiswa"
                                                                                 placeholder="Alamat" value="{{$siswa->alamat_siswa}}"
                                                                                 required></li>
                                                        <li><input type="text" class="form-control" name="txtAgamaSiswa"
                                                                                     id="txtAgamaSiswa"
                                                                                     placeholder="Agama" value="{{$siswa->agama}}"
                                                                                     required></li>
                                                        <li><input type="text" class="form-control" name="txtNoTelepon"
                                                                   id="txtNoTelepon"
                                                                   placeholder="Nomor Telepon" value="{{$siswa->no_telepon}}"
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
                                        <li><a href="#tab-bottom-left2" role="tab" data-toggle="tab">Orang Tua</a></li>
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
                                    <div class="tab-pane" id="tab-bottom-left2">
                                        @foreach($orangTua as $data)
                                            <div class="profile-detail">
                                                <h4 class="heading">Informasi Orang Tua</h4>
                                                <ul class="list-unstyled list-justify">
                                                    <li>Nama<span>{{$data->nama_depan}} {{$data->nama_belakang}}</span>
                                                    </li>
                                                    <li>Alamat<span>{{$data->alamat_orang_tua}}</span></li>
                                                    <li>Status<span>{{$data->keterangan_status}}</span></li>
                                                    <li>Nomor Telepon<span>{{$data->nomor_telepon}}</span></li>
                                                    <li>Pekerjaan<span>{{$data->perkerjaan}}</span></li>
                                                </ul>
                                            </div>
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
    @endif
@endsection

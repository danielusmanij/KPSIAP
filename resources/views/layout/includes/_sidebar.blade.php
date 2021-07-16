<div id="sidebar-nav" class="sidebar">
    <div class="sidebar-scroll">
        <nav>
            <ul class="nav">
                <li><a href="{{url('/dashboard')}}" @if(Request::path() === 'dashboard') class="active" @endif><i
                            class="fa fa-home"></i> <span>Dashboard</span></a></li>
                @if(session('id_role')==1)
                    <li><a href="/kelolaAlumniAdmin/{{session('id_user')}}" @if(Request::path() === 'kelolaAlumniAdmin/' . session('id_user')) class="active" @elseif(Request::is('kelolaAlumniAdmin/' . session('id_user') . '/*')) class="active" @endif><i class="fas fa-graduation-cap"></i> <span>Alumni</span></a></li>
                    <li><a href="/kelolaSiswaAdmin/{{session('id_user')}}" @if(Request::path() === 'kelolaSiswaAdmin/' . session('id_user')) class="active" @elseif(Request::is('kelolaSiswaAdmin/' . session('id_user') . '/*')) class="active" @endif><i class="fas fa-user-alt"></i> <span>Siswa</span></a></li>
                    <li><a href="/kelolaGuruAdmin/{{session('id_user')}}" @if(Request::path() === 'kelolaGuruAdmin/' . session('id_user')) class="active" @elseif(Request::is('kelolaGuruAdmin/' . session('id_user') . '/*')) class="active" @endif><i class="fas fa-chalkboard-teacher"></i> <span>Guru</span></a></li>
                    <li><a href="/kelolaSekolahAdmin/{{session('id_user')}}" @if(Request::path() === 'kelolaSekolahAdmin/' . session('id_user')) class="active" @elseif(Request::is('kelolaSekolahAdmin/' . session('id_user') . '/*')) class="active" @endif><i class="fas fa-archway"></i> <span>Sekolah</span></a></li>
                    <li><a href="/kelolaKegiatanSekolahAdmin/{{session('id_user')}}" @if(Request::path() === 'kelolaKegiatanSekolahAdmin/' . session('id_user')) class="active" @elseif(Request::is('kelolaKegiatanSekolahAdmin/' . session('id_user') . '/*')) class="active" @endif><i class="far fa-newspaper"></i> <span>Kegiatan Sekolah</span></a></li>
                    <li><a href="/kelolaSppSiswa/{{session('id_user')}}" @if(Request::path() === 'kelolaSppSiswa/' . session('id_user')) class="active" @elseif(Request::is('kelolaSppSiswa/' . session('id_user') . '/*')) class="active" @endif><i class="fas fa-graduation-cap"></i> <span>SPP Siswa</span></a></li>
                @elseif(session('id_role')==2)
                    <li><a href="/jadwalGuru/{{session('id_user')}}" @if(Request::path() === 'jadwalGuru/' . session('id_user')) class="active" @elseif(Request::is('jadwalGuru/' . session('id_user') . '/*')) class="active" @endif><i class="far fa-calendar-alt"></i> <span>Jadwal</span></a></li>
                    <li><a href="/kelolaSiswaGuru/{{session('id_user')}}" @if(Request::path() === 'kelolaSiswaGuru/' . session('id_user')) class="active" @elseif(Request::is('kelolaSiswaGuru/' . session('id_user') . '/*')) class="active" @endif><i class="fas fa-user-alt"></i> <span>Kelola Siswa</span></a></li>
                    <li><a href="/kelolaPelajaran/{{session('id_user')}}" @if(Request::path() === 'kelolaPelajaran/' . session('id_user')) class="active" @elseif(Request::is('kelolaPelajaran/' . session('id_user') . '/*')) class="active" @endif><i class="fas fa-clone"></i> <span>Kelola Pelajaran</span></a></li>
                    <li><a href="/kelolaSoalUjian/{{session('id_user')}}" @if(Request::path() === 'kelolaSoalUjian/' . session('id_user')) class="active" @elseif(Request::is('kelolaSoalUjian/' . session('id_user') . '/*')) class="active" @elseif(Request::is('kelolaJawaban/' . session('id_user') . '/*')) class="active" @endif><i class="far fa-clone"></i> <span>Kelola Soal Ujian</span></a></li>
                    <li><a href="/presensiGuru/{{session('id_user')}}" @if(Request::path() === 'presensiGuru/' . session('id_user')) class="active" @endif><i class="far fa-calendar-check"></i> <span>Presensi Kehadiran</span></a></li>
                    <li><a href="/kehadiranSiswa/{{session('id_user')}}" @if(Request::path() === 'kehadiranSiswa/' . session('id_user')) class="active" @endif><i class="far fa-calendar-check"></i> <span>Kehadiran Siswa</span></a></li>
                @elseif(session('id_role')==3)
                    <li><a href="/jadwalSiswa/{{session('id_user')}}" @if(Request::path() === 'jadwalSiswa/' . session('id_user')) class="active" @endif><i class="far fa-calendar-alt"></i> <span>Jadwal</span></a></li>
                    <li><a href="/nilai/{{session('id_user')}}" @if(Request::path() === 'nilai/' . session('id_user')) class="active" @endif><i class="far fa-copy"></i> <span>Nilai</span></a></li>
                    <li><a href="/rapor/{{session('id_user')}}"@if(Request::path() === 'rapor/' . session('id_user')) class="active" @endif><i class="far fa-clipboard"></i> <span>Rapor</span></a></li>
                    <li><a href="/soalUjian/{{session('id_user')}}" @if(Request::path() === 'soalUjian/' . session('id_user')) class="active" @elseif(Request::is('soalUjian/' . session('id_user') . '/*')) class="active" @elseif(Request::is('jawaban/' . session('id_user') . '/*')) class="active" @endif><i class="far fa-clone"></i> <span>Soal Ujian</span></a></li>
                    <li><a href="/spp/{{session('id_user')}}" @if(Request::path() === 'spp/' . session('id_user')) class="active" @endif><i class="fas fa-money"></i> <span>SPP</span></a></li>
                    <li><a href="/presensiSiswa/{{session('id_user')}}" @if(Request::path() === 'presensiSiswa/' . session('id_user')) class="active" @endif><i class="far fa-calendar-check"></i> <span>Presensi Kehadiran</span></a>
                @elseif(session('id_role')==4)
                    <li><a href="/nilaiAlumni/{{session('id_user')}}" @if(Request::path() === 'nilaiAlumni/' . session('id_user')) class="active" @endif><i class="far fa-calendar-alt"></i> <span>Nilai</span></a></li>
                    <li><a href="/ijazah/{{session('id_user')}}" @if(Request::path() === 'ijazah/' . session('id_user')) class="active" @endif><i class="fas fa-book-reader"></i> <span>Ijazah</span></a></li>
                @endif
            </ul>
        </nav>
    </div>
</div>

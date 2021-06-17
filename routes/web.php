<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::group(['middleware' => 'CheckLoginMiddleware'], function() {

    // Home
    Route::get('/dashboard', 'DashboardController@index');

    // profilePhoto
    Route::get('/profile/{id_user}', 'ProfileController@index');
    Route::get('/profile/{id_user}/editPhoto', 'ProfileController@editPhoto');
    Route::patch('/profile/{id_user}', 'ProfileController@update');

    // Edit Password
    Route::get('/editPassword/{id_user}', 'EditPasswordController@index');
    Route::patch('/editPassword/{id_user}', 'EditPasswordController@update');

    // Jadwal
    //--Siswa
    Route::get('/jadwalSiswa/{id_user}', 'JadwalController@indexSiswa');
    //--Guru
    Route::get('/jadwalGuru/{id_user}', 'JadwalController@indexGuru');
    Route::get('/jadwalGuru/{id_user}/{kode_mata_pelajaran}', 'JadwalController@indexGuruThisMataPelajaran');

    // Nilai
    //--Siswa
    Route::get('/nilai/{id_user}', 'NilaiController@index');

    // Rapor
    //--Siswa
    Route::get('/rapor/{id_user}', 'RaporController@index');

    // SPP
    //--Siswa
    Route::get('/spp/{id_user}', 'SppController@index');
    // Presensi
    //--Siswa
    Route::get('/presensiSiswa/{id_user}', 'PresensiController@indexSiswa');
    Route::post('/presensiSiswa/{id_user}', 'PresensiController@storeSiswa');
    //--Guru
    Route::get('/presensiGuru/{id_user}', 'PresensiController@indexGuru');
    Route::post('/presensiGuru/{id_user}', 'PresensiController@storeGuru');

    // Kelola Alumni
    // --Admin
    Route::get('/kelolaAlumniAdmin/{id_user}', 'KelolaAlumniController@indexAdmin');
    Route::get('/kelolaAlumniAdmin/{id_user}/{id_alumni}', 'KelolaAlumniController@indexThisAlumniAdmin');
    Route::get('/kelolaAlumniAdmin/{id_user}/{id_alumni}/edit', 'KelolaAlumniController@editThisAlumniAdmin');
    Route::post('/kelolaAlumniAdmin/{id_user}', 'KelolaAlumniController@storeThisAlumni');
    Route::delete('/kelolaAlumniAdmin/{id_user}/{id_alumni}', 'KelolaAlumniController@destroyThisAlumni');
    Route::patch('/kelolaAlumniAdmin/{id_user}/{id_alumni}', 'KelolaAlumniController@updateThisAdmin');
     //Ijazah
     Route::get('/ijazah', 'IjazahController@index');
     Route::get('/download', 'IjazahController@getDownload');
     //Sertifikat
     Route::get('/sertifikat', 'SertifikatController@index');
     Route::get('/download', 'SertifikatController@getDownload');


    // Kelola Siswa
    //--Guru
    Route::get('/kelolaSiswaGuru/{id_user}', 'KelolaSiswaController@indexGuru');
    Route::get('/kelolaSiswaGuru/{id_user}/{NIS}/{kode_mata_pelajaran}', 'KelolaSiswaController@indexThisSiswaGuru');
    Route::get('/kelolaSiswaGuru/{id_user}/{NIS}/{id_soal_ujian}/{id_nilai}/edit', 'KelolaSiswaController@editThisSiswaGuru');
    Route::patch('/kelolaSiswaGuru/{id_user}/{NIS}/{id_soal_ujian}/{id_nilai}/{kode_mata_pelajaran}', 'KelolaSiswaController@updateNilai');
    //--Admin
    Route::get('/kelolaSiswaAdmin/{id_user}', 'KelolaSiswaController@indexAdmin');
    Route::get('/kelolaSiswaAdmin/{id_user}/{NIS}', 'KelolaSiswaController@indexThisSiswaAdmin');
    Route::get('/kelolaSiswaAdmin/{id_user}/{NIS}/edit', 'KelolaSiswaController@editThisSiswaAdmin');
    Route::patch('/kelolaSiswaAdmin/{id_user}/{NIS}', 'KelolaSiswaController@updateThisSiswa');
    Route::get('/kelolaSiswaAdmin/{id_user}/{NIS}/{id_orang_tua}/edit', 'KelolaSiswaController@editThisOrangTua');
    Route::patch('/kelolaSiswaAdmin/{id_user}/{NIS}/{id_orang_tua}', 'KelolaSiswaController@updateThisOrangTua');

    //Kelola Guru
    //--Admin
    Route::get('/kelolaGuruAdmin/{id_user}', 'KelolaGuruController@indexAdmin');
    Route::get('/kelolaGuruAdmin/{id_user}/{NIP}', 'KelolaGuruController@indexThisGuruAdmin');
    Route::get('/kelolaGuruAdmin/{id_user}/{NIP}/edit', 'KelolaGuruController@editThisGuruAdmin');
    Route::patch('/kelolaGuruAdmin/{id_user}/{NIP}', 'KelolaGuruController@updateThisGuruAdmin');

    //Kelola Sekolah
    //--Admin
    Route::get('/kelolaSekolahAdmin/{id_user}', 'KelolaSekolahController@indexAdmin');
    Route::get('/kelolaSekolahAdmin/{id_user}/{id_sekolah}/edit', 'KelolaSekolahController@editThisSekolahAdmin');
    Route::patch('/kelolaSekolahAdmin/{id_user}/{id_sekolah}', 'KelolaSekolahController@updateThisSekolahAdmin');

    //Kelola Kegiatan Sekolah
    //--Admin
    Route::get('/kelolaKegiatanSekolahAdmin/{id_user}', 'KelolaKegiatanSekolahController@indexAdmin');
    Route::get('/kelolaKegiatanSekolahAdmin/{id_user}/{id_kegiatan}/edit', 'KelolaKegiatanSekolahController@editThisKegiatan');
    Route::patch('/kelolaKegiatanSekolahAdmin/{id_user}/{id_kegiatan}/{nama_kegiatan}', 'KelolaKegiatanSekolahController@updateThisKegiatan');
    Route::delete('/kelolaKegiatanSekolahAdmin/{id_user}/{id_kegiatan}/{nama_kegiatan}', 'KelolaKegiatanSekolahController@destroyThisKegiatan');
    Route::post('/kelolaKegiatanSekolahAdmin/{id_user}', 'KelolaKegiatanSekolahController@storeThisKegiatan');

    //Kelola Pelajaran
    //--Guru
    Route::get('/kelolaPelajaran/{id_user}', 'KelolaPelajaranController@indexGuru');
    Route::get('/kelolaPelajaran/{id_user}/{kode_mata_pelajaran}/{tambahPertemuan}', 'KelolaPelajaranController@indexThisPelajaran');
    Route::post('/kelolaPelajaran/{id_user}/{kode_mata_pelajaran}', 'KelolaPelajaranController@storeThisPertemuan');


    //Kelola Soal Ujian
    //--Guru
    Route::get('/kelolaSoalUjian/{id_user}', 'KelolaSoalUjianController@index');
    //~Soal Ujian
    Route::get('/kelolaSoalUjian/{id_user}/{kode_mata_pelajaran}', 'KelolaSoalUjianController@indexThisSoal');
    Route::get('/kelolaSoalUjian/{id_user}/{kode_mata_pelajaran}/{keterangan_soal}/edit', 'KelolaSoalUjianController@editThisSoal');
    Route::patch('/kelolaSoalUjian/{id_user}/{kode_mata_pelajaran}/{id_soal_ujian}/{file_soal}', 'KelolaSoalUjianController@updateThisSoal');
    Route::delete('/kelolaSoalUjian/{id_user}/{kode_mata_pelajaran}/{id_soal_ujian}/{file_soal}', 'KelolaSoalUjianController@destroyThisSoal');
    Route::post('/kelolaSoalUjian/{id_user}/{kode_mata_pelajaran}', 'KelolaSoalUjianController@storeThisSoal');
    //~Siswa
    Route::get('/soalUjian/{id_user}', 'SoalUjianController@index');
    Route::get('/soalUjian/{id_user}/{kode_mata_pelajaran}', 'SoalUjianController@indexThisSoal');


    //Kelola Jawaban
    //--Guru
    Route::get('/kelolaJawaban/{id_user}/{kode_mata_pelajaran}/{id_soal_ujian}', 'KelolaJawabanController@indexGuru');
    Route::get('/kelolaJawaban/{id_user}/{kode_mata_pelajaran}/{id_soal_ujian}/{id_nilai}/edit', 'KelolaJawabanController@editThisNilai');
    Route::patch('/kelolaJawaban/{id_user}/{kode_mata_pelajaran}/{id_soal_ujian}/{id_nilai}', 'KelolaJawabanController@updateThisNilai');
    //--Siswa
    Route::get('/jawaban/{id_user}/{kode_mata_pelajaran}/{id_soal_ujian}', 'JawabanController@indexSiswa');
    Route::post('/jawaban/{id_user}/{kode_mata_pelajaran}/{id_soal_ujian}', 'JawabanController@storeJawaban');


});


    // Login
    Route::get('/', 'AuthController@index');
    Route::post('/login', 'AuthController@login');

    // Logout
    Route::get('/logout', 'AuthController@logout');


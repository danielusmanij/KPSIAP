<?php

namespace App\Http\Controllers;

use App\Jadwal;
use App\PresensiGuru;
use App\PresensiSiswa;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PresensiController extends Controller
{
    public function indexSiswa($id_user){
        $presensiSiswa = Jadwal::
            select('jadwal.NIS', 'jadwal.hari', 'jadwal.waktu', 'jadwal.kode_mata_pelajaran', 'jadwal.id_jadwal', 'mata_pelajaran.kode_mata_pelajaran', 'mata_pelajaran.nama_mata_pelajaran', 'pertemuan.id_pertemuan', 'pertemuan.nama_pertemuan', 'pertemuan.id_jadwal', 'siswa.NIS')
            -> join('mata_pelajaran', 'jadwal.kode_mata_pelajaran', '=', 'mata_pelajaran.kode_mata_pelajaran')
            -> join('siswa', 'jadwal.NIS', '=', 'siswa.NIS')
            -> join ('pertemuan', 'jadwal.id_jadwal', '=', 'pertemuan.id_jadwal')
            -> where('jadwal.NIS', '=', session('id_user'))
            -> get();
        return view('presensiSiswa.index', ['presensiSiswa' => $presensiSiswa]);
    }
    public function storeSiswa(Request $request, $id_user)
    {
        $presensiSiswa = new PresensiSiswa;
        $presensiSiswa->tanggal_presensi_siswa = Carbon::now()->toDateTimeString();
        $presensiSiswa->waktu_presensi_siswa = Carbon::now()->toDateTimeString();
        $presensiSiswa->keterangan_presensi_siswa = 'HADIR';
        $presensiSiswa->id_pertemuan = $request->mataPelajaranGroup;
        $presensiSiswa->NIS = $id_user;

        $presensiSiswa->save();

        return redirect('/presensiSiswa/'. $id_user)->with('messageSuccess', 'Presensi Anda Berhasil Disimpan');

    }

    public function indexGuru($id_user){
        $presensiGuru = Jadwal::
            select('jadwal.NIP', 'jadwal.hari', 'jadwal.waktu', 'jadwal.kode_mata_pelajaran', 'jadwal.id_jadwal', 'mata_pelajaran.kode_mata_pelajaran', 'mata_pelajaran.nama_mata_pelajaran', 'pertemuan.id_pertemuan', 'pertemuan.nama_pertemuan', 'pertemuan.id_jadwal', 'guru.NIP')
            -> join('mata_pelajaran', 'jadwal.kode_mata_pelajaran', '=', 'mata_pelajaran.kode_mata_pelajaran')
            -> join('guru', 'jadwal.NIP', '=', 'guru.NIP')
            -> join ('pertemuan', 'jadwal.id_jadwal', '=', 'pertemuan.id_jadwal')
            -> where('jadwal.NIP', '=', session('id_user'))
            -> get();
        return view('presensiGuru.index', ['presensiGuru' => $presensiGuru]);
    }
    public function storeGuru(Request $request, $id_user)
    {
        $presensiGuru = new PresensiGuru;
        $presensiGuru->tanggal_presensi_guru = Carbon::now()->toDateTimeString();
        $presensiGuru->waktu_presensi_guru = Carbon::now()->toDateTimeString();
        $presensiGuru->keterangan_presensi_guru = 'HADIR';
        $presensiGuru->id_pertemuan = $request->mataPelajaranGroup;
        $presensiGuru->NIP = $id_user;

        $presensiGuru->save();

        return redirect('/presensiGuru/'. $id_user)->with('messageSuccess', 'Presensi Anda Berhasil Disimpan');

    }

}

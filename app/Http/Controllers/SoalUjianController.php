<?php

namespace App\Http\Controllers;

use App\SoalUjian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SoalUjianController extends Controller
{

    public function index($id_user){
        $soalUjian = DB::table('mata_pelajaran')
            -> select('mata_pelajaran.kode_mata_pelajaran', 'mata_pelajaran.nama_mata_pelajaran', 'mata_pelajaran.kkm', 'jadwal.kode_mata_pelajaran', 'jadwal.NIP', 'jadwal.NIS', 'jadwal.hari', 'jadwal.waktu')
            -> join('jadwal', 'mata_pelajaran.kode_mata_pelajaran', '=', 'jadwal.kode_mata_pelajaran')
            -> join('siswa', 'jadwal.NIS', '=', 'siswa.NIS')
            -> orderBy('jadwal.hari', 'DESC')
            -> orderBy('jadwal.waktu', 'ASC')
            -> where('jadwal.NIS', '=', $id_user)
            -> get();
        return view('soalUjian.index', ['soalUjian' => $soalUjian]);
    }

    public function indexThisSoal($id_user, $kode_mata_pelajaran){
        $kelolaSoalUjian = SoalUjian::
        select('soal_ujian.id_soal_ujian', 'soal_ujian.file_soal', 'soal_ujian.keterangan_soal', 'soal_ujian.kode_mata_pelajaran', 'mata_pelajaran.nama_mata_pelajaran')
            -> join('mata_pelajaran', 'mata_pelajaran.kode_mata_pelajaran', '=', 'soal_ujian.kode_mata_pelajaran')
            -> where('soal_ujian.kode_mata_pelajaran', '=', $kode_mata_pelajaran)
            -> orderBy('soal_ujian.keterangan_soal', 'ASC')
            -> get();
        return view('soalUjian.indexThisSoal', ['kelolaSoalUjian' => $kelolaSoalUjian]);
    }
}

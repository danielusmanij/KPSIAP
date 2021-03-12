<?php

namespace App\Http\Controllers;

use App\Nilai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NilaiController extends Controller
{
    public function index($id_user){
        $nilai = Nilai::
            select('nilai.poin_nilai', 'nilai.kode_mata_pelajaran', 'mata_pelajaran.nama_mata_pelajaran', 'soal_ujian.keterangan_soal')
            -> join('mata_pelajaran', 'nilai.kode_mata_pelajaran', '=', 'mata_pelajaran.kode_mata_pelajaran')
            -> join('soal_ujian', 'soal_ujian.id_soal_ujian', '=', 'nilai.id_soal_ujian')
            -> where('nilai.NIS', '=', session('id_user'))
            -> orderBy('mata_pelajaran.nama_mata_pelajaran')
            -> get();
        return view('nilai.index', ['nilai' => $nilai]);
    }
}

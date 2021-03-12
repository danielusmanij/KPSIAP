<?php

namespace App\Http\Controllers;

use App\Jadwal;
use App\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JadwalController extends Controller
{
    public function indexSiswa($id_user){
        $jadwal = Jadwal::
            select('jadwal.waktu', 'jadwal.hari', 'jadwal.kode_mata_pelajaran', 'mata_pelajaran.nama_mata_pelajaran')
            -> join('mata_pelajaran', 'jadwal.kode_mata_pelajaran', '=', 'mata_pelajaran.kode_mata_pelajaran')
            -> where('jadwal.NIS', '=', $id_user)
            -> orderBy('jadwal.hari', 'DESC')
            -> orderBy('jadwal.waktu', 'ASC')
            -> get();
        return view('jadwal.indexSiswa', ['jadwal' => $jadwal]);
    }

    public function indexGuru($id_user){
        $jadwal = Jadwal::
            select('jadwal.waktu', 'jadwal.hari', 'jadwal.kode_mata_pelajaran', 'mata_pelajaran.nama_mata_pelajaran')
            -> join('mata_pelajaran', 'jadwal.kode_mata_pelajaran', '=', 'mata_pelajaran.kode_mata_pelajaran')
            -> where('jadwal.NIP', '=', $id_user)
            -> orderBy('jadwal.hari', 'DESC')
            -> orderBy('jadwal.waktu', 'ASC')
            -> get();
        return view('jadwal.indexGuru', ['jadwal' => $jadwal]);
    }

    public function indexGuruThisMataPelajaran($id_user, $kode_mata_pelajaran){
        $getNIS = Jadwal::where('kode_mata_pelajaran', $kode_mata_pelajaran)->get();

        foreach($getNIS->unique('kode_mata_pelajaran') as $data) {
            $jadwal = Jadwal::
                select('jadwal.waktu', 'jadwal.hari', 'jadwal.kode_mata_pelajaran', 'mata_pelajaran.nama_mata_pelajaran')
                ->join('mata_pelajaran', 'jadwal.kode_mata_pelajaran', '=', 'mata_pelajaran.kode_mata_pelajaran')
                ->where('jadwal.NIP', '=', $id_user)
                ->where('jadwal.NIS', '=', $data->NIS)
                ->where('jadwal.kode_mata_pelajaran', '=', $kode_mata_pelajaran)
                ->orderBy('jadwal.hari', 'DESC')
                ->orderBy('jadwal.waktu', 'ASC')
                ->get();
            return view('jadwal.indexGuruThisMataPelajaran', ['jadwal' => $jadwal]);
        }
    }
}

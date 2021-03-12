<?php

namespace App\Http\Controllers;

use App\Nilai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RaporController extends Controller
{
    public function index($id_user){

        $rapor = DB::table('nilai')
            -> select('nilai.kode_mata_pelajaran' ,'mata_pelajaran.kkm', 'mata_pelajaran.nama_mata_pelajaran', 'nilai.poin_nilai',  'soal_ujian.keterangan_soal','siswa.nama_depan' ,'siswa.nama_belakang')
            -> join('mata_pelajaran', 'nilai.kode_mata_pelajaran', '=', 'mata_pelajaran.kode_mata_pelajaran')
            -> join('soal_ujian', 'soal_ujian.id_soal_ujian', '=', 'nilai.id_soal_ujian')
            -> join('siswa', 'siswa.NIS', '=', 'nilai.NIS')
            -> where('nilai.NIS', '=', session('id_user'))
            -> orderBy('nilai.poin_nilai','DESC')
            -> get();

        $MAT=Nilai::selectRaw('SUM(poin_nilai) AS Total_Nilai, COUNT(poin_nilai) AS Jumlah_Nilai, SUM(poin_nilai)/COUNT(poin_nilai) AS avg_nilai,
        CASE
        WHEN SUM(poin_nilai)/COUNT(poin_nilai)>=80 THEN \'A\'
        WHEN SUM(poin_nilai)/COUNT(poin_nilai)>=70 THEN \'B\'
        WHEN SUM(poin_nilai)/COUNT(poin_nilai)>=60 THEN \'C\'
        WHEN SUM(poin_nilai)/COUNT(poin_nilai)<60 THEN \'D\'
        END AS predikat')
            ->where('kode_mata_pelajaran','ILIKE','MAT%')
            ->where('NIS', '=', session('id_user'))
            ->first();

        $BI=Nilai::selectRaw('SUM(poin_nilai) AS Total_Nilai, COUNT(poin_nilai) AS Jumlah_Nilai, SUM(poin_nilai)/COUNT(poin_nilai) AS avg_nilai,
        CASE
        WHEN SUM(poin_nilai)/COUNT(poin_nilai)>=80 THEN \'A\'
        WHEN SUM(poin_nilai)/COUNT(poin_nilai)>=70 THEN \'B\'
        WHEN SUM(poin_nilai)/COUNT(poin_nilai)>=60 THEN \'C\'
        WHEN SUM(poin_nilai)/COUNT(poin_nilai)<60 THEN \'D\'
        END AS predikat
        ')
            ->where('kode_mata_pelajaran','ILIKE','BI%')
            ->where('NIS', '=', session('id_user'))
            ->first();

        $PKN=Nilai::selectRaw('SUM(poin_nilai) AS Total_Nilai, COUNT(poin_nilai) AS Jumlah_Nilai, SUM(poin_nilai)/COUNT(poin_nilai) AS avg_nilai,
        CASE
        WHEN SUM(poin_nilai)/COUNT(poin_nilai)>=80 THEN \'A\'
        WHEN SUM(poin_nilai)/COUNT(poin_nilai)>=70 THEN \'B\'
        WHEN SUM(poin_nilai)/COUNT(poin_nilai)>=60 THEN \'C\'
        WHEN SUM(poin_nilai)/COUNT(poin_nilai)<60 THEN \'D\'
        END AS predikat
        ')
            ->where('kode_mata_pelajaran','ILIKE','PKN%')
            ->where('NIS', '=', session('id_user'))
            ->first();

        $SEJ=Nilai::selectRaw('SUM(poin_nilai) AS Total_Nilai, COUNT(poin_nilai) AS Jumlah_Nilai, SUM(poin_nilai)/COUNT(poin_nilai) AS avg_nilai,
        CASE
        WHEN SUM(poin_nilai)/COUNT(poin_nilai)>=80 THEN \'A\'
        WHEN SUM(poin_nilai)/COUNT(poin_nilai)>=70 THEN \'B\'
        WHEN SUM(poin_nilai)/COUNT(poin_nilai)>=60 THEN \'C\'
        WHEN SUM(poin_nilai)/COUNT(poin_nilai)<60 THEN \'D\'
        END AS predikat
        ')
            ->where('kode_mata_pelajaran','ILIKE','SEJ%')
            ->where('NIS', '=', session('id_user'))
            ->first();

        $BING=Nilai::selectRaw('SUM(poin_nilai) AS Total_Nilai, COUNT(poin_nilai) AS Jumlah_Nilai, SUM(poin_nilai)/COUNT(poin_nilai) AS avg_nilai,
        CASE
        WHEN SUM(poin_nilai)/COUNT(poin_nilai)>=80 THEN \'A\'
        WHEN SUM(poin_nilai)/COUNT(poin_nilai)>=70 THEN \'B\'
        WHEN SUM(poin_nilai)/COUNT(poin_nilai)>=60 THEN \'C\'
        WHEN SUM(poin_nilai)/COUNT(poin_nilai)<60 THEN \'D\'
        END AS predikat
        ')
            ->where('kode_mata_pelajaran','ILIKE','BING%')
            ->where('NIS', '=', session('id_user'))
            ->first();

        $PJOK=Nilai::selectRaw('SUM(poin_nilai) AS Total_Nilai, COUNT(poin_nilai) AS Jumlah_Nilai, SUM(poin_nilai)/COUNT(poin_nilai) AS avg_nilai,
        CASE
        WHEN SUM(poin_nilai)/COUNT(poin_nilai)>=80 THEN \'A\'
        WHEN SUM(poin_nilai)/COUNT(poin_nilai)>=70 THEN \'B\'
        WHEN SUM(poin_nilai)/COUNT(poin_nilai)>=60 THEN \'C\'
        WHEN SUM(poin_nilai)/COUNT(poin_nilai)<60 THEN \'D\'
        END AS predikat
        ')
            ->where('kode_mata_pelajaran','ILIKE','PJOK%')
            ->where('NIS', '=', session('id_user'))
            ->first();

        $SB=Nilai::selectRaw('SUM(poin_nilai) AS Total_Nilai, COUNT(poin_nilai) AS Jumlah_Nilai, SUM(poin_nilai)/COUNT(poin_nilai) AS avg_nilai,
        CASE
        WHEN SUM(poin_nilai)/COUNT(poin_nilai)>=80 THEN \'A\'
        WHEN SUM(poin_nilai)/COUNT(poin_nilai)>=70 THEN \'B\'
        WHEN SUM(poin_nilai)/COUNT(poin_nilai)>=60 THEN \'C\'
        WHEN SUM(poin_nilai)/COUNT(poin_nilai)<60 THEN \'D\'
        END AS predikat
        ')
            ->where('kode_mata_pelajaran','ILIKE','SB%')
            ->where('NIS', '=', session('id_user'))
            ->first();

        return view('rapor.index', ['rapor'=>$rapor,'mat'=>$MAT, 'bi'=> $BI, 'pkn'=>$PKN, 'sej'=>$SEJ
        ,'bing'=>$BING, 'pjok'=>$PJOK, 'sb'=>$SB]);
    }
}

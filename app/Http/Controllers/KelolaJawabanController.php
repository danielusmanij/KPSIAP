<?php

namespace App\Http\Controllers;

use App\Jawaban;
use App\Nilai;
use App\SoalUjian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KelolaJawabanController extends Controller
{
    public function indexGuru($id_user, $kode_mata_pelajaran, $id_soal_ujian){
        $kelolaJawaban = Jawaban::
            select('jawaban.file_jawaban', 'jawaban.NIS', 'siswa.nama_depan', 'siswa.nama_belakang', 'nilai.poin_nilai', 'mata_pelajaran.nama_mata_pelajaran', 'nilai.kode_mata_pelajaran', 'nilai.id_soal_ujian', 'nilai.id_nilai')
            -> join('siswa', 'siswa.NIS', '=', 'jawaban.NIS')
            -> join('nilai', 'nilai.NIS', '=', 'siswa.NIS')
            -> join('mata_pelajaran', 'mata_pelajaran.kode_mata_pelajaran', '=', 'nilai.kode_mata_pelajaran')
            -> where('nilai.id_soal_ujian', '=', $id_soal_ujian)
            -> where('jawaban.id_soal_ujian', '=', $id_soal_ujian)
            -> where('nilai.kode_mata_pelajaran', '=', $kode_mata_pelajaran)
            -> get();
        return view('kelolaJawaban.indexGuru',['kelolaJawaban' => $kelolaJawaban]);
    }

    public function editThisNilai($id_user, $kode_mata_pelajaran, $id_soal_ujian, $id_nilai){
        $kelolaJawaban = Jawaban::
            select('jawaban.file_jawaban', 'jawaban.NIS', 'siswa.nama_depan', 'siswa.nama_belakang', 'nilai.poin_nilai', 'mata_pelajaran.nama_mata_pelajaran', 'nilai.kode_mata_pelajaran', 'nilai.id_soal_ujian', 'nilai.id_nilai')
            -> join('siswa', 'siswa.NIS', '=', 'jawaban.NIS')
            -> join('nilai', 'nilai.NIS', '=', 'siswa.NIS')
            -> join('mata_pelajaran', 'mata_pelajaran.kode_mata_pelajaran', '=', 'nilai.kode_mata_pelajaran')
            -> where('nilai.id_soal_ujian', '=', $id_soal_ujian)
            -> where('nilai.id_nilai', '=', $id_nilai)
            -> where('jawaban.id_soal_ujian', '=', $id_soal_ujian)
            -> where('nilai.kode_mata_pelajaran', '=', $kode_mata_pelajaran)
            -> get();
        return view('kelolaJawaban.editThisNilai',['kelolaJawaban' => $kelolaJawaban]);
    }

    public function updateThisNilai(Request $request, $id_user, $kode_mata_pelajaran, $id_soal_ujian, $id_nilai){
        Nilai::where('id_nilai', $id_nilai)
            ->update([
                'poin_nilai' => $request->txtPoinNilai,
            ]);
        return redirect('/kelolaJawaban/' . $id_user . '/' . $kode_mata_pelajaran . '/' . $id_soal_ujian)->with('message', 'Nilai Berhasil Diubah');
    }
}

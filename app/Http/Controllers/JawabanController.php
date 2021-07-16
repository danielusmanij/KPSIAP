<?php

namespace App\Http\Controllers;

use App\Jawaban;
use App\Nilai;
use Illuminate\Http\Request;

class JawabanController extends Controller
{

    public function indexSiswa($id_user, $kode_mata_pelajaran, $id_soal_ujian){
        $checkJawaban= Jawaban::where(['NIS'=>$id_user,'id_soal_ujian'=>$id_soal_ujian])->get();
        session(['id_soal_ujian' => $id_soal_ujian]);
        session(['kode_mata_pelajaran' => $kode_mata_pelajaran]);

        $jawaban = Jawaban::
        select('jawaban.file_jawaban', 'jawaban.NIS', 'siswa.nama_depan', 'siswa.nama_belakang', 'nilai.poin_nilai', 'mata_pelajaran.nama_mata_pelajaran', 'nilai.kode_mata_pelajaran', 'nilai.id_soal_ujian', 'nilai.id_nilai')
            -> join('siswa', 'siswa.NIS', '=', 'jawaban.NIS')
            -> join('nilai', 'nilai.NIS', '=', 'siswa.NIS')
            -> join('mata_pelajaran', 'mata_pelajaran.kode_mata_pelajaran', '=', 'nilai.kode_mata_pelajaran')
            -> where('nilai.id_soal_ujian', '=', $id_soal_ujian)
            -> where('jawaban.id_soal_ujian', '=', $id_soal_ujian)
            -> where('jawaban.NIS', '=', $id_user)
            -> where('nilai.kode_mata_pelajaran', '=', $kode_mata_pelajaran)
            -> get();
        return view('jawaban.indexSiswa',['jawaban' => $jawaban,'checkJawaban' => $checkJawaban]);
    }

    public function storeJawaban(Request $request, $id_user, $kode_mata_pelajaran, $id_soal_ujian){
        $jawaban = new Jawaban;
        $jawaban->NIS = $id_user;
        $jawaban->id_soal_ujian = $id_soal_ujian;
        if ($request->hasFile('file_jawaban')) {
            $image = $request->file('file_jawaban');
            $name = $image->getClientOriginalName();
            $destinationPath = public_path('assets/fileJawaban');
            $image->move($destinationPath, $name);
            $jawaban->file_jawaban = $name;
        } else {
            $jawaban->file_jawaban = null;
        }
        $jawaban->save();

//        $nilai = new Nilphpartiai;
//        $nilai->id_soal_ujian = $id_soal_ujian;
//        $nilai->kode_mata_pelajaran = $kode_mata_pelajaran;
//        $nilai->NIS = $id_user;
//        $nilai->poin_nilai = 0;
//        $nilai->save();

        return redirect('/jawaban/' . $id_user . '/' . $kode_mata_pelajaran . '/' . $id_soal_ujian)->with('message', 'Jawaban Berhasil Ditambah');
    }
}

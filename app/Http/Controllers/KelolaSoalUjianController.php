<?php

namespace App\Http\Controllers;

use App\MataPelajaran;
use App\SoalUjian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class KelolaSoalUjianController extends Controller
{
    public function index($id_user){
        $kelolaSoalUjian = DB::table('mata_pelajaran')
            -> select('mata_pelajaran.kode_mata_pelajaran', 'mata_pelajaran.nama_mata_pelajaran', 'mata_pelajaran.kkm', 'jadwal.kode_mata_pelajaran', 'jadwal.NIP', 'jadwal.NIS', 'jadwal.hari', 'jadwal.waktu', 'guru.NIP')
            -> join('jadwal', 'mata_pelajaran.kode_mata_pelajaran', '=', 'jadwal.kode_mata_pelajaran')
            -> join('guru', 'jadwal.NIP', '=', 'guru.NIP')
            -> orderBy('jadwal.hari', 'DESC')
            -> orderBy('jadwal.waktu', 'ASC')
            -> where('jadwal.NIP', '=', $id_user)
            -> get();
        return view('kelolaSoalUjian.index', ['kelolaSoalUjian' => $kelolaSoalUjian]);
    }

    public function indexThisSoal($id_user, $kode_mata_pelajaran){
        $kelolaSoalUjian = SoalUjian::
            select('soal_ujian.id_soal_ujian', 'soal_ujian.file_soal', 'soal_ujian.keterangan_soal', 'soal_ujian.kode_mata_pelajaran', 'mata_pelajaran.nama_mata_pelajaran')
            -> join('mata_pelajaran', 'mata_pelajaran.kode_mata_pelajaran', '=', 'soal_ujian.kode_mata_pelajaran')
            -> where('soal_ujian.kode_mata_pelajaran', '=', $kode_mata_pelajaran)
            -> orderBy('soal_ujian.keterangan_soal', 'ASC')
            -> get();
        return view('kelolaSoalUjian.indexThisSoal', ['kelolaSoalUjian' => $kelolaSoalUjian]);
    }

    public function editThisSoal($id_user, $kode_mata_pelajaran, $keterangan_soal){
        $kelolaSoalUjian = SoalUjian::
            select('soal_ujian.id_soal_ujian', 'soal_ujian.file_soal', 'soal_ujian.keterangan_soal', 'soal_ujian.kode_mata_pelajaran', 'mata_pelajaran.nama_mata_pelajaran')
            -> join('mata_pelajaran', 'mata_pelajaran.kode_mata_pelajaran', '=', 'soal_ujian.kode_mata_pelajaran')
            -> where('soal_ujian.kode_mata_pelajaran', '=', $kode_mata_pelajaran)
            -> where('soal_ujian.keterangan_soal', '=', $keterangan_soal)
            -> get();
        return view('kelolaSoalUjian.editThisSoal', ['kelolaSoalUjian' => $kelolaSoalUjian]);
    }

    public function updateThisSoal(Request $request, $id_user, $kode_mata_pelajaran, $id_soal_ujian, $file_soal){
        $soalUjian = SoalUjian::find($id_soal_ujian);

        if ($request->hasFile('file_soal')) {
            $image = $request->file('file_soal');
            $name = $image->getClientOriginalName();
            $destinationPath = public_path('assets/fileSoal');
            $image->move($destinationPath, $name);
            $soalUjian->file_soal = $name;

            $image_path = "assets/fileSoal/" . $file_soal;
            if(File::exists($image_path)) {
                File::delete($image_path);
            }
        } else {
            $soalUjian->file_soal = null;
        }

        SoalUjian::where('id_soal_ujian', $id_soal_ujian)
            ->update([
                'file_soal' => $soalUjian->file_soal
            ]);
        return redirect('/kelolaSoalUjian/' . $id_user . '/' . $kode_mata_pelajaran)->with('message', 'File Soal Berhasil Diperbaharui');
    }

    public function destroyThisSoal($id_user, $kode_mata_pelajaran, $id_soal_ujian, $file_soal)
    {
        SoalUjian::destroy($id_soal_ujian);

        $image_path = "assets/fileSoal/" . $file_soal;
        if(File::exists($image_path)) {
            File::delete($image_path);
        }

        return redirect('/kelolaSoalUjian/' . $id_user . '/' . $kode_mata_pelajaran)->with('message', 'File Soal Berhasil Dihapus');
    }

    public function storeThisSoal(Request $request, $id_user, $kode_mata_pelajaran){
        $soalUjian = new SoalUjian;
        $soalUjian->keterangan_soal = $request->txtKeteranganSoal;
        $soalUjian->kode_mata_pelajaran = $kode_mata_pelajaran;
        if ($request->hasFile('file_soal')) {
            $image = $request->file('file_soal');
            $name = $image->getClientOriginalName();
            $destinationPath = public_path('assets/fileSoal');
            $image->move($destinationPath, $name);
            $soalUjian->file_soal = $name;
        } else {
                $soalUjian->file_soal = null;
        }
        $soalUjian->save();

        return redirect('/kelolaSoalUjian/' . $id_user . '/' . $kode_mata_pelajaran)->with('message', 'File Soal Berhasil Ditambah');
    }
}

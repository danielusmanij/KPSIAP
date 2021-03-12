<?php

namespace App\Http\Controllers;

use App\Jadwal;
use App\MataPelajaran;
use App\Pertemuan;
use App\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KelolaPelajaranController extends Controller
{
    public function indexGuru($id_user){

        $kelolaPelajaran = MataPelajaran::
            select('mata_pelajaran.kode_mata_pelajaran', 'mata_pelajaran.nama_mata_pelajaran', 'jadwal.kode_mata_pelajaran', 'jadwal.NIP', 'jadwal.NIS', 'jadwal.hari', 'jadwal.waktu', 'guru.NIP', 'jadwal.id_jadwal')
            -> join('jadwal', 'mata_pelajaran.kode_mata_pelajaran', '=', 'jadwal.kode_mata_pelajaran')
            -> join('guru', 'jadwal.NIP', '=', 'guru.NIP')
            -> orderBy('jadwal.hari', 'DESC')
            -> orderBy('jadwal.waktu', 'ASC')
            -> where('jadwal.NIP', '=', $id_user)
            -> get();

        return view('kelolaPelajaran.indexGuru', ['kelolaPelajaran' => $kelolaPelajaran]);
    }

    public function indexThisPelajaran($id_user, $kode_mata_pelajaran){

        $kelolaPelajaran = MataPelajaran::
        select('mata_pelajaran.kode_mata_pelajaran', 'mata_pelajaran.nama_mata_pelajaran', 'jadwal.kode_mata_pelajaran', 'jadwal.NIP', 'jadwal.NIS', 'jadwal.hari', 'jadwal.waktu', 'guru.NIP', 'jadwal.id_jadwal')
            -> join('jadwal', 'mata_pelajaran.kode_mata_pelajaran', '=', 'jadwal.kode_mata_pelajaran')
            -> join('guru', 'jadwal.NIP', '=', 'guru.NIP')
            -> orderBy('jadwal.hari', 'DESC')
            -> orderBy('jadwal.waktu', 'ASC')
            -> where('jadwal.NIP', '=', $id_user)
            -> where('mata_pelajaran.kode_mata_pelajaran', '=', $kode_mata_pelajaran)
            -> get();

        return view('kelolaPelajaran.indexThisPelajaran', ['kelolaPelajaran' => $kelolaPelajaran]);
    }

    public function storeThisPertemuan(Request $request, $id_user, $kode_mata_pelajaran)
    {
        $kelolaPelajaran = MataPelajaran::
        select('mata_pelajaran.kode_mata_pelajaran', 'mata_pelajaran.nama_mata_pelajaran', 'jadwal.kode_mata_pelajaran', 'jadwal.NIP', 'jadwal.NIS', 'jadwal.hari', 'jadwal.waktu', 'guru.NIP', 'jadwal.id_jadwal')
            -> join('jadwal', 'mata_pelajaran.kode_mata_pelajaran', '=', 'jadwal.kode_mata_pelajaran')
            -> join('guru', 'jadwal.NIP', '=', 'guru.NIP')
            -> orderBy('jadwal.hari', 'DESC')
            -> orderBy('jadwal.waktu', 'ASC')
            -> where('jadwal.NIP', '=', $id_user)
            -> where('mata_pelajaran.kode_mata_pelajaran', '=', $kode_mata_pelajaran)
            -> get();

        foreach($kelolaPelajaran as $data){
            $pertemuan = new Pertemuan;
            $pertemuan->nama_pertemuan = $request->txtNamaPertemuan;
            $pertemuan->keterangan_pertemuan = $request->txtKeteranganPertemuan;
            $pertemuan->id_jadwal = $data->id_jadwal;
            $pertemuan->save();
        }

        return redirect('/kelolaPelajaran/' . $id_user)->with('message', 'Pertemuan Berhasil Ditambah');
    }
}

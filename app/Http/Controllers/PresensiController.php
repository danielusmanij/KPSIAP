<?php

namespace App\Http\Controllers;

use App\Jadwal;
use App\PresensiGuru;
use App\PresensiSiswa;
use App\Siswa;
use App\VerifikasiKehadiran;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

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
        $tanggal =  Carbon::now()->toDateTimeString();
        $waktu = PresensiSiswa::where('NIS',$id_user)->value('waktu_presensi_siswa');
        $nama_depan = Siswa::where('NIS',$id_user)->value('nama_depan');
        $nama_belakang = Siswa::where('NIS',$id_user)->value('nama_belakang');

        VerifikasiKehadiran::create([
            'NIS' => $id_user,
            'nama_depan' => $nama_depan,
            'tanggal_presensi_siswa' => $tanggal,
            'waktu_presensi_siswa' => $waktu,
//            'nama_belakang' => $nama_belakang
        ]);

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
    public function kehadiranSiswa(Request $request, $id_user){
        $kehadiranSiswa = VerifikasiKehadiran::all();
        return view('kelolaKehadiranSiswa.indexKehadiranSiswa',['kehadiranSiswa' => $kehadiranSiswa]);
    }
    //verifikasi kehadiran
    public function verifikasiSiswa(Request $request,$id){
        $inputKehadiran = $request->input('hadir');
        //jika hadir
        if($inputKehadiran != null){
            VerifikasiKehadiran::where('id', $id)->update([
                'kehadiran' => 'hadir',
            ]);
        }
        //jika tidak hadir
        else if($inputKehadiran==null){
            VerifikasiKehadiran::where('id', $id)->update([
                'kehadiran' => 'tidak hadir',
            ]);
        }
        return redirect('/kehadiranSiswa/{id_user}')->with('messageSuccess','Data Presensi Tersimpan');
    }
    //view pengecekan kehadiran
    public function viewKehadiran(){
        $id_user = Session::get('id_user');
        $kehadiranSiswa = VerifikasiKehadiran::all();
        return view('kelolaKehadiranSiswa.indexKehadiranSiswa',['kehadiranSiswa'=>$kehadiranSiswa]);
    }
}

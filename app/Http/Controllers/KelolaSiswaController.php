<?php

namespace App\Http\Controllers;

use App\Kelas;
use App\Nilai;
use App\OrangTua;
use App\Role;
use App\Sekolah;
use App\Siswa;
use App\SoalUjian;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KelolaSiswaController extends Controller
{
    public function indexGuru($id_user)
    {
        $kelolaSiswa = Siswa::
        select('siswa.NIS', 'siswa.nama_depan', 'siswa.nama_belakang', 'jadwal.NIS', 'jadwal.kode_mata_pelajaran', 'jadwal.hari', 'jadwal.waktu', 'mata_pelajaran.kode_mata_pelajaran', 'mata_pelajaran.nama_mata_pelajaran', 'jadwal.NIP', 'guru.NIP')
            ->join('jadwal', 'siswa.NIS', '=', 'jadwal.NIS')
            ->join('mata_pelajaran', 'jadwal.kode_mata_pelajaran', '=', 'mata_pelajaran.kode_mata_pelajaran')
            ->join('guru', 'jadwal.NIP', '=', 'guru.NIP')
            ->where('jadwal.NIP', '=', $id_user)
            ->orderBy('mata_pelajaran.nama_mata_pelajaran', 'DESC')
            ->orderBy('jadwal.NIS', 'ASC')
            ->get();
        return view('kelolaSiswa.indexGuru', ['kelolaSiswa' => $kelolaSiswa]);
    }

    public function indexAdmin($id_user)
    {
        $kelolaSiswa = User::select('user.id_user', 'siswa.NIS', 'siswa.nama_depan', 'siswa.nama_belakang')
            ->join('siswa', 'user.id_user', '=', 'siswa.id_user')
            ->where('user.id_sekolah', '=', session('id_sekolah'))
            ->orderBy('siswa.NIS', 'ASC')
            ->get();
        return view('kelolaSiswa.indexAdmin', ['kelolaSiswa' => $kelolaSiswa]);
    }

    public function indexThisSiswaGuru($id_user, $NIS, $kode_mata_pelajaran)
    {
        $siswa = Siswa::find($NIS);
        $kelas = Kelas::find($siswa->id_kelas);
        $user = User::find($NIS);
        $sekolah = Sekolah::find($user->id_sekolah);
        $role = Role::find($user->id_role);
        $nilai = Nilai::
        select('nilai.poin_nilai', 'nilai.kode_mata_pelajaran', 'nilai.id_nilai', 'mata_pelajaran.nama_mata_pelajaran', 'soal_ujian.keterangan_soal', 'soal_ujian.id_soal_ujian', 'nilai.NIS')
            ->join('mata_pelajaran', 'nilai.kode_mata_pelajaran', '=', 'mata_pelajaran.kode_mata_pelajaran')
            ->join('soal_ujian', 'soal_ujian.id_soal_ujian', '=', 'nilai.id_soal_ujian')
            ->join('jadwal', 'jadwal.kode_mata_pelajaran', '=', 'nilai.kode_mata_pelajaran')
            ->where('jadwal.NIP', '=', $id_user)
            ->where('nilai.NIS', '=', $NIS)
            ->where('mata_pelajaran.kode_mata_pelajaran', '=', $kode_mata_pelajaran)
            ->orderBy('mata_pelajaran.nama_mata_pelajaran', 'DESC')
            ->orderBy('soal_ujian.keterangan_soal', 'ASC')
            ->get();
        $orangTua = OrangTua::where('NIS', $NIS)->get();
        $checkOrangTua = count($orangTua);
        return view('kelolaSiswa.indexThisSiswa', ['siswa' => $siswa, 'kelas' => $kelas, 'sekolah' => $sekolah, 'role' => $role, 'orangTua' => $orangTua, 'checkOrangTua' => $checkOrangTua, 'nilai' => $nilai]);

    }

    public function indexThisSiswaAdmin($id_user, $NIS)
    {
        $siswa = Siswa::find($NIS);
        $kelas = Kelas::find($siswa->id_kelas);
        $user = User::find($NIS);
        $sekolah = Sekolah::find($user->id_sekolah);
        $role = Role::find($user->id_role);
        $orangTua = OrangTua::where('NIS', $NIS)->get();
        $checkOrangTua = count($orangTua);
        return view('kelolaSiswa.indexThisSiswa', ['siswa' => $siswa, 'kelas' => $kelas, 'sekolah' => $sekolah, 'role' => $role, 'orangTua' => $orangTua, 'checkOrangTua' => $checkOrangTua]);

    }

    public function editThisSiswaGuru($id_user, $NIS, $id_soal_ujian, $id_nilai)
    {
        $siswa = Siswa::find($NIS);
        $kelas = Kelas::find($siswa->id_kelas);
        $user = User::find($NIS);
        $sekolah = Sekolah::find($user->id_sekolah);
        $role = Role::find($user->id_role);
        $nilai = DB::table('nilai')
            ->select('nilai.poin_nilai', 'nilai.kode_mata_pelajaran', 'nilai.id_nilai', 'mata_pelajaran.nama_mata_pelajaran', 'soal_ujian.keterangan_soal', 'soal_ujian.id_soal_ujian', 'nilai.NIS')
            ->join('mata_pelajaran', 'nilai.kode_mata_pelajaran', '=', 'mata_pelajaran.kode_mata_pelajaran')
            ->join('soal_ujian', 'soal_ujian.id_soal_ujian', '=', 'nilai.id_soal_ujian')
            ->join('jadwal', 'jadwal.kode_mata_pelajaran', '=', 'nilai.kode_mata_pelajaran')
            ->where('jadwal.NIP', '=', $id_user)
            ->where('nilai.NIS', '=', $NIS)
            ->where('soal_ujian.id_soal_ujian', '=', $id_soal_ujian)
            ->where('nilai.id_nilai', '=', $id_nilai)
            ->orderBy('mata_pelajaran.nama_mata_pelajaran')
            ->get();
        $orangTua = OrangTua::where('NIS', $NIS)->get();
        $checkOrangTua = count($orangTua);
        return view('kelolaSiswa.editThisSiswa', ['siswa' => $siswa, 'kelas' => $kelas, 'sekolah' => $sekolah, 'role' => $role, 'orangTua' => $orangTua, 'checkOrangTua' => $checkOrangTua, 'nilai' => $nilai]);
    }

    public function editThisSiswaAdmin($id_user, $NIS)
    {
        $siswa = Siswa::find($NIS);
        $kelas = Kelas::find($siswa->id_kelas);
        $user = User::find($NIS);
        $sekolah = Sekolah::find($user->id_sekolah);
        $role = Role::find($user->id_role);
        $orangTua = OrangTua::where('NIS', $NIS)->get();
        $checkOrangTua = count($orangTua);
        return view('kelolaSiswa.editThisSiswa', ['siswa' => $siswa, 'kelas' => $kelas, 'sekolah' => $sekolah, 'role' => $role, 'orangTua' => $orangTua, 'checkOrangTua' => $checkOrangTua]);
    }

    public function updateThisSiswa(Request $request, $id_user, $NIS)
    {
        Siswa::where('NIS', $NIS)
            ->update([
                'tanggal_lahir' => $request->txtTanggalLahir,
                'alamat_siswa' => $request->txtAlamatSiswa,
                'agama' => $request->txtAgamaSiswa,
                'no_telepon' => $request->txtNoTelepon,
                'jenis_kelamin' => $request->txtJenisKelamin,
            ]);

        return redirect('/kelolaSiswaAdmin/' . $id_user . '/' . $NIS)->with('message', 'Data Siswa Berhasil Diubah');
    }

    public function editThisOrangTua($id_user, $NIS, $id_orang_tua)
    {
        $siswa = Siswa::find($NIS);
        $kelas = Kelas::find($siswa->id_kelas);
        $user = User::find($NIS);
        $sekolah = Sekolah::find($user->id_sekolah);
        $role = Role::find($user->id_role);
        $orangTua = OrangTua::where('id_orang_tua', $id_orang_tua)->get();
        $checkOrangTua = count($orangTua);
        return view('kelolaSiswa.editThisOrangTua', ['siswa' => $siswa, 'kelas' => $kelas, 'sekolah' => $sekolah, 'role' => $role, 'orangTua' => $orangTua, 'checkOrangTua' => $checkOrangTua]);
    }

    public function updateThisOrangTua(Request $request, $id_user, $NIS, $id_orang_tua)
    {
        OrangTua::where('id_orang_tua', $id_orang_tua)
            ->update([
                'nama_depan' => $request->txtNamaDepanOrangTua,
                'nama_belakang' => $request->txtNamaBelakangOrangTua,
                'alamat_orang_tua' => $request->txtAlamatOrangTua,
                'keterangan_status' => $request->txtKeteranganStatus,
                'nomor_telepon' => $request->txtNomorTelepon,
                'perkerjaan' => $request->txtPerkerjaan,
            ]);

        return redirect('/kelolaSiswaAdmin/' . $id_user . '/' . $NIS)->with('message', 'Data Orang Tua Berhasil Diubah');
    }

    public function updateNilai(Request $request, $id_user, $NIS, $id_soal_ujian, $id_nilai, $kode_mata_pelajaran)
    {
        Nilai::where('id_nilai', $id_nilai)
            ->update([
                'poin_nilai' => $request->txtPoinNilai,
            ]);

        return redirect('/kelolaSiswaGuru/' . $id_user . '/' . $NIS . '/' . $kode_mata_pelajaran)->with('message', 'Nilai Berhasil Diubah');
    }


}

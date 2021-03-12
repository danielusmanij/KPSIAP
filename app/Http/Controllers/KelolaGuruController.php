<?php

namespace App\Http\Controllers;

use App\Guru;
use App\Role;
use App\Sekolah;
use App\User;
use Illuminate\Http\Request;

class KelolaGuruController extends Controller
{
    public function indexAdmin($id_user)
    {
        $kelolaGuru = User::select('user.id_user', 'guru.NIP', 'guru.nama_depan', 'guru.nama_belakang')
            ->join('guru', 'user.id_user', '=', 'guru.NIP')
            ->where('user.id_sekolah', '=', session('id_sekolah'))
            ->orderBy('guru.NIP', 'ASC')
            ->get();
        return view('kelolaGuru.indexAdmin', ['kelolaGuru' => $kelolaGuru]);
    }

    public function indexThisGuruAdmin($id_user, $NIP)
    {
        $guru = Guru::find($NIP);
        $sekolah = Sekolah::find(session('id_sekolah'));
        $role = Role::find(session('id_role'));
        return view('kelolaGuru.indexThisGuru', ['guru' => $guru, 'sekolah' => $sekolah, 'role' => $role]);

    }

    public function editThisGuruAdmin($id_user, $NIP)
    {
        $guru = Guru::find($NIP);
        $sekolah = Sekolah::find(session('id_sekolah'));
        $user = User::find($NIP);
        $role = Role::find($user->id_role);
        return view('kelolaGuru.editThisGuru', ['guru' => $guru, 'sekolah' => $sekolah, 'role' => $role]);
    }

    public function updateThisGuruAdmin(Request $request, $id_user, $NIP)
    {
        Guru::where('NIP', $NIP)
            ->update([
                'nama_depan' => $request->txtNamaDepanGuru,
                'nama_belakang' => $request->txtNamaBelakangGuru,
                'tanggal_lahir' => $request->txtTanggalLahir,
                'agama' => $request->txtAgamaGuru,
                'no_telepon' => $request->txtNoTelepon,
                'jabatan' => $request->txtJabatan,
                'jenis_kelamin' => $request->txtJenisKelamin,
            ]);

        return redirect('/kelolaGuruAdmin/' . $id_user . '/' . $NIP)->with('message', 'Data Guru Berhasil Diubah');
    }
}

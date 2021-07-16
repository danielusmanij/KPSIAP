<?php

namespace App\Http\Controllers;

use App\Guru;
use App\Role;
use App\Sekolah;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class KelolaGuruController extends Controller
{
    public function indexAdmin($id_user)
    {
        $kelolaGuru = DB::table('guru')->get();
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
    public function destroyThisGuru($NIP)
    {
        Guru::destroy($NIP);
        return redirect('/kelolaGuruAdmin/'.$NIP.'/') -> with('message','Data Guru sudah dihapus');
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
    public function storeThisGuru(Request $request, $id_user)
   {
        $NIP = $request -> input('txtNIP');
        $nama_depan = $request -> input('txtNamaDepan');
        $nama_belakang = $request -> input('txtNamaBelakang');
        $tanggal_lahir = $request -> input('dateTanggalLahir');
        $agama = $request -> input('txtAgama');
        $no_telepon = $request -> input('txtNomorTelepon');
        $jabatan = $request -> input('txtJabatan');
        $jenis_kelamin = $request -> input('txtJenisKelamin');

        Guru::create([
            'NIP' => $NIP,
            'nama_depan' => $nama_depan,
            'nama_belakang' => $nama_belakang,
            'tanggal_lahir' => $tanggal_lahir,
            'agama' => $agama,
            'no_telepon' => $no_telepon,
            'jabatan' => $jabatan,
            'jenis_kelamin' => $jenis_kelamin,
            'id_user' => $NIP
        ]);
    return redirect('/kelolaGuruAdmin/'.$id_user)->with('message','Data Berhasil ditambah');
   }
}

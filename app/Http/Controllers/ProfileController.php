<?php

namespace App\Http\Controllers;

use App\Guru;
use App\Kelas;
use App\OrangTua;
use App\Role;
use App\Sekolah;
use App\Siswa;
use App\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index($id_user)
    {
        if (session('id_role') == 1) {
            $profile = User::find($id_user);
            $sekolah = Sekolah::find(session('id_sekolah'));
            $role = Role::find(session('id_role'));
            return view('profile.index', ['profile' => $profile, 'sekolah' => $sekolah, 'role' => $role]);
        } elseif (session('id_role') == 2) {
            $profile = Guru::find($id_user);
            $sekolah = Sekolah::find(session('id_sekolah'));
            $role = Role::find(session('id_role'));
            return view('profile.index', ['profile' => $profile, 'sekolah' => $sekolah, 'role' => $role]);
        } elseif (session('id_role') == 3) {
            $profile = Siswa::find($id_user);
            $kelas = Kelas::find($profile->id_kelas);
            $sekolah = Sekolah::find(session('id_sekolah'));
            $role = Role::find(session('id_role'));
            $orangTua = OrangTua::where('NIS', session('id_user'))->get();
            $checkOrangTua= count($orangTua);
            return view('profile.index', ['profile' => $profile, 'sekolah' => $sekolah, 'role' => $role, 'kelas' => $kelas, 'orangTua' => $orangTua, 'checkOrangTua' => $checkOrangTua]);
        }
    }

    public function editPhoto($id_user)
    {
        if (session('id_role') == 2) {
            $profile = Guru::find($id_user);
            $sekolah = Sekolah::find(session('id_sekolah'));
            $role = Role::find(session('id_role'));
            return view('profile.editPhoto', ['profile' => $profile, 'sekolah' => $sekolah, 'role' => $role]);
        } elseif (session('id_role') == 3) {
            $profile = Siswa::find($id_user);
            $kelas = Kelas::find($profile->id_kelas);
            $sekolah = Sekolah::find(session('id_sekolah'));
            $role = Role::find(session('id_role'));
            $orangTua = OrangTua::where('NIS', session('id_user'))->get();
            $checkOrangTua= count($orangTua);
            return view('profile.editPhoto', ['profile' => $profile, 'sekolah' => $sekolah, 'role' => $role, 'kelas' => $kelas, 'orangTua' => $orangTua, 'checkOrangTua' => $checkOrangTua]);
        }
    }


    public function update(Request $request, $id_user)
    {
        if (session('id_role') == 2) {
            $guru = Guru::find($id_user);

            if ($request->hasFile('photo')) {
                $image = $request->file('photo');
                $name = session('id_user') . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('assets/img/profilePhoto');
                $image->move($destinationPath, $name);
                $guru->photo = $name;
            } else {
                $guru->photo = null;
            }

            Guru::where('NIP', $id_user)
                ->update([
                    'photo' => $guru->photo
                ]);
            return redirect('/profile/' . session('id_user'))->with('message', 'Foto Profil Berhasil Diperbaharui');

        } elseif (session('id_role') == 3) {
            $siswa = Siswa::find($id_user);

            if ($request->hasFile('photo')) {
                $image = $request->file('photo');
                $name = session('id_user') . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('assets/img/profilePhoto');
                $image->move($destinationPath, $name);
                $siswa->photo = $name;
            } else {
                $siswa->photo = null;
            }

            Siswa::where('NIS', $id_user)
                ->update([
                    'photo' => $siswa->photo
                ]);

            return redirect('/profile/' . $id_user)->with('message', 'Foto Profil Berhasil Diperbaharui');
        }
    }
}

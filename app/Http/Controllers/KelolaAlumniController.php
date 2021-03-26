<?php


namespace App\Http\Controllers;

use     App\Alumni;
use App\Nilai;
use App\OrangTua;
use App\Role;
use App\Sekolah;
use App\User;
use http\Env\Request;

class KelolaAlumniController extends Controller
{
    public function indexAdmin($id_user){
        $kelolaAlumni = User::select('user.id_user', 'alumni.id_alumni','alumni.tahun_lulus','alumni.nama_depan', 'alumni.nama_belakang')
            ->join('alumni', 'user.id_user', '=', 'alumni.id_user')
            ->where('user.id_sekolah', '=', session('id_sekolah'))
            ->orderBy('alumni.id_alumni', 'ASC')
            ->get();
        return view('kelolaAlumni.indexAdmin', ['kelolaAlumni' => $kelolaAlumni]);
    }

       public function indexThisAlumniAdmin($id_user, $id_alumni){
            $alumni = Alumni::find($id_alumni);
            $user = User::find($id_alumni);
            $sekolah = Sekolah::find($user->id_sekolah);
            $role = Role::find($user->id_role);
            $orangTua = OrangTua::where('ID Alumni', $id_alumni)->get();
            $checkOrangTua = count($orangTua);
            return view('kelolaAlumni.indexThisAlumni', ['alumni' => $alumni, 'sekolah' => $sekolah, 'role' => $role, 'orangTua' => $orangTua, 'checkOrangTua' => $checkOrangTua]);
   }
    //     public function updatenilai(Request $request, $id_user, $id_alumni, $id_nilai, $kode_mata_pelajaran){
    //         Nilai::where('id_nilai',$id_nilai)
    //             ->where([
    //                 'poin nilai' => $request->txtPoinNilai,
    //             ]);
    //         return redirect('/kelolaAlumniAdmin/'. $id_user.'/'.$id_alumni.'/'.$kode_mata_pelajaran) ->with('message', 'Nilai Berhasil Diubah');
    // }
//
//    public function editThisAlumniAdmin($id_user, $id_alumni){
//        $alumni = Alumni::find($id_alumni);
//        $user = User::find($id_alumni);
//        $sekolah = Sekolah::find($user->id_sekolah);
//        $role = Role::find($user->id_role);
//        $orangTua = OrangTua::where('ID Alumni', $id_alumni)->get();
//        $checkOrangTua = count($orangTua);
//        return view('kelolaAlumni.editThisAlumni', ['alumni' => $alumni,'sekolah' => $sekolah, 'role' => $role, 'orangTua' => $orangTua, 'checkOrangTua' => $checkOrangTua]);
//    }
}

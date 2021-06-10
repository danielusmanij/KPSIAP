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

       public function indexThisAlumniAdmin($id_user, $id_alumni, $id_sekolah){
            $alumni = Alumni::find($id_alumni);
            $user = User::find($id_alumni);
            $tahun_lulus = Alumni::find($user->$id_alumni);
            $sekolah = Sekolah::find($user->$id_sekolah);
            return view('kelolaAlumni.indexThisAlumni', ['alumni' => $alumni, 'tahun_lulus' => $tahun_lulus, 'sekolah' => $sekolah]);
    }

    public function editThisAlumniAdmin($id_user, $id_alumni){
        $kelolaAlumni = Alumni::where('id_alumni', '=', $id_alumni)->get();
        return view('kelolaAlumni.editThisAlumni', ['kelolaAlumni' => $kelolaAlumni]);
    }
   public function destroyThisAlumni($id_alumni,$id_user){
        Alumni::destroy($id_alumni);
        return redirect('/kelolaAlumniAdmin'.$id_user) ->with('message','Data telah dihapus');
   }
//    public function storeThisAlumni(Request $request){
//         $alumni = new Alumni();
//         $alumni->nama_depan = $request->txtNamaDepan;
//         $alumni->nama_belakang = $request->txtNamaBelakang;
//         $alumni->id_alumni = $request->txtidAlumni;
//    }
}

<?php


namespace App\Http\Controllers;

use App\Alumni;
use App\Nilai;
use App\OrangTua;
use App\Role;
use App\Sekolah;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KelolaAlumniController extends Controller
{
    public function indexAdmin($id_user){
        $kelolaAlumni = User::select('user.id_user', 'alumni.id_alumni','alumni.tahun_lulus','alumni.nama_depan', 'alumni.nama_belakang','alumni.id_sekolah')
            ->join('alumni', 'user.id_user', '=', 'alumni.id_user')
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
   public function destroyThisAlumni(Alumni $idalumni,$id_user)
   {
    DB::table('alumni') -> where('id_alumni',$idalumni) -> delete();
        return redirect('/kelolaAlumniAdmin/'.$id_user)->with('message','Data Berhasil Dihapus');
   }
   public function updateThisAlumni(Request $request, $id_user, $id_alumni)
   {
        Alumni::where('ID Alumni', $id_alumni)
                ->update([
                    'txtNamaDepan' => $request -> txtNamaDepan,
                    'txtNamaBelakang' => $request -> txtNamaBelakang,
                    'dateTahunLulus' => $request -> dateTahunLulus
                ]);
        return redirect('/kelolaAlumniAdmin/'.$id_user.'/'.$id_alumni) -> with('message','Data Alumni sudah diubah');
   }
   public function storeThisAlumni(Request $request, $id_user)
   {
    DB::table('alumni')->insert([
        'id_alumni' => $request->id_alumni,
        'tahun_lulus' => $request->tahun_lulus,
        'nama_depan' => $request->nama_depan,
        'nama_belakang' => $request->nama_belakang,
        'id_sekolah' => $request->id_sekolah
    ]);
    return redirect('/kelolaAlumniAdmin/'.$id_user)->with('message','Data Berhasil ditambah');
   }
}

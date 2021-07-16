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
        // $kelolaAlumni = User::select('user.id_user', 'alumni.id_alumni','alumni.tahun_lulus','alumni.nama_depan', 'alumni.nama_belakang','alumni.id_sekolah')
        //     ->join('alumni', 'user.id_user', '=', 'alumni.id_user')
        //     ->orderBy('alumni.id_alumni', 'ASC')
        //     ->get();
        $kelolaAlumni = DB::table('alumni')->get();
        return view('kelolaAlumni.indexAdmin', ['kelolaAlumni' => $kelolaAlumni]);
    }

    public function indexThisAlumniAdmin($id_user, $id_alumni, $id_sekolah)
    {
        // $alumni = Alumni::find($id_alumni);
        // $user = User::find($id_alumni);
        // $tahun_lulus = Alumni::find($user->$id_alumni);
        // $sekolah = Sekolah::find($user->$id_sekolah);
        // $kelolaAlumni = DB::table('alumni')->get();
        return redirect('/kelolaAlumniAdmin/'.$id_user.$id_alumni);
    }

    public function viewUpdate($id_user, $id_alumni)
    {
        // $kelolaAlumni = Alumni::where('id_alumni', '=', $id_alumni)->get();
        $data = Alumni::find($id_alumni);
        return view('kelolaAlumni.editThisAlumni', compact('data'));
    }
   public function destroyThisAlumni($id_alumni)
   {
        Alumni::destroy($id_alumni);
        return redirect('/kelolaAlumniAdmin/'.$id_alumni.'/') -> with('message','Data Alumni sudah dihapus');
   }
   public function editThisAlumni($id_user,$id_alumni,$id_sekolah)
   {
        $alumni = Alumni::find($id_alumni);
        $user = User::find($id_user);
        $sekolah = Sekolah::find($id_sekolah);
        return view('kelolaAlumni.editThisAlumni', ['alumni'=>$alumni,'user'=>$user,'sekolah'=>$sekolah]);
   }
   public function updateThisAlumniAdmin(Request $request, $id_user, $id_alumni)
   {
        Alumni::where('id_alumni', $id_alumni)
                ->update([
                    'nama_depan' => $request->txtNamaDepan,
                    'nama_belakang' => $request->txtNamaBelakang,
                    'tahun_lulus' => $request->dateTahunLulus,
                ]);
        return redirect('/kelolaAlumniAdmin/'.$id_user.'/'.$id_alumni) -> with('message','Data Alumni sudah diubah');
   }
   public function storeThisAlumni(Request $request, $id_user)
   {
        $id_alumni = $request -> input('txtidAlumni');
        $nama_depan = $request -> input('txtNamaDepan');
        $nama_belakang = $request -> input('txtNamaBelakang');
        $id_sekolah = $request -> input('txtidSekolah');
        $tahun_lulus = $request -> input('dateTahunLulus');

        Alumni::create([
            'id_alumni' => $id_alumni,
            'nama_depan' => $nama_depan,
            'nama_belakang' => $nama_belakang,
            'id_sekolah' => $id_sekolah,
            'tahun_lulus' => $tahun_lulus,
            'id_user' => $id_alumni
        ]);
    return redirect('/kelolaAlumniAdmin/'.$id_user)->with('message','Data Berhasil ditambah');
   }
}

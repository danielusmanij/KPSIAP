<?php

namespace App\Http\Controllers;

use App\Kurikulum;
use App\Sekolah;
use Illuminate\Http\Request;

class KelolaSekolahController extends Controller
{
    public function indexAdmin($id_user)
    {
        $kelolaSekolah = Sekolah::select('user.id_sekolah', 'sekolah.nama_sekolah', 'sekolah.alamat_sekolah', 'sekolah.no_telepon_sekolah', 'sekolah.id_kurikulum')
            ->join('user', 'user.id_sekolah', '=', 'sekolah.id_sekolah')
            ->where('user.id_user', '=', $id_user)
            ->get();
        return view('kelolaSekolah.indexAdmin', ['kelolaSekolah' => $kelolaSekolah]);
    }

    public function editThisSekolahAdmin($id_user, $id_sekolah)
    {
        $sekolah = Sekolah::find($id_sekolah);
        $kurikulum = Kurikulum::get();
        return view('kelolaSekolah.editThisSekolahAdmin', ['sekolah' => $sekolah, 'kurikulum' => $kurikulum]);
    }

    public function updateThisSekolahAdmin(Request $request, $id_user, $id_sekolah)
    {
        $sekolah = Sekolah::find($id_sekolah);

        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $name = $id_sekolah . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('assets/img/schoolPhoto');
            $image->move($destinationPath, $name);
            $sekolah->photo = $name;
        } else {
            $sekolah->photo = null;
        }

        Sekolah::where('id_sekolah', $id_sekolah)
            ->update([
                'photo' => $sekolah->photo,
                'nama_sekolah' => $request->txtNamaSekolah,
                'alamat_sekolah' => $request->txtAlamatSekolah,
                'no_telepon_sekolah' => $request->txtNoTelepon,
                'id_kurikulum' => $request->txtKurikulum,
            ]);

        return redirect('/kelolaSekolahAdmin/' . $id_user)->with('message', 'Data Sekolah Berhasil Diubah');
    }
}

<?php

namespace App\Http\Controllers;

use App\KegiatanSekolah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class KelolaKegiatanSekolahController extends Controller
{
    public function indexAdmin($id_user)
    {
        $kelolaKegiatanSekolah = KegiatanSekolah::select('sekolah.id_sekolah', 'kegiatan_sekolah.nama_kegiatan', 'kegiatan_sekolah.waktu_kegiatan', 'kegiatan_sekolah.photo_kegiatan_sekolah', 'kegiatan_sekolah.id_kegiatan')
            ->join('sekolah', 'kegiatan_sekolah.id_sekolah', '=', 'sekolah.id_sekolah')
            ->where('kegiatan_sekolah.id_sekolah', '=', session('id_sekolah'))
            ->orderBy('kegiatan_sekolah.waktu_kegiatan', 'ASC')
            ->get();
        return view('kelolaKegiatanSekolah.indexAdmin', ['kelolaKegiatanSekolah' => $kelolaKegiatanSekolah]);
    }

    public function editThisKegiatan($id_user, $id_kegiatan){
        $kelolaKegiatanSekolah = KegiatanSekolah::where('id_kegiatan', '=', $id_kegiatan)->get();
        return view('kelolaKegiatanSekolah.editThisKegiatan', ['kelolaKegiatanSekolah' => $kelolaKegiatanSekolah]);
    }

    public function updateThisKegiatan(Request $request, $id_user, $id_kegiatan, $nama_kegiatan){
        $kegiatanSekolah = KegiatanSekolah::find($id_kegiatan);

        if ($request->hasFile('file_kegiatan')) {
            $image = $request->file('file_kegiatan');
            $name = $nama_kegiatan . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('assets/fileKegiatan');
            $image->move($destinationPath, $name);
            $kegiatanSekolah->photo_kegiatan_sekolah = $name;

        } else {
            $kegiatanSekolah->photo_kegiatan_sekolah = null;
        }

        KegiatanSekolah::where('id_kegiatan', $id_kegiatan)
            ->update([
                'photo_kegiatan_sekolah' => $kegiatanSekolah->photo_kegiatan_sekolah,
                'nama_kegiatan' => $request->txtNamaKegiatan,
                'waktu_kegiatan' => $request->txtWaktuKegiatan,
            ]);
        return redirect('/kelolaKegiatanSekolahAdmin/' . $id_user)->with('message', 'Data Kegiatan Sekolah Berhasil Diperbaharui');
    }

    public function destroyThisKegiatan($id_user, $id_kegiatan, $nama_kegiatan)
    {
        KegiatanSekolah::destroy($id_kegiatan);
        return redirect('/kelolaKegiatanSekolahAdmin/' . $id_user)->with('message', 'Data Kegiatan Sekolah Berhasil Dihapus');
    }

    public function storeThisKegiatan(Request $request, $id_user){
        $kegiatanSekolah = new KegiatanSekolah();
        $kegiatanSekolah->nama_kegiatan = $request->txtNamaKegiatan;
        $kegiatanSekolah->waktu_kegiatan = $request->txtWaktuKegiatan;
        $kegiatanSekolah->id_sekolah = session('id_sekolah');
        if ($request->hasFile('file_kegiatan')) {
            $image = $request->file('file_kegiatan');
            $name = $request->txtNamaKegiatan . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('assets/fileKegiatan');
            $image->move($destinationPath, $name);
            $kegiatanSekolah->photo_kegiatan_sekolah = $name;
        } else {
            $kegiatanSekolah->photo_kegiatan_sekolah = null;
        }
        $kegiatanSekolah->save();

        return redirect('/kelolaKegiatanSekolahAdmin/' . $id_user)->with('message', 'Data Kegiatan Sekolah Berhasil Ditambah');
    }
}

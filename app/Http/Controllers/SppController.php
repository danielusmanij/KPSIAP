<?php

namespace App\Http\Controllers;

use App\Exports\sppExport;
use App\Siswa;
use App\Spp;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;
use function GuzzleHttp\Promise\all;

class SppController extends Controller
{
    //menampilkan view sebelum pembayaran di submit
    public function index(Request $request, $id_user){
        $adminSpp = Spp::where('NIS',$id_user)
            ->orderBy('spp_admin.tanggal_aktual_pembayaran','ASC')
            ->get();
        return view('spp.index',['adminSpp' => $adminSpp]);

    }
    //menampilkan view setelah pembayaran di submit
    public function indexaja(Request $request){
        $id_user = Session::get('id_user');
        $adminSpp = Spp::where('NIS',$id_user)
            ->orderBy('spp_admin.tanggal_aktual_pembayaran','ASC')
            ->get();
        return view('spp.index',['adminSpp' => $adminSpp]);
    }
    //upload bukti pembayaran
    public function buktiPembayaran(Request $request,$id_spp_admin){
        $adminSpp = Spp::all();
        $bukti_pembayaran = Spp::find($id_spp_admin);
        if ($request->hasFile('bukti_pembayaran')) {
            $bukti = $request->file('bukti_pembayaran');
            $name=$bukti->getClientOriginalName();
            $destinationPath = public_path('assets/filePembayaran');
            $bukti->move($destinationPath, $name);
            $bukti_pembayaran->bukti_pembayaran = $name;

        } else {
            $bukti_pembayaran->bukti_pembayaran = "bayar langsung";
        }
        $bayarLangsung = $request->status_bayar;
        Spp::where('id_spp_admin', $id_spp_admin)
            ->update([
                'bukti_pembayaran' => $bukti_pembayaran->bukti_pembayaran,
                'status_bayar' => $bayarLangsung
            ]);


        return redirect('/spp')->with('messageSuccess', 'Data telah dikirim');
    }
    public function exportSpp($id_user){
        return Excel::download(new sppExport($id_user),'sppExport.xlsx');
    }
    //tambah SPP
    public function addSpp(Request $request){
            $nis = $request->NIS;
            $nama_depan = Siswa::where('NIS', $nis)->value('nama_depan');
            $nama_belakang = Siswa::where('NIS',$nis)->value('nama_belakang');
            $spp = Spp::all();
//            request()->validate(
//                [
//                    'NIS' => 'required',
//                    'tanggal_aktual_pembayaran' => 'required',
//                    'tanggal_jatuh_tempo'=>'required',
//                    'harga_spp_detail'=>'required',
//                ]
//            );
            $inputNIS = $request->input('NIS');
            $nisUser = Siswa::where('id_user',$inputNIS)->value('id_user');
            $checkNis= Siswa::where('id_user',$nisUser)->get();
            if($nisUser != null){
                session(['NIS' => $nisUser]);
                Spp::create([
                    'NIS' => $request->NIS,
                    'nama_depan' => $nama_depan,
                    'nama_belakang' => $nama_belakang,
                    'tanggal_aktual_pembayaran' => $request->tanggal_aktual_pembayaran,
                    'tanggal_jatuh_tempo' => $request->tanggal_jatuh_tempo,
                    'harga_spp_detail' => $request->harga_spp_detail
                ]);
                return redirect('/sppInputSiswa')->with('messageSuccess','Data Telah Di Submit !');
            }else{
                return redirect('/sppInputSiswa')->with('message','Nomor Induk Tidak Ditemukan !');
            }

    }
    //view tambah spp setelah submit
    public function viewAdd(){
        return view('spp.addAdmin');
    }
    //view spp admin
    public function viewSpp(Request $request){
        $spp = Spp::
            orderBy('NIS','ASC')
        ->get();
        return view('spp.indexAdmin',['spp'=>$spp]);
    }
    //verifikasi spp
    public function verifikasiSpp(Request $request,$id_spp_admin){

        Spp::where('id_spp_admin' ,$id_spp_admin)->update([
            'verifikasi_spp' => $request->verifikasi_spp
        ]);
        return redirect('/indexSpp')->with('messageSuccess', 'Data Terkonfirmasi');
    }
    public function updateSpp(Request $request,$id_spp_admin){
        Spp::where('id_spp_admin', $id_spp_admin)->update([                             //BELUM READY
            'tanggal_mulai_pembayaran' => $request->tanggal_mulai_pembayaran,
            'tanggal_jatuh_tempo' => $request->tanggal_jatuh_tempo,
            'harga_spp_detail' => $request->harga_spp_detail,

        ]);
        return redirect()->route('item.index')->with('pesan_edit', 'spp berhasil diubah');
    }
    //view tambah spp sebelum submit
    public function formSpp(Request $request){
        return view('spp.addAdmin');
    }

//    public function createPDF() {
//        // retreive all records from db
//        $id_user = Session::get('id_user');
//        $data = Spp::where('NIS',$id_user)->get();
//
//        // share data to view
//        view()->share('Spp',$data);
//        $pdf = PDF::loadView('spp.IndexAdmin', $data);
//
//        // download PDF file with download method
//        return $pdf->download('SPP.pdf');
//    }
}

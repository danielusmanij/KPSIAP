<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SppController extends Controller
{
    public function index($id_user){
        $spp = DB::table('spp')
            -> select('spp.NIS', 'spp.keterangan_spp', 'spp_detail.status_spp_detail', 'spp_detail.periode_spp_detail','spp_detail.harga_spp_detail')
            -> join('spp_detail', 'spp.id_spp', '=', 'spp_detail.id_spp')
            -> where('spp.NIS', '=', session('id_user'))
            -> where('spp_detail.status_spp_detail', '=', '0')
            -> orderBy('keterangan_spp')
            -> get();
        $totalSpp = DB::table("spp_detail")
            ->select('harga_spp_detail','spp.NIS')
            ->join('spp','spp_detail.id_spp','=','spp.id_spp')
            ->where('spp.NIS', '=', session('id_user'))
            -> where('spp_detail.status_spp_detail', '=', '0')
            ->get()->sum("harga_spp_detail");
        return view('spp.index', ['spp'=>$spp,'totalSpp' =>$totalSpp]);
    }
}

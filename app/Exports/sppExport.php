<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use \stdClass;

class sppExport implements FromView, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    use Exportable;
    protected $user;
    function __construct($id_user)
    {
        $this->user=$id_user;
    }

    public function view(): View
    {
        $id_user = $this->user;
        $request = new stdClass();
        $request->user = $id_user;

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
    public function array(): array{
        $id_user = $this->user;
        $request = new stdClass();
        $request->user = $id_user;
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
        return $spp;
    }
    public function headings(): array
    {
        // TODO: Implement headings() method.
    }
}

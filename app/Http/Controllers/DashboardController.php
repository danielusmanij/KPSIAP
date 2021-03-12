<?php

namespace App\Http\Controllers;

use App\KegiatanSekolah;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $kegiatanSekolah = KegiatanSekolah::where('id_sekolah', '=', session('id_sekolah'))->get();
        return view('dashboard', ['kegiatanSekolah' => $kegiatanSekolah]);
    }
}

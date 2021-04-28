<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IjazahController extends Controller
{
    public function index(){
        return view('ijazah.index');
    }
    public function getDownload(){
        $file= public_path(). "/assets/sertifikat/info.pdf";
        $headers = array(
              'Content-Type: application/pdf',
            );
    return response()->download($file, 'ijazah.pdf', $headers);
    }
}

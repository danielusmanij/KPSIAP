<?php

namespace App\Http\Controllers;

use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;

class SertifikatController extends Controller
{
    public function index(){
        return view('sertifikat.index');
    }
    public function getDownload(){
        $file= public_path(). "/assets/sertifikat/info.pdf";
        $headers = array(
              'Content-Type: application/pdf',
            );
    return response()->download($file, 'sertifikat.pdf', $headers);
    }
}

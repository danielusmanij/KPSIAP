<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SertifikatController extends Controller
{
    public function index(){
        return view('sertifikat.index');
    }
}

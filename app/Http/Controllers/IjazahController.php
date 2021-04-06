<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IjazahController extends Controller
{
    public function index(){
        return view('ijazah.index');
    }
}

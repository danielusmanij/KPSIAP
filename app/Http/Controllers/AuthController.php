<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{

    public function index(){
        return view('auths.login');
    }

    public function login(Request $request){
        $noInduk= $request->input('txtNoInduk');
        $password= $request->input('txtPassword');

        $idRole = User::where(['id_user'=>$noInduk,'password'=>md5($password)])->value('id_role');
        $idSekolah = User::where(['id_user'=>$noInduk,'password'=>md5($password)])->value('id_sekolah');
        $username = User::where(['id_user'=>$noInduk,'password'=>md5($password)])->value('username');

        $checkLogin= User::where(['id_user'=>$noInduk,'password'=>md5($password)])->get();
        if(count($checkLogin) > 0){
            session(['login_success' => true]);
            session(['id_role' => $idRole]);
            session(['id_user' => $noInduk]);
            session(['id_sekolah' => $idSekolah]);
            session(['username' => $username]);
            return redirect('/dashboard');
        }
        else{
            return redirect('/')->with('message','Nomor Induk atau Password Salah');
        }
    }

    public function logout(Request $request){
        $request->session()->flush();
        return redirect('/');
    }
}

<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Illuminate\Http\Request;

class EditPasswordController extends Controller
{
    public function index($id_user)
    {
        $profile = User::find($id_user);
        $role = Role::find(session('id_role'));
        return view('editPassword.index', ['profile' => $profile, 'role' => $role]);
    }

    public function update(Request $request, $id_user)
    {
        $user = User::find(session('id_user'));
        if ($user->password != md5($request->txtOldPassword)) {
            return redirect('/editPassword/' . $id_user)->with('messageFail', 'Kata Sandi Lama Salah');
        } elseif($user->password == md5($request->txtOldPassword)) {
            User::where('id_user', $id_user)
            ->
            update([
                'password' => md5($request->txtNewPassword)
            ]);
            return redirect('/editPassword/' . $id_user)->with('messageSuccess', 'Kata Sandi Berhasil Diubah');
        }
    }
}

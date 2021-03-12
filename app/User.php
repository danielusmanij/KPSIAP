<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'id_user';
    protected $fillable = ['id_user', 'username', 'password', 'id_sekolah', 'id_role'];
    protected $hidden = ['password'];
    public $timestamps = false;
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    protected $table = 'guru';
    protected $primaryKey = 'NIP';
    protected $fillable = ['NIP', 'nama_depan', 'nama_belakang', 'tanggal_lahir', 'agama', 'no_telepon', 'jabatan', 'jenis_kelamin', 'photo', 'id_user'];
    public $timestamps = false;

    public function getProfilePhoto(){
        if(!$this->photo){
            return asset('assets/img/profilePhoto/defaultprofile.jpg');
        }
        return asset('assets/img/profilePhoto/'.$this->photo);
    }
}

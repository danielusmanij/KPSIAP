<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswa';
    protected $primaryKey = 'NIS';
    protected $fillable = ['NIS', 'nama_depan', 'nama_belakang', 'jenis_kelamin', 'tanggal_lahir', 'alamat_siswa', 'id_kelas', 'no_telepon', 'id_user', 'photo', 'agama'];
    public $timestamps = false;

    public function getProfilePhoto(){
        if(!$this->photo){
            return asset('assets/img/profilePhoto/defaultprofile.jpg');
        }
        return asset('assets/img/profilePhoto/'.$this->photo);
    }
}

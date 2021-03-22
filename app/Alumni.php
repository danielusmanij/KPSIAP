<?php


namespace App;


use Illuminate\Database\Eloquent\Model;

class Alumni extends Model
{
    protected $table = 'alumni';
    protected $primaryKey = 'id_alumni';
    protected $fillable = ['id_alumni','tahun_lulus', 'nama_depan', 'nama_belakang', 'id_user', 'id_sekolah'];
    public $timestamps = false;

//    public function getProfilePhoto(){
//        if(!$this->photo){
//            return asset('assets/img/profilePhoto/defaultprofile.jpg');
//        }
//        return asset('assets/img/profilePhoto/'.$this->photo);
//    }
}

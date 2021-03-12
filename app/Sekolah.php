<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sekolah extends Model
{
    protected $table = 'sekolah';
    protected $primaryKey = 'id_sekolah';
    protected $fillable = ['id_sekolah', 'nama_sekolah', 'alamat_sekolah', 'no_telepon_sekolah', 'id_kurikulum', 'photo'];
    public $timestamps = false;

    public function getSchoolPhoto(){
        if(!$this->photo){
            return asset('assets/img/schoolPhoto/defaultschool.jpg');
        }
        return asset('assets/img/schoolPhoto/' .$this->photo);
    }
}

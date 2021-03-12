<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KegiatanSekolah extends Model
{
    protected $table = 'kegiatan_sekolah';
    protected $primaryKey = 'id_kegiatan';
    protected $fillable = ['id_kegiatan', 'nama_kegiatan', 'waktu_kegiatan', 'id_sekolah', 'photo_kegiatan_sekolah'];
    public $timestamps = false;
    protected $dates = ['waktu_kegiatan'];

    public function getSchoolActivityPhoto(){
        if(!$this->photo_kegiatan_sekolah){
            return asset('assets/img/schoolActivityPhoto/defaultactivity.jpg');
        }
        return asset('assets/fileKegiatan/' .$this->photo_kegiatan_sekolah);
    }
}

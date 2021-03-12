<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SoalUjian extends Model
{
    protected $table = 'soal_ujian';
    protected $primaryKey = 'id_soal_ujian';
    protected $fillable = ['id_soal_ujian', 'file_soal', 'keterangan_soal', 'kode_mata_pelajaran'];
    public $timestamps = false;

}

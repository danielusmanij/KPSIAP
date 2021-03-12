<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    protected $table = 'nilai';
    protected $primaryKey = 'id_nilai';
    protected $fillable = ['id_nilai', 'poin_nilai', 'id_soal_ujian', 'kode_mata_pelajaran', 'NIS'];
    public $timestamps = false;
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jawaban extends Model
{
    protected $table = 'jawaban';
    protected $primaryKey = 'id_jawaban';
    protected $fillable = ['id_jawaban', 'file_jawaban', 'id_soal_ujian', 'NIS'];
    public $timestamps = false;
}

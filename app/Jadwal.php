<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    protected $table = 'jadwal';
    protected $primaryKey = 'id_jadwal';
    protected $fillable = ['id_jadwal', 'waktu', 'hari', 'NIS', 'NIP', 'kode_mata_pelajaran'];
    public $timestamps = false;
}

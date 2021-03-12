<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pertemuan extends Model
{
    protected $table = 'pertemuan';
    protected $primaryKey = 'id_pertemuan';
    protected $fillable = ['id_pertemuan', 'nama_pertemuan', 'keterangan_pertemuan', 'id_jadwal'];
    public $timestamps = false;
}

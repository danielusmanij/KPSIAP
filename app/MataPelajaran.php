<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MataPelajaran extends Model
{
    protected $table = 'mata_pelajaran';
    protected $primaryKey = 'kode_mata_pelajaran';
    protected $fillable = ['kode_mata_pelajaran', 'nama_mata_pelajaran', 'kkm'];
    public $timestamps = false;
    public $incrementing = false;

}

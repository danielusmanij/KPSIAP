<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PresensiGuru extends Model
{
    protected $table = 'presensi_guru';
    protected $primaryKey = 'id_presensi_guru';
    protected $fillable = ['id_presensi_guru', 'tanggal_presensi_guru', 'waktu_presensi_guru', 'keterangan_presensi_guru', 'id_pertemuan', 'NIP'];
    public $timestamps = false;
}

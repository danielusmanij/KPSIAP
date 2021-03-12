<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PresensiSiswa extends Model
{
    protected $table = 'presensi_siswa';
    protected $primaryKey = 'id_presensi_siswa';
    protected $fillable = ['id_presensi_siswa', 'tanggal_presensi_siswa', 'waktu_presensi_siswa', 'keterangan_presensi_siswa', 'id_pertemuan', 'NIS'];
    public $timestamps = false;
}

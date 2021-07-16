<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VerifikasiKehadiran extends Model
{
    protected $table = 'verifikasi_kehadiran';
    protected $primaryKey = 'id';
    protected $fillable = ['id','NIP', 'NIS', 'nama_depan', 'tanggal_presensi_siswa', 'kehadiran','waktu_presensi_siswa','nama_belakang'];
    public $timestamps = false;
}

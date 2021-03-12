<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrangTua extends Model
{
    protected $table = 'orangtua';
    protected $primaryKey = 'id_orang_tua';
    protected $fillable = ['id_orang_tua', 'nama_depan', 'nama_belakang', 'alamat_orang_tua', 'keterangan_status', 'NIS', 'nomor_telepon', 'perkerjaan'];
    public $timestamps = false;
}

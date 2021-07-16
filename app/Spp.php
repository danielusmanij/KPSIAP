<?php


namespace App;


use Illuminate\Database\Eloquent\Model;

class Spp extends Model
{
    protected $table = 'spp_admin';
    protected $primaryKey = 'id_spp_admin';
    protected $fillable = [ 'NIS','tanggal_aktual_pembayaran','tanggal_jatuh_tempo', 'nama_depan','nama_belakang','harga_spp_detail','bukti_pemabayaran','verifikasi_spp','status_bayar'];
    public $timestamps = false;
}

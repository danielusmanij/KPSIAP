<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kurikulum extends Model
{

    protected $table = 'kurikulum';
    protected $primaryKey = 'id_kurikulum';
    protected $fillable = ['id_kurikulum', 'nama_kurikulum'];
    public $timestamps = false;
    public $incrementing = false;
}

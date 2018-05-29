<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KetidakhadiranGuru extends Model
{
    protected $table = "ketidakhadiranguru";
	protected $primarykey= "id_ketidakhadiran";
	public $incrementing = true;
	public $timestamps = false;
    protected $fillable = [
        'id_ketidakhadiran',
        'nip',
        'tanggal',
        'keterangan',
    ];
}

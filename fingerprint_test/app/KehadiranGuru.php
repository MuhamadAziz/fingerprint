<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KehadiranGuru extends Model
{
    protected $table = "kehadiranguru";
	protected $primarykey= "id_kehadiran";
	public $incrementing = true;
	public $timestamps = false;
    protected $fillable = [
        'id_kehadiran',
        'nip',
        'tanggal',
        'waktu',
        'status',
    ];
}

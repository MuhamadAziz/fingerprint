<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = "siswa";
	protected $primarykey= "nis";
	public $incrementing = false;
	public $timestamps = false;
    protected $fillable = [
        'nis',
        'nama',
        'tempat_lahir',
        'tanggal_lahir',
        'jk',
        'alamat',
        'id_rayon',
        'id_rombel',
    ];
}

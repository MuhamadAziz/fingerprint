<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
   protected $table = "jurusan";
	protected $primarykey= "id_jurusan";
	public $incrementing = false;
	public $timestamps = false;
    protected $fillable = [
        'id_jurusan',
        'nama_jurusan',
    ];
}
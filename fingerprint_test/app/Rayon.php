<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rayon extends Model
{
    protected $table = "rayon";
	protected $primarykey= "id_rayon";
	public $incrementing = false;
	public $timestamps = false;
    protected $fillable = [
        'id_rayon',
        'nama_rayon',
    ];
}

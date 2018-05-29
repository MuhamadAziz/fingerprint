<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rombel extends Model
{
    protected $table = "rombel";
	protected $primarykey= "id_rombel";
	public $incrementing = false;
	public $timestamps = false;
    protected $fillable = [
        'id_rombel',
        'id_jurusan',
        'rombel',
    ];
}

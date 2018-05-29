<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    protected $table = "guru";
	protected $primarykey= "nip";
	public $incrementing = false;
	public $timestamps = false;
    protected $fillable = [
        'nip',
        'nama',
    ];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FingerprintGuru extends Model
{
    protected $table = "fingerprint_machines_guru";
	protected $primarykey= "id";
	public $incrementing = true;
	public $timestamps = true;
    protected $fillable = [
        'id',
        'ip',
        'comkey',
        'status',
    ];
}

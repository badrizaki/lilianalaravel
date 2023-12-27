<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    protected $table = 'partner';
    protected $primaryKey = 'partnerId';
    protected $fillable = [
		'name',
		'imageUrl',
		'order',
		'userId',
		'created_at',
		'updated_at',
    ];
}

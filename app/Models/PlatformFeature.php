<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PlatformFeature extends Model
{
    protected $table = 'platformfeature';
    protected $primaryKey = 'platformfeatureId';
    protected $fillable = [
		'platformId',
		'description',
		'descriptionInd',
		'order',
		'userId',
		'created_at',
		'updated_at',
    ];
}

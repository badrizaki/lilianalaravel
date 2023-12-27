<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table = 'settings';
    protected $primaryKey = 'settingId';
    protected $fillable = [
		'type',
		'key',
		'value',
		'valueInd',
		'title',
		'titleInd',
		'order',
		'publish',
		'created_at',
		'updated_at',
    ];
}

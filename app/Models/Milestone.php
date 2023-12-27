<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Milestone extends Model
{
    protected $table = 'milestone';
    protected $primaryKey = 'milestoneId';
    protected $fillable = [
		'year',
		'description',
		'order',
		'userId',
		'created_at',
		'updated_at',
    ];
}

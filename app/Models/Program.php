<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    protected $table = 'program';
    protected $primaryKey = 'programId';
    protected $fillable = [
		'title',
		'titleInd',
		'content',
		'contentInd',
		'order',
		'userId',
		'created_at',
		'updated_at',
    ];
}

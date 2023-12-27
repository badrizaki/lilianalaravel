<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Why extends Model
{
    protected $table = 'why';
    protected $primaryKey = 'whyId';
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

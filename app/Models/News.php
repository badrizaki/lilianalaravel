<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';
    protected $primaryKey = 'newsId';
    protected $fillable = [
		'title',
		'titleInd',
		'shortDesc',
		'shortDescInd',
		'content',
		'contentInd',
		'imageUrl',
		'thumbUrl',
		'externalUrl',
		'order',
		'main',
		'userId',
		'date',
		'created_at',
		'updated_at',
    ];
}

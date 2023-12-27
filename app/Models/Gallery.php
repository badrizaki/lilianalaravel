<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $table = 'gallery';
    protected $primaryKey = 'galleryId';
    protected $fillable = [
		'galleryType',
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
		'created_at',
		'updated_at',
    ];
}

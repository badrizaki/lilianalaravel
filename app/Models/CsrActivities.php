<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CsrActivities extends Model
{
    protected $table = 'csractivities';
    protected $primaryKey = 'csractivitiesId';
    protected $fillable = [
		'title',
		'titleInd',
		'shortContent',
		'shortContentInd',
		'content',
		'contentInd',
		'publishDate',
		'thumbUrl',
		'imageUrl',
		'order',
		'userId',
		'created_at',
		'updated_at',
    ];
}

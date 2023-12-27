<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrackRecord extends Model
{
    protected $table = 'trackrecord';
    protected $primaryKey = 'trackrecordId';
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
		'date',
		'order',
		'userId',
		'created_at',
		'updated_at',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'event';
    protected $primaryKey = 'eventId';
    protected $fillable = [
		'title',
		'titleInd',
		'shortDesc',
		'shortDescInd',
		'content',
		'contentInd',
		'location',
		'dateEvent',
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

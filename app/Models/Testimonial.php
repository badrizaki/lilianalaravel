<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $table = 'testimonial';
    protected $primaryKey = 'testimonialId';
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
		'created_at',
		'updated_at',
    ];
}

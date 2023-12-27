<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $table = 'slider';
    protected $primaryKey = 'sliderId';
    protected $fillable = [
		'sliderTitle',
		'sliderText',
		'sliderFilename',
		'url',
		'thumbUrl',
		'imageUrl',
		'statusPublish',
		'order',
		'userId',
		'created_at',
		'updated_at',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SustainabilityReport extends Model
{
    protected $table = 'sustainabilityreport';
    protected $primaryKey = 'sustainabilityreportId';
    protected $fillable = [
		'title',
		'titleInd',
		'shortContent',
		'shortContentInd',
		'content',
		'contentInd',
		'publishDate',
		'pdfUrl',
		'imageUrl',
		'order',
		'userId',
		'created_at',
		'updated_at',
    ];
}

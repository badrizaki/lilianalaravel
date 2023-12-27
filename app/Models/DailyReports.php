<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DailyReports extends Model
{
    protected $table = 'dailyreports';
    protected $primaryKey = 'dailyreportsId';
    protected $fillable = [
		'title',
		'titleInd',
		'shortContent',
		'shortContentInd',
		'content',
		'contentInd',
		'publishDate',
		'pdfUrl',
		'thumbUrl',
		'imageUrl',
		'order',
		'userId',
		'created_at',
		'updated_at',
    ];
}

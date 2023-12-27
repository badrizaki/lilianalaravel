<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FullReports extends Model
{
    protected $table = 'fullreports';
    protected $primaryKey = 'fullreportsId';
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
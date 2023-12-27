<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AnnualReports extends Model
{
    protected $table = 'annualreports';
    protected $primaryKey = 'annualreportsId';
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

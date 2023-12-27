<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FinancialStatement extends Model
{
    protected $table = 'financialstatement';
    protected $primaryKey = 'financialstatementId';
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

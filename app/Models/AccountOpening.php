<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AccountOpening extends Model
{
    protected $table = 'accountopening';
    protected $primaryKey = 'accountopeningId';
    protected $fillable = [
		'titleHome',
		'titleHomeInd',
		'contentHome',
		'contentHomeInd',
		'title',
		'titleInd',
		'content',
		'contentInd',
		'pdfText',
		'pdfTextInd',
		'pdfUrl',
		'order',
		'userId',
		'created_at',
		'updated_at',
    ];
}

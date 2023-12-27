<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MeetingShareholders extends Model
{
    protected $table = 'meetingshareholders';
    protected $primaryKey = 'meetingshareholdersId';
    protected $fillable = [
		'title',
		'titleInd',
		'shortContent',
		'shortContentInd',
		'content',
		'contentInd',
		'publishDate',
		'pdfUrl',
		'pdfUrlInd',
		'thumbUrl',
		'imageUrl',
		'order',
		'userId',
		'created_at',
		'updated_at',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InformationDisclosure extends Model
{
    protected $table = 'informationdisclosure';
    protected $primaryKey = 'informationdisclosureId';
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
		'imageUrl',
		'order',
		'userId',
		'created_at',
		'updated_at',
    ];
}

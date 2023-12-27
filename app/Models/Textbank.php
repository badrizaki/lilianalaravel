<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TextBank extends Model
{
    protected $table = 'textbank';
    protected $primaryKey = 'textBankId';
    protected $fillable = [
		'page',
		'key',
		'urlTitle',
		'menu',
		'menuInd',
		'title',
		'titleInd',
		'content',
		'contentInd',
		'content2',
		'content2Ind',
		'imageUrl',
		'userId',
		'created_at',
		'updated_at',
    ];
}

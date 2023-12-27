<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CodeOfConduct extends Model
{
    protected $table = 'codeofconduct';
    protected $primaryKey = 'codeofconductId';
    protected $fillable = [
		'title',
		'titleInd',
		'description',
		'descriptionInd',
		'order',
		'userId',
		'created_at',
		'updated_at',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    protected $table = 'template';
    protected $primaryKey = 'templateId';
    protected $fillable = [
		'page',
		'key',
		'title',
		'content',
		'contentInd',
		'content2',
		'content2Ind',
		'remark',
		'created_at',
		'updated_at',
    ];
}

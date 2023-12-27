<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $table = 'file';
    protected $primaryKey = 'fileId';
    protected $fillable = [
		'type',
		'id',
		'filetype',
		'filename',
		'fileUrl',
		'imageUrl',
		'thumbUrl',
		'order',
		'userId',
		'created_at',
		'updated_at',
    ];
}
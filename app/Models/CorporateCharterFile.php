<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CorporateCharterFile extends Model
{
    protected $table = 'corporatecharterfile';
    protected $primaryKey = 'corporatecharterfileId';
    protected $fillable = [
		'corporatecharterId',
		'order',
		'userId',
		'created_at',
		'updated_at',
    ];
}

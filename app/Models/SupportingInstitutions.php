<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SupportingInstitutions extends Model
{
    protected $table = 'supportinginstitutions';
    protected $primaryKey = 'supportinginstitutionsId';
    protected $fillable = [
		'title',
		'titleInd',
		'location',
		'address',
		'phone',
		'email',
		'order',
		'userId',
		'created_at',
		'updated_at',
    ];
}

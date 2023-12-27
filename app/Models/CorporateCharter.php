<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CorporateCharter extends Model
{
    protected $table = 'corporatecharter';
    protected $primaryKey = 'corporatecharterId';
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

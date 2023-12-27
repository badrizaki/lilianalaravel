<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StepTrading extends Model
{
    protected $table = 'steptrading';
    protected $primaryKey = 'steptradingId';
    protected $fillable = [
		'title',
		'titleInd',
		'order',
		'userId',
		'created_at',
		'updated_at',
    ];
}

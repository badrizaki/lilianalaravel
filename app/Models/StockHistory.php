<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StockHistory extends Model
{
    protected $table = 'stockhistory';
    protected $primaryKey = 'stockhistoryId';
    protected $fillable = [
		'corporateAction',
		'corporateActionInd',
		'date',
		'totalStock',
		'isTotal',
		'order',
		'userId',
		'created_at',
		'updated_at',
    ];
}

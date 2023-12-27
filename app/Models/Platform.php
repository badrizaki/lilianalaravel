<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Platform extends Model
{
    protected $table = 'platform';
    protected $primaryKey = 'platformId';
    protected $fillable = [
		'platformName',
		'platformNameInd',
		'platformTitle',
		'platformTitleInd',
		'homeTitle',
		'homeTitleInd',
		'iconHome',
		'description',
		'descriptionInd',
		'imageUrl',
		'featureTitle',
		'featureTitleInd',
		'platformDownload',
		'order',
		'userId',
		'created_at',
		'updated_at',
    ];
}

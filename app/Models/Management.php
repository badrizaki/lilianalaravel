<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Management extends Model
{
    protected $table = 'management';
    protected $primaryKey = 'managementId';
    protected $fillable = [
		'type',
		'name',
		'shortDescription',
		'shortDescriptionInd',
		'nationality',
		'dob',
		'lastEducation',
		'lastEducationInd',
		'appointmentHistory',
		'appointmentHistoryInd',
		'currentPosition',
		'currentPositionInd',
		'affiliate',
		'affiliateInd',
		'mpiShare',
		'order',
		'userId',
		'created_at',
		'updated_at',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ManagementExperience extends Model
{
    protected $table = 'managementexperience';
    protected $primaryKey = 'managementexperienceId';
    protected $fillable = [
		'managementId',
		'from',
		'to',
		'experienceDescription',
		'experienceDescriptionInd',
		'order',
		'userId',
		'created_at',
		'updated_at',
    ];
}

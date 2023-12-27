<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    protected $table = 'applicant';
    protected $primaryKey = 'applicantId';
    protected $fillable = [
		'name',
		'email',
		'phoneNumber',
		'jobApply',
		'cvUrl',
		'message',
		'created_at',
		'updated_at',
    ];
}

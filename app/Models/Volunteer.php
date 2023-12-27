<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Volunteer extends Model
{
    protected $table = 'volunteer';
    protected $primaryKey = 'volunteerId';
    protected $fillable = [
		'name',
		'backgroundVolunteer',
		'content',
		'location',
		'phoneNumber',
		'email',
		'imageUrl',
		'thumbUrl',
		'userId',
		'order',
		'main',
		'created_at',
		'updated_at',
    ];
}

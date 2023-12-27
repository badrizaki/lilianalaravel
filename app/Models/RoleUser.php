<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoleUser extends Model
{
	public $timestamps = false;
    protected $table = 'role_user';
    protected $primaryKey = 'role_user_id';
    protected $fillable = [
		'user_id',
		'role_id',
    ];
}

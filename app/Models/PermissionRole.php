<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PermissionRole extends Model
{
    protected $table = 'permission_role';
    protected $primaryKey = 'permission_role_id';
    protected $fillable = [
		'permission_id',
		'role_id',
    ];
}

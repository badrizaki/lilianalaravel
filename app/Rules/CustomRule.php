<?php

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

/**
 *  Name         : Custome Rule.
 *  Description  : This function for customer rule.
 *  @copyright   : Badri Zaki
 *  @version     : 1.8
 *  @author      : Badri Zaki - badrizaki@gmail.com
**/

Validator::extend('orderBy', function ($attribute, $value, $parameters, $validator)
{
    $table = isset($parameters[0]) ? $parameters[0] : '';
    
    $GLOBALS["field"] = $value;
    $validator->addReplacer('field', function($message, $attribute, $rule, $table)
    {
        global $field;
        return str_replace([':field'], $field, $message);
    });
    if(!Schema::hasColumn($table, $value))
        return false;
    else
        return true;
});

Validator::extend('field', function ($attribute, $value, $parameters, $validator)
{

    $fields = explode(',', $value);
    foreach ($fields as $field)
    {
        $GLOBALS["field"] = $field;
        $validator->addReplacer('field', function($message, $attribute, $rule, $table)
        {
            global $field;
            return str_replace([':field'], $field, $message);
        });
        $table = isset($parameters[0]) ? $parameters[0] : '';
        if(!Schema::hasColumn($table, $field))
            return false;
    }
    return true;
});

Validator::extend('without_spaces', function($attr, $value){
    return preg_match('/^\S*$/u', $value);
});

Validator::extend('checkHashedPass', function($attribute, $value, $parameters)
{
    $table = isset($parameters[0]) ? $parameters[0] : '';
    $field = isset($parameters[1]) ? $parameters[1] : '';
    $valueCheck = isset($parameters[2]) ? $parameters[2] : '';
    $users = DB::table($table)->where($field, $valueCheck)->get()->last();

    if ($users)
    {
        if(!Hash::check( $value , $users->password ) )
            return false;
    }

    return true;
});
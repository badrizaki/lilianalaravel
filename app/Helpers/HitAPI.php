<?php

namespace App\Helpers;
 
/**
 *  Name         : HitAPI.
 *  Description  : This class for hit API using guzzle.
 *  @copyright   : Badri Zaki
 *  @version     : 1.8
 *  @author      : Badri Zaki - badrizaki@gmail.com
**/

use Illuminate\Support\Facades\Facade;

class HitAPI extends Facade
{
	/* BASIC AUTH
	$response = \HitAPI::post(
	    'https://example.com/post',
	    [
	        'auth' => [ 'theUsername', 'thePassword'],
	    ]
	);
	*/
    protected static function getFacadeAccessor()
    {
        return 'guzzle';
    }
}
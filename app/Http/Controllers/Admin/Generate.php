<?php 

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Datatables;

class Generate extends BaseController
{
    public function menu()
    {
    	$configMenu = \Config::get('menu', []);
    	$mappingMenu = $configMenu['mappingMenu'];
    	$whiteList = $configMenu['whiteList'];

    	$routeCollection = \Route::getRoutes();
    	$menus = [];
    	foreach ($routeCollection as $key => $data)
    	{
    		$roleName = $data->getName();
    		/*echo $data->getActionName() . " = ";
    		print_r(strpos($data->getActionName(), "App\Http\Controllers\Admin"));
    		echo "<br>";
    		continue;*/
    		if (strpos($data->getActionName(), "App\Http\Controllers\Admin") === 0)
    		{
    			if (!in_array($roleName, $whiteList) && $roleName != "")
    			{
	    			$categoriesRoute = explode('.', $data->getName());
	    			$categoryRoute = isset($categoriesRoute[0]) ? $categoriesRoute[0] :'';
			        $roleName = str_replace('.index', '-list', $roleName);
			        $roleName = str_replace('.list', '-list', $roleName);
			        $roleName = str_replace('.destroy', '-delete', $roleName);
			        $roleName = str_replace('.delete', '-delete', $roleName);
			        $roleName = str_replace('.show', '-list', $roleName);
			        $roleName = str_replace('.add', '-create', $roleName);
			        $roleName = str_replace('.upload.excel', '-create', $roleName);
			        $roleName = str_replace('.store', '-create', $roleName);
			        $roleName = str_replace('.create', '-create', $roleName);
			        $roleName = str_replace('.update', '-edit', $roleName);
			        $roleName = str_replace('.edit', '-edit', $roleName);
			        $roleName = str_replace('.order', '-edit', $roleName);
			        $name = $roleName;
			        $category = isset($mappingMenu[$categoryRoute]) ? $mappingMenu[$categoryRoute]:'';
			        $type = "";
			        $displayName = $category;
			        $isNotDeleted = "1";

			        if (strpos($roleName, "-list") >= 2 || strpos($roleName, "-show") >= 2)
			        {
			        	$type = "READ";
			        } elseif (strpos($roleName, "-create") >= 2) {
			        	$type = "CREATE";
			        } elseif (strpos($roleName, "-edit") >= 2) {
			        	$type = "UPDATE";
			        } elseif (strpos($roleName, "-delete") >= 2) {
			        	$type = "DELETE";
			        }

			        $menus[$name] = [
			        	"name" => $name,
			        	"category" => $category,
			        	"type" => $type,
			        	"display_name" => $displayName,
			        	"isNotDeleted" => $isNotDeleted,
			        ];
    			}
    		}
    	}
    	\DB::statement("SET foreign_key_checks=0");
    	\App\Models\Permission::truncate();
    	\DB::statement("SET foreign_key_checks=1");
    	\App\Models\Permission::insert($menus);
    }
}
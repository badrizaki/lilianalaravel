<?php

use Illuminate\Database\Seeder;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     // php artisan db:seed --class=PermissionTableSeeder
    public function run()
    {
        $data = [];
        $data = array_merge(
        	$this->data('topbanner', 'Top Banner'),
        	$this->data('about', 'About', 'edit'),
        	$this->data('howworks', 'How Works'),
        	$this->data('partner', 'Partner'),
        	$this->data('websitename', 'Website Name', 'edit'),
        	$this->data('keyword', 'Keyword', 'edit'),
        	$this->data('description', 'Description', 'edit'),
        	$this->data('changepassword', 'Change Password', 'edit'),
        	$this->data('gadgetcategory', 'Gadget Category'),
        	$this->data('gadgettype', 'Gadget Type'),
        	$this->data('producttext', 'Product Text', 'edit'),
        	$this->data('product', 'Product'),
        	$this->data('user', 'User'),
        	$this->data('role', 'Role'),
        	$this->data('address', 'Address', 'edit'),
        	$this->data('emails', 'Emails', 'edit'),
        	$this->data('template', 'Template', 'list|edit')
        );
    	DB::table('permissions')->insert($data);
    }

	//$this->data('topbanner', 'Top Banner', 'list|create|edit|delete'),
    public function data($prefixname, $category, $permissionType = 'ALL')
    {
        $data = [];
        $permission = [];
        $permissionAll = [
        	'list' => ['list' => 'READ'], 
        	'create' => ['create' => 'CREATE'], 
        	'edit' => ['edit' => 'UPDATE'], 
        	'delete' => ['delete' => 'DELETE']
        ];
        if ($permissionType == 'ALL')
        {
        	$permission = ['list' => 'READ', 'create' => 'CREATE', 'edit' => 'UPDATE', 'delete' => 'DELETE'];
        } else {
        	$permissionTypeArray = explode('|', $permissionType);
        	foreach ($permissionTypeArray as $key => $value)
        	{
        		$permission = array_merge($permissionAll[$value], $permission);
        	}
        }
        foreach ($permission as $value => $type)
        {
            $data[] = [
                'name' => $prefixname.'-'.$value,
                'category' => $category,
                'type' => $type,
                'display_name' => $category.' '.$value,
                'description' => '',
            ];
        }

        return $data;
    }

}

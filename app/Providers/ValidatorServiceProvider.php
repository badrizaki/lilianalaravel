<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;

class ValidatorServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app['validator']->extend('checktable', function ($attribute, $value, $parameters, $validator)
        {
            /**
            * 'customerCode' => 'checktable:customers,customerCode',
            * $attribute => 'checktable:$parameters[0],parameters[1].'
            * $value
            */
            $validatorData = $validator->getData();
            $table = isset($parameters[0])?$parameters[0]:'';
            $field = isset($parameters[1])?$parameters[1]:'';

            if ($field == '') $field = $attribute;

            $query = DB::table($table)->where($field, $value);
            foreach ($parameters as $key => $fieldName)
            {
                $valueField = isset($validatorData[$fieldName])?$validatorData[$fieldName]:'';
                if ($key != 0 && $key != 1)
                {
                    if ($valueField != '')
                    {
                        $query->where($fieldName, $valueField);
                    }
                    else {
                        return false;
                    }
                }
            }
            $result = $query->first();

            if ($result)
                return true;
            else
                return false;
        });

        $this->app['validator']->extend('checkrole', function ($attribute, $value, $parameters, $validator)
        {
            if (is_numeric($value)) {
                return false;
            }
            return true;
        });

        /**
        * Validation between value/input and default/old value
        * 'customerCode' => 'matchvalue:'.$request->customerCode_old,
        */
        $this->app['validator']->extend('matchvalue', function ($attribute, $value, $parameters, $validator)
        {
            $oldValue = isset($parameters[0])?$parameters[0]:'';
            if ($value == $oldValue)
                return true;
            else
                return false;
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
    }
}

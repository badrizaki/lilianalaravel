<?php

namespace App\Http\Controllers\Admin;

trait RESTfull
{
    public function redirectPath()
    {
        return property_exists($this, 'redirectTo') ? 'admin/'.$this->redirectTo : '';
    }

    public function redirectIndexPath()
    {
        return property_exists($this, 'redirectIndex') ? 'admin.'.$this->redirectIndex : '';
    }

    public function redirectEditablePath()
    {
        return property_exists($this, 'redirectEditable') ? 'admin.'.$this->redirectEditable : '';
    }

    public function redirectShowPath()
    {
        return property_exists($this, 'redirectShow') ? 'admin.'.$this->redirectShow : '';
    }
}
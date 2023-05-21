<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    use HasFactory;
    protected $table='session_settings';

    function getMenu(){
        $menu['admin']['Settings'] = array();
        $menu['admin']['Settings']['Add Authentication'] = url('setting/add-authentication');
        return $menu;
	
    }
}

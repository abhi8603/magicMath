<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class MenuModel extends Model
{
    protected $table='auth_menu_detail';
    function __construct()
	{	
		
       
	}

    function getMenu(){
        $menu = array();
   
        $menu['admin']['Dashbord']= url('dashboard');
        $menu['admin']['Settings']=array();
        $menu['admin']['Settings']['General Setting']= url('dashboard');
        $menu['admin']['Settings']['General Setting']= url('general-setting');
        $menu['admin']['Settings']['Theam Setting']= url('theam-setting');
        $menu['admin']['Settings']['Session Setting']= url('session-setting');
        $menu['admin']['Settings']['Session Setting']= url('session-setting');

        $menu['admin']['Administrator']['Menu Setting']= array();
        $menu['admin']['Administrator']['Menu Setting']['Auth Types']= url('auth-types');
        $menu['admin']['Administrator']['Menu Setting']['Authorize User']= url('authorize-user');
        $menu['admin']['Administrator']['Menu Setting']['Add Menu']= url('addMenu');

       # $menu['admin']['Administrator']['Email Setting']= url('email-setting');

        $menu['admin']['Student']['Student Admission']= url('student-admission');


        $menu['admin']['Academics']= array();
        $menu['admin']['Academics']['Class']= url('class');
        $menu['admin']['Academics']['Section']= url('section');

        $menu['principal']['Student']=array();
        $menu['principal']['Student']['Student Admission']= url('student-admission');

        

        $menu['principal']['Academics']=array();
        $menu['principal']['Academics']['Class']= url('class');
        $menu['principal']['Academics']['Section']= url('section');

       // $menu['tech']['Dashbord']= url('dashboard');

        return $menu;
    }
}

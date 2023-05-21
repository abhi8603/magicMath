<?php

namespace App\Http\Controllers;

use Auth;
use App\AppConfig;
use App\Models\Session;
use App\Models\MenuModel;
use App\Models\AuthTypes;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');      

    }
    function studentAdmission(Request $request){
        return view('student.admission');
    }
}

?>
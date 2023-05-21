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

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        //  $this->middleware('SchoolMiddleware');

    }
    public function addMenu()
    {
        $menu = array();
        $auths = DB::table('auth_types')->where('status', 1)->groupBy('type')->get();
        foreach ($auths as $auth) {
            if (file_exists(base_path() . "\app\Models\MenuModel.php")) {
                $menu[$auth->type] = array();
                $MenuModel = new MenuModel();
                $model_menu = $MenuModel->getMenu();
                if (isset($model_menu[$auth->type]) && is_array($model_menu[$auth->type])) {
                    $menu[$auth->type] = array_merge($menu[$auth->type], $model_menu[$auth->type]);
                }
            }
        }
        $temp = null;
        foreach ($menu as $key => $value) {
            if (is_array($value)) {
                foreach ($value as $key1 => $value1) {
                    if (is_array($value1)) {
                        foreach ($value1 as $key2 => $value2) {
                            if (is_array($value2)) {
                                foreach ($value2 as $key3 => $value3) {
                                    if (is_array($value3)) {
                                        foreach ($value3 as $key4 => $value4) {
                                            $this->enter_detail($key, $key1, $key2, $key3, $key4, $value4);
                                        }
                                    } else {
                                        $this->enter_detail($key, $key1, $key2, $key3, $temp, $value3);
                                    }
                                }
                            } else {
                                $this->enter_detail($key, $key1, $key2, $temp, $temp, $value2);
                            }
                        }
                    } else {
                        $this->enter_detail($key, $key1, $temp, $temp, $temp, $value1);
                    }
                }
            } else { //echo "		".$value."<br>";
            }
            //$i++;
        }
        echo "Done";
    }
    public  function enter_detail($auth, $submenu1, $submenu2 = null, $submenu3 = null, $submenu4 = null, $link)
    {
        if ($submenu4 != NULL) {
            $sql = "SELECT * FROM auth_menu_detail 
            where auth_id='" . $auth . "' and submenu1='" . $submenu1 . "' and  submenu2='" . $submenu2 . "' 
            and submenu3='" . $submenu3 . "' and submenu4='" . $submenu4 . "'";
            $query = DB::select($sql);
        } elseif ($submenu3 != NULL) {
            $sql = "SELECT * FROM auth_menu_detail where auth_id='" . $auth . "' and submenu1='" . $submenu1 . "' 
            and  submenu2='" . $submenu2 . "' 
            and submenu3='" . $submenu3 . "'";
            $query = DB::select($sql);
        } elseif ($submenu2 != NULL) {
            $sql = "SELECT * FROM auth_menu_detail where auth_id='" . $auth . "' and submenu1='" . $submenu1 . "' 
            and  submenu2='" . $submenu2 . "'";
            $query = DB::select($sql);
        } else
            $sql = "SELECT * FROM auth_menu_detail where auth_id='" . $auth . "' and submenu1='" . $submenu1 . " '";
        $query = DB::select($sql);
        if (count($query) > 0) {
            return;
        }
        //code to remove siteurl from link
        $string =  $link;
        $s = explode("/", $string);
        unset($s[0]);
        unset($s[1]);
        unset($s[2]);
        unset($s[3]);
        //unset($s[4]);
        $s = implode("/", $s);

        $data = array(
            'auth_id' => $auth,
            'submenu1' => $submenu1,
            'submenu2' => $submenu2,
            'submenu3' => $submenu3,
            'submenu4' => $submenu4,
            'link' => $s
        );
        DB::table('auth_menu_detail')->insert($data);
        echo "Done...";
    }
    public function authorizeUser(Request $request)
    {
        if ($request->isMethod('post')) {
            $this->validate($request, [
                'user_id' => 'required|unique:user_auth_type,auth_type,status',
                'auth_type' => 'required',
            ]);
            $save = array(
                "user_id" => $request->user_id,
                "auth_type" => $request->auth_type,
                "created_by" => Auth::user()->id
            );
            $saveid = DB::table('user_auth_type')->insertGetId($save);
            if ($saveid) {
                return redirect('authorize-user')->with([
                    'message' => 'User Authorization Added Succesfully.',
                ]);
            } else {
                return redirect('authorize-user')->with([
                    'message' => 'Someting Went Worng.Please try again.',
                    'message_important' => true
                ]);
            }
        }
        $auth_types = DB::table('auth_types')
            ->select(DB::raw('id,name,type,if(status=1,"Active","Inactive") as status'))
            ->orderBy('id', 'desc')
            ->where('status', '1')
            ->get();
        $users = DB::table('users')->where('status', 'A')->whereNotIn('role', ['S', 'P'])
            ->get();

        $user_auth_types = paginateArray(
            DB::select("SELECT a.id,a.status,b.name,c.name AS auth_name FROM user_auth_type a
                INNER JOIN users b ON a.user_id=b.id
                INNER JOIN auth_types c ON a.auth_type=c.type
                WHERE a.status=1
                GROUP BY a.user_id,a.auth_type"),
            5
        );

        return view('settings.authorize-user', compact('auth_types', 'users', 'user_auth_types'));
    }


    public function authTypes(Request $request)
    {
        if ($request->isMethod('post')) {
            $this->validate($request, [
                'type' => 'required|unique:auth_types|max:255',
                'name' => 'required',
            ]);

            $save = array(
                "name" => $request->name,
                "type" => $request->type,
                "created_by" => Auth::user()->id
            );
            $saveid = DB::table('auth_types')->insertGetId($save);
            if ($saveid) {
                return redirect('auth-types')->with([
                    'message' => 'Auth Type Added Succesfully.',
                ]);
            } else {
                return redirect('auth-types')->with([
                    'message' => 'Someting Went Worng.Please try again.',
                    'message_important' => true
                ]);
            }
        }
        $auth_types = DB::table('auth_types')
            ->select(DB::raw('id,name,type,if(status=1,"Active","Inactive") as status'))
            ->orderBy('id', 'desc')
            ->paginate(5);
        //  echo "<pre>";print_r($allsessions);exit;
        return view('settings.auth_types', compact('auth_types'));
    }
    public function sessionSetting(Request $request)
    {
        $session = new Session();
        if ($request->isMethod('post')) {
            try {

                $count = Session::where('session', $request->session)->count();
                if ($count == 0) {
                    $session->session = $request->session;
                    $session->created_by = Auth::user()->id;

                    $session->save();
                    if ($session->id) {
                        return redirect('session-setting')->with([
                            'message' => 'Acadmice Session Added Succesfully.',
                        ]);
                    } else {
                        return redirect('session-setting')->with([
                            'message' => 'Someting Went Worng.Please try again.',
                            'message_important' => true
                        ]);
                    }
                } else {
                    return redirect('session-setting')->with([
                        'message' => 'Acadmice session Already Exits.',
                        'message_important' => true
                    ]);
                }
            } catch (Exception $e) {
                return redirect('session-setting')->with([
                    'message' => $e,
                    'message_important' => true
                ]);
            }
        }
        $allsessions = DB::table('session_settings')
            ->select(DB::raw('id,session,if(status=1,"Active","Inactive") as status'))
            ->orderBy('id', 'desc')
            ->paginate(5);
        //  echo "<pre>";print_r($allsessions);exit;
        return view('settings.sessionSetting', compact('allsessions'));
    }
    public function generalSetting(Request $request)
    {
        $request->file('file');
        // echo WWW_ROOT;exit;
        if ($request->isMethod('post')) {

            $schoolSetttingCnt = DB::table('create_school')->where('id', Auth::user()->school_id)->count();
            if ($schoolSetttingCnt == 0) {
                $saveArray = array(
                    "school_name" => $request->school_name,
                    "school_address" => $request->address,
                    "school_email" => $request->email,
                    "school_phone" => $request->phone_no,
                    "school_mobile" => $request->mobile_no,
                    "school_fax" => $request->fax,
                    "admin_cont_name" => $request->contact_person,
                    "country" => $request->school_name,
                    "state" => $request->state,
                    "city" => $request->city,
                    "pincode" => $request->postal_code,
                    "language" => "English",
                    "insitute_code" => $request->insitute_code,
                    "website_url" => $request->website_url,
                    "created_by" => $request->school_name,
                );

                if (isset($_FILES['logo']['tmp_name']) || $_FILES['logo']['tmp_name'] != "") {
                    $logo =  FileUpload($_FILES['logo'], "school", 'logo');
                    $saveArray['logo'] = $logo;
                }

                if (isset($_FILES['fev_icon']['tmp_name']) || !empty($_FILES['fev_icon']['tmp_name'])) {
                    $fev_icon =  FileUpload($_FILES['fev_icon'], "school", 'fev_icon');
                    $saveArray['favicon'] = $fev_icon;
                }

                $save =  DB::table('create_school')->insertGetId($saveArray);
                if($save){
                return redirect('general-setting')->with([
                    'message' => 'Record Updated Successfully .',                   
                ]);
            }else{
                return redirect('general-setting')->with([
                    'message' => 'Something went worng. Please try again.',   
                    'message_important' => true                
                ]);
            }
            } else {

                $updateArray = array(
                    "school_name" => $request->school_name,
                    "school_address" => $request->address,
                    "school_email" => $request->email,
                    "school_phone" => $request->phone_no,
                    "school_mobile" => $request->mobile_no,
                    "school_fax" => $request->fax,
                    "admin_cont_name" => $request->contact_person,
                    "country" => $request->school_name,
                    "state" => $request->state,
                    "city" => $request->city,
                    "pincode" => $request->postal_code,
                    "language" => "English",
                    "insitute_code" => $request->insitute_code,
                    "website_url" => $request->website_url,
                    "created_by" => $request->school_name,
                );
                if (isset($_FILES['logo']['tmp_name']) || $_FILES['logo']['tmp_name'] != "") {
                    $logo =  FileUpload($_FILES['logo'], "school", 'logo');
                    $updateArray['logo'] = $logo;
                }
                if (isset($_FILES['fev_icon']['tmp_name']) || !empty($_FILES['fev_icon']['tmp_name'])) {
                    $fev_icon =  FileUpload($_FILES['fev_icon'], "school", 'fev_icon');
                    $updateArray['favicon'] = $fev_icon;
                }

                DB::table('create_school')->where('id', Auth::user()->school_id)->update(array_filter($updateArray));
                return redirect('general-setting')->with([
                    'message' => 'Record Updated Successfully .',
                    //  'message_important' => true
                ]);
            }


            //    FileUpload($_FILES['logo'],"logo",'logo');
            // print_r( $_FILES['logo']);exit;
            exit;
        }

        $schoolSettting = DB::table('create_school')->where('id', Auth::user()->school_id)->limit(1)->get();
        //  echo "<pre>";print_r($schoolSettting);exit;
        return view('settings.general-setting', compact('schoolSettting'));
    }

    public function theamSetting(Request $request)
    {
        //  echo TheamSetting(Auth::user()->school_id,'layout_mode');
        if ($request->isMethod('post')) {
            $savearray = array(
                "layout_mode" => $request->layout_mode,
                "layout_width" => $request->layout_width,
                "layout_position" => ($request->layout_position == 'fixed') ? false  : true,
                "topbar_color" => $request->topbar_color,
                "sidebar_size" => $request->sidebar_size,
                "sidebar_color" => $request->sidebar_color,
                "school_id" => Auth::user()->school_id,
                "created_by" => Auth::user()->id
            );
            DB::table('theam_setting')->where(["school_id" => Auth::user()->school_id])->delete();
            $id =  DB::table('theam_setting')->insertGetId($savearray);
            if ($id) {
                return redirect('theam-setting')->with([
                    'message' => 'Theam Setting Updated Succesfully.',
                ]);
            } else {
                return redirect('theam-setting')->with([
                    'message' => 'Someting Went Worng.Please try again.',
                    'message_important' => true
                ]);
            }
        }
        $theam = DB::table('theam_setting')->where(["school_id" => Auth::user()->school_id])->get();
        return view('settings.theam-setting', compact('theam'));
    }
}

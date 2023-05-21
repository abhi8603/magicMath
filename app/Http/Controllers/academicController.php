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
use App\Jobs\SaveAnswer;
class academicController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    
        function viewDetails(Request $request)
    {
        $prac_id =  $request->prac_id;
        $user_id = Auth::user()->id;


        $section1 =  DB::select("SELECT a.id AS main_id,a.`type`,a.duration,a.prac_id,a.user_submit_time,a.`status`,b.id AS question_id,
       b.quesion,b.answer,b.answer_status,b.user_answer 
        ,c.`option`,c.id AS option_id
        FROM question_type a
        INNER JOIN questions b ON a.id=b.q_type
        LEFT JOIN question_options c ON b.id=c.question_id AND c.q_type_id=a.id AND c.`status`=1
        WHERE a.user_id=$user_id and a.prac_id='$prac_id' AND a.`type`='ADD' AND a.duration=5");

        $section2 = DB::select("SELECT a.id AS main_id,a.`type`,a.duration,a.prac_id,a.user_submit_time,a.`status`,b.id AS question_id,
b.quesion,b.answer,b.answer_status,b.user_answer 
,c.`option`,c.id AS option_id
FROM question_type a
INNER JOIN questions b ON a.id=b.q_type
LEFT JOIN question_options c ON b.id=c.question_id AND c.q_type_id=a.id AND c.`status`=1
WHERE a.user_id=$user_id and a.prac_id='$prac_id'  AND a.`type`='ADD' AND a.duration=3");


        $section3 = DB::select("SELECT a.id AS main_id,a.`type`,a.duration,a.prac_id,a.user_submit_time,a.`status`,b.id AS question_id,
b.quesion,b.answer,b.answer_status,b.user_answer 
,c.`option`,c.id AS option_id
FROM question_type a
INNER JOIN questions b ON a.id=b.q_type
LEFT JOIN question_options c ON b.id=c.question_id AND c.q_type_id=a.id AND c.`status`=1
WHERE a.user_id=$user_id and a.prac_id='$prac_id'  AND a.`type`='MUL' AND a.duration=3");

        return view('academic.detailView', compact('prac_id', 'user_id','section1','section2','section3'));
    }


    function start()
    {
        $response =  $this->syncFile();
        $user_id = Auth::user()->id;
      //  $session_id = $_COOKIE["laravel_session"];
        if ($response) {
            $pageno = isset($request->page) ? $request->page : 1;
            // $section1 = paginateArray(DB::select("SELECT a.id AS main_id,a.`type`,a.duration,a.prac_id,a.user_submit_time,a.`status`,b.id AS question_id,
            //                          b.quesion,b.answer,b.answer_status,b.user_answer 
            //                           ,c.`option`,c.id AS option_id
            //                           FROM question_type a
            //                           INNER JOIN questions b ON a.id=b.q_type
            //                           LEFT JOIN question_options c ON b.id=c.question_id AND c.q_type_id=a.id AND c.`status`=1
            //                           WHERE a.user_id=$user_id AND a.`status`=1  and a.user_submit_time=0 AND a.`type`='ADD' AND a.duration=5"), 1);
    
            // $section2 = paginateArray(DB::select("SELECT a.id AS main_id,a.`type`,a.duration,a.prac_id,a.user_submit_time,a.`status`,b.id AS question_id,
            //                          b.quesion,b.answer,b.answer_status,b.user_answer 
            //                          ,c.`option`,c.id AS option_id
            //                          FROM question_type a
            //                          INNER JOIN questions b ON a.id=b.q_type
            //                          LEFT JOIN question_options c ON b.id=c.question_id AND c.q_type_id=a.id AND c.`status`=1
            //                          WHERE a.user_id=$user_id AND a.`status`=1  and a.user_submit_time=0 AND a.`type`='ADD' AND a.duration=3"), 1);
    
            // $section3 = paginateArray(DB::select("SELECT a.id AS main_id,a.`type`,a.duration,a.prac_id,a.user_submit_time,a.`status`,b.id AS question_id,
            //                         b.quesion,b.answer,b.answer_status,b.user_answer 
            //                         ,c.`option`,c.id AS option_id
            //                         FROM question_type a
            //                         INNER JOIN questions b ON a.id=b.q_type
            //                         LEFT JOIN question_options c ON b.id=c.question_id AND c.q_type_id=a.id AND c.`status`=1
            //                         WHERE a.user_id=$user_id AND a.`status`=1  and a.user_submit_time=0 AND a.`type`='MUL' AND a.duration=3"), 1);
            
            
                $section1 =  DB::select("SELECT a.id AS main_id,a.`type`,a.duration,a.prac_id,a.user_submit_time,a.`status`,b.id AS question_id,
            b.quesion,b.answer,b.answer_status,b.user_answer 
             ,c.`option`,c.id AS option_id
             FROM question_type a
             INNER JOIN questions b ON a.id=b.q_type
             LEFT JOIN question_options c ON b.id=c.question_id AND c.q_type_id=a.id AND c.`status`=1
             WHERE a.user_id=$user_id AND a.`status`=1 and a.user_submit_time=0 AND a.`type`='ADD' AND a.duration=5");

            $section2 = DB::select("SELECT a.id AS main_id,a.`type`,a.duration,a.prac_id,a.user_submit_time,a.`status`,b.id AS question_id,
b.quesion,b.answer,b.answer_status,b.user_answer 
,c.`option`,c.id AS option_id
FROM question_type a
INNER JOIN questions b ON a.id=b.q_type
LEFT JOIN question_options c ON b.id=c.question_id AND c.q_type_id=a.id AND c.`status`=1
WHERE a.user_id=$user_id AND a.`status`=1 and a.user_submit_time=0 AND a.`type`='ADD' AND a.duration=3");


            $section3 = DB::select("SELECT a.id AS main_id,a.`type`,a.duration,a.prac_id,a.user_submit_time,a.`status`,b.id AS question_id,
b.quesion,b.answer,b.answer_status,b.user_answer 
,c.`option`,c.id AS option_id
FROM question_type a
INNER JOIN questions b ON a.id=b.q_type
LEFT JOIN question_options c ON b.id=c.question_id AND c.q_type_id=a.id AND c.`status`=1
WHERE a.user_id=$user_id AND a.`status`=1 and a.user_submit_time=0 AND a.`type`='MUL' AND a.duration=3");
                                    
             $total_question=DB::select("SELECT COUNT(a.id) AS total_q
            FROM question_type a
            INNER JOIN questions b ON a.id=b.q_type
            LEFT JOIN question_options c ON b.id=c.question_id AND c.q_type_id=a.id AND c.`status`=1
            WHERE a.user_id=$user_id AND a.`status`=1 AND a.user_submit_time=0");
    
            return view('academic.section', compact('section3', 'section2', 'section1', 'pageno','total_question'));     
          
        }
    }

    function dashboard()
    {
        $user_id = Auth::user()->id;

        $practicelist = paginateArray(DB::select("SELECT z.*,(z.total_quest-z.not_attempt) AS total_attempt, ROUND((((z.total_quest-z.not_attempt)*100)/z.total_quest),2) AS att_percentage,
        if(ROUND(((right_answer/(z.total_quest-z.not_attempt))*100),2) IS NOT NULL,ROUND(((right_answer/(z.total_quest-z.not_attempt))*100),2),'NA')  AS accuracy,SUM(z.user_submit_time) AS final_submit
        FROM (
        SELECT a.prac_id,a.`type`,a.duration,a.user_id, COUNT(b.id) AS total_quest, SUM(IF(b.answer=b.user_answer,1,0)) AS right_answer
        , SUM(IF((b.user_answer IS NULL),1,0)) AS not_attempt, 
       (
		  if(b.`type`='ADD',((sum(IF(b.answer=b.user_answer AND b.`type`='ADD',1,0))*2)),0) +
		  if(b.`type`='MUL',((sum(IF(b.answer=b.user_answer AND b.`type`='MUL',1,0))*1)),
		  ((sum(IF(b.answer=b.user_answer AND b.`type`='MUL',1,0))*1))) ) AS total_marks,
        SUM(IF((b.answer != b.user_answer AND b.user_answer IS NOT NULL),1,0)) AS worng_answer,a.user_submit_time,a.updated_at
        FROM question_type a
        INNER JOIN questions b ON a.id=b.q_type
        WHERE a.user_id=$user_id and a.user_submit_time=2 and a.status=2
        GROUP BY a.prac_id) z GROUP BY z.prac_id order by z.prac_id desc"), 10);
        return view('dashboard', compact('practicelist'));
    }
    function section(Request $request)
    {


        return view('academic.section');
    }

    function updatePracticeSession(Request $request)
    {
        $id = $request->id;
        $user_id = Auth::user()->id;
        DB::table('question_type')->where('prac_id', $id)->where('user_id',$user_id)->update(["user_submit_time" => 2, 'status' => 2]);
        echo true;
    }

    function practiseSets(Request $request)
    {
        $user_id = Auth::user()->id;
        $section3 = paginateArray(DB::select("SELECT a.prac_id,a.`type`,a.duration,a.user_id, COUNT(b.id) AS total_quest, SUM(if(b.answer=b.user_answer,1,0)) AS right_answer
        , SUM(if((b.user_answer IS NULL),1,0)) AS not_attempt, SUM(if((b.answer != b.user_answer AND b.user_answer IS NOT NULL),1,0)) AS worng_answer
        FROM question_type a
        INNER JOIN questions b ON a.id=b.q_type
        WHERE a.user_id=$user_id
        GROUP BY a.prac_id"), 1);
    }

    function fetchDataS3(Request $request)
    {
        $pageno = $request->page;
   // echo date("Y-m-d H:i:s");
        $user_id=Auth::user()->id;
        $data = isset($request->data) ? $request->data : null;
        $selectedValue = isset($request->selectedValue) ? $request->selectedValue : null;
      
        if ($selectedValue && $data) {
            $q_details = explode("|", $data);
            $where = array(
                "q_type" => $q_details[0],
                "id" => $q_details[1],
                "user_id" => Auth::user()->id,
            );
          //  DB::table('questions')->where($where)->update(["user_answer" => $selectedValue]);
          dispatch(new SaveAnswer($where,$selectedValue));
            
        }
 //   echo"<br>". date("Y-m-d H:i:s");
        // $section3 = paginateArray(DB::select("SELECT a.id AS main_id,a.`type`,a.duration,a.prac_id,a.user_submit_time,a.`status`,b.id AS question_id,
        // b.quesion,b.answer,b.answer_status,b.user_answer 
        // ,c.`option`,c.id AS option_id
        // FROM question_type a
        // INNER JOIN questions b ON a.id=b.q_type
        // LEFT JOIN question_options c ON b.id=c.question_id AND c.q_type_id=a.id AND c.`status`=1
        // WHERE a.user_id=$user_id AND a.`status`=1  and a.user_submit_time=0 AND a.`type`='MUL' AND a.duration=3"), 1);
     
     
     
        return true; //view('academic.questions_s3', compact('section3', 'pageno','lastpage'))->render();
    }

    function fetchDataS2(Request $request)
    {
        $pageno = $request->page;
         $userid=Auth::user()->id;
        $data = isset($request->data) ? $request->data : null;
        $selectedValue = isset($request->selectedValue) ? $request->selectedValue : null;
      
        if ($selectedValue && $data) {
            $q_details = explode("|", $data);
            $where = array(
                "q_type" => $q_details[0],
                "id" => $q_details[1],
                "user_id" => Auth::user()->id,
            );
             dispatch(new SaveAnswer($where,$selectedValue));
           // DB::table('questions')->where($where)->update(["user_answer" => $selectedValue]);
        }

        // $section2 = paginateArray(DB::select("SELECT a.id AS main_id,a.`type`,a.duration,a.prac_id,a.user_submit_time,a.`status`,b.id AS question_id,
        // b.quesion,b.answer,b.answer_status,b.user_answer 
        // ,c.`option`,c.id AS option_id
        // FROM question_type a
        // INNER JOIN questions b ON a.id=b.q_type
        // LEFT JOIN question_options c ON b.id=c.question_id AND c.q_type_id=a.id AND c.`status`=1
        // WHERE a.user_id=$userid AND a.`status`=1 and a.user_submit_time=0 AND a.`type`='ADD' AND a.duration=3"), 1);
        
        //  $lastpage = $section2->lastPage();
        // $pageno = $section2->currentPage();
        
       return true;
    }

    function fetchData(Request $request)
    {
        $pageno = $request->page;

        $data = isset($request->data) ? $request->data : null;
        $selectedValue = isset($request->selectedValue) ? $request->selectedValue : null;
        if ($selectedValue && $data) {
            $q_details = explode("|", $data);
            // $where = array(
            //     "q_type" => $q_details[0],
            //     "id" => $q_details[1],
            //     "user_id" => Auth::user()->id,
            // );
             $where = array(
                "q_type" => $q_details[0],
                "id" => $q_details[1],
                "user_id" => Auth::user()->id,
            );
            dispatch(new SaveAnswer($where,$selectedValue));
        }
        return 1;
    }

    function startTest(Request $request)
    {
    
        return view('academic.startTest');
    }

    function generateQuestion()
    {   
       // $this->syncFile();

        return redirect('/dashboard')->with([
            'message' => 'You can Start Your Practice.',
        ]);
    }
    
   function syncFile()
    {
        ini_set('memory_limit', '-1');
        $inputFileName = base_path() . "/assets/Magic.xls";
        header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
        header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date in the past
        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
        $spreadsheet = $reader->load($inputFileName);
        $loadedSheetNames = $spreadsheet->getSheetNames();

        $max_prac =  DB::table('question_type')->where('user_id', Auth::user()->id)->max('prac_id');
        $max_prac_id = isset($max_prac) ? ($max_prac) + 1 : 1;

        $disableArray = array(
            "prac_id" => ($max_prac),
            "status" => 1,
        );
        //  print_r($disableArray);exit;
        $update = DB::table('question_type')->where('status','!=',2)->where('user_submit_time','!=',2)
        ->where('user_id', Auth::user()->id)->update(["status" => 0,"user_submit_time" => 0]);

        //exit;
        for ($i = 0; $i < count($loadedSheetNames); $i++) {
            //   echo $loadedSheetNames[$i];  exit;
            $objWorksheet = $spreadsheet->setActiveSheetIndexbyName($loadedSheetNames[$i]);
            $objWorksheet = $spreadsheet->getActiveSheet();

            $lastColumn = $spreadsheet->setActiveSheetIndexbyName($loadedSheetNames[$i])->getHighestColumn();


            $lastColumn++;
            // $i=1;
            $j = 1;

            if (trim($loadedSheetNames[$i]) == "4_MUL_F_1_3") {
                $mul_value = array();
                $lastRow =    $spreadsheet->setActiveSheetIndexbyName($loadedSheetNames[$i])->getHighestRow();
                for ($row = 1; $row <= $lastRow; $row++) {
                    for ($column = 'A'; $column != $lastColumn; $column++) {
                        $row_col_value = $spreadsheet->getActiveSheet()->getCell($column . $row)->getCalculatedValue();
                        if (trim($row_col_value) == "=") {

                            $dt = explode("_", $loadedSheetNames[$i]);
                            $dataArray = array(
                                "level" => $dt[2],
                                "sub_level" => $dt[3],
                                "type" => $dt[1],
                                "prac_id" => $max_prac_id,
                                "user_id" => Auth::user()->id,
                                "duration" => $dt[4]
                            );
                            //echo "<pre>";
                            //print_r($dataArray); //exit;
                            $datawhere = array(
                                "level" => $dt[2],
                                "sub_level" => $dt[3],
                                "type" => $dt[1],
                                "user_id" => Auth::user()->id,
                                "duration" => $dt[4],
                                "status" => 1
                            );
                            $ddatawhere = array(
                                "level" => $dt[2],
                                "sub_level" => $dt[3],
                                "type" => $dt[1],
                                "user_id" => Auth::user()->id,
                                "duration" => $dt[4],
                                "user_submit_time" => 1
                            );
                            $cnt_for_submit = DB::table('question_type')->where($ddatawhere)->get();
                            if (count($cnt_for_submit) > 0) {
                                DB::table('question_type')->where($ddatawhere)->update(["status" => 0]);
                                DB::table('questions')->where(["q_type" => $cnt_for_submit[0]->id])->update(["status" => 0]);
                            }

                            $cnt = DB::table('question_type')->where($datawhere)->get();
                            //  echo count($cnt);exit;
                            if (count($cnt) == 0) {
                                $saveType = DB::table('question_type')->insertGetId($dataArray);
                            } else {
                                $saveType = $cnt[0]->id;
                            }

                            $saveQuesions = array(
                                "q_type" => $saveType,
                                "quesion" => implode(",", $mul_value),
                                "prac_id" => $max_prac_id,
                                "answer" => array_product(array_values(array_diff($mul_value, ["×"]))), //implode(",",$mul_value),
                                "type" => $dt[1],
                                "level" => $dt[2],
                                "user_id" => Auth::user()->id,
                                // "q_type" => $dt[1],
                            );

                            $save_where = array(
                                "q_type" => $saveType,
                                "status" => "1",
                                "prac_id" => $max_prac_id,
                                "answer_status" => "0",
                                "user_id" => Auth::user()->id
                            );
                            $saveqcnt =  DB::table('questions')->where($save_where)->count();

                            // if ($saveqcnt == 0) {
                            $saveq =  DB::table('questions')->insertGetId($saveQuesions);
                            if ($saveq) {
                                $dts = explode(",", implode(",", $mul_value));
                                // print_r($dt);exit;
                                $optionArray = array(
                                    array_product(array_values(array_diff($mul_value, ["×"]))),
                                    (array_product(array_values(array_diff($mul_value, ["×"])))) + (array_sum([$dts[0] + 20, 20])),
                                    (array_product(array_values(array_diff($mul_value, ["×"])))) + (array_sum([$dts[0] + rand($dts[2], 50)])),
                                    array_product(array_values(array_diff($mul_value, ["×"]))) - (array_sum([-$dts[0] + rand(40, $dts[2])])),
                                );
                                shuffle($optionArray);
                                $saveOptions = array(
                                    "question_id" => $saveq,
                                    "q_type_id" => $saveType,
                                    "answer" => array_product(array_values(array_diff($mul_value, ["×"]))),
                                    "option" => implode(",", $optionArray),
                                );

                                $whereoption = array(
                                    "question_id" => $saveq,
                                    "q_type_id" => $saveType,
                                    "answer" => array_sum($mul_value),
                                );
                                $optioncnt = DB::table('question_options')->where($whereoption)->get();
                                if (count($optioncnt) == 0) {
                                    DB::table('question_options')->insertGetId($saveOptions);
                                } else {
                                    $whereoptiondesable = array(
                                        "question_id" => $saveq,
                                        "q_type_id" => $saveType,
                                    );
                                    DB::table('question_options')->where($whereoptiondesable)->update(["status" => 2]);
                                }
                            }
                            //  }
                            $mul_value = array();
                        } else {
                            array_push($mul_value, $row_col_value);
                        }
                    }
                }
            }
            if(trim($loadedSheetNames[$i]) == "4_ADD_F_2_3"){

                $rowval = array();
                for ($column = 'A'; $column != $lastColumn; $column++) {
                    $lastRow =    $spreadsheet->setActiveSheetIndexbyName($loadedSheetNames[$i])->getHighestRow();
                    for ($row = 1; $row <= $lastRow; $row++) {
                        $row_col_value = $spreadsheet->getActiveSheet()->getCell($column . $row)->getCalculatedValue(); //column A
                        if ($row_col_value == "#") {
                            $dt = explode("_", $loadedSheetNames[$i]);

                            $dataArray = array(
                                "level" => $dt[2],
                                "sub_level" => $dt[3],
                                "type" => $dt[1],
                                "prac_id" => $max_prac_id,
                                "user_id" => Auth::user()->id,
                                "duration" => $dt[4]
                            );
                            $datawhere = array(
                                "level" => $dt[2],
                                "sub_level" => $dt[3],
                                "type" => $dt[1],
                                "user_id" => Auth::user()->id,
                                "duration" => $dt[4],
                                "status" => 1
                            );

                            $ddatawhere = array(
                                "level" => $dt[2],
                                "sub_level" => $dt[3],
                                "type" => $dt[1],
                                "user_id" => Auth::user()->id,
                                "duration" => $dt[4],
                                "user_submit_time" => 1
                            );
                            $cnt_for_submit = DB::table('question_type')->where($ddatawhere)->get();
                            if (count($cnt_for_submit) > 0) {
                                DB::table('question_type')->where($ddatawhere)->update(["status" => 2]);
                                DB::table('questions')->where(["q_type" => $cnt_for_submit[0]->id])->update(["status" => 2]);
                            }

                            $cnt = DB::table('question_type')->where($datawhere)->get();
                            if (count($cnt) == 0) {
                                $saveType = DB::table('question_type')->insertGetId($dataArray);
                            } else {
                                $saveType = $cnt[0]->id;
                            }


                            $saveQuesions = array(
                                "q_type" => $saveType,
                                "prac_id" => $max_prac_id,
                                "quesion" => implode(",", $rowval),
                                "answer" => array_sum($rowval),
                                "type" => $dt[1],
                                "level" => $dt[2],
                                "user_id" => Auth::user()->id,

                            );

                            $save_where = array(
                                "q_type" => $saveType,
                                "status" => "1",
                                "prac_id" => $max_prac_id,
                                "answer_status" => "0",
                                "user_id" => Auth::user()->id
                            );
                          //  $saveqcnt =  DB::table('questions')->where($save_where)->count();
                        //    if ($saveqcnt == 0) {
                                $saveq =  DB::table('questions')->insertGetId($saveQuesions);
                                if ($saveq) {

                                    $optionArray = array(
                                        array_sum($rowval),
                                        rand(array_sum($rowval), (array_sum($rowval) + rand(pow(10, 2 - 1), pow(10, 2) - 1))),
                                        rand(array_sum($rowval), (array_sum($rowval) + rand((rand(pow(10, 2 - 1), pow(10, 2) - 1)), 30))),
                                        rand(array_sum($rowval), (array_sum($rowval) + rand((rand(pow(10, 2 - 1), pow(10, 2) - 1)), 50))),
                                    );

                                    $array1_keys = array_keys($optionArray); // all keys
                                    $unique_keys = array_keys(array_unique($optionArray)); // keys of unique values

                                    $duplicate = array_diff($array1_keys, $unique_keys); // keys of the duplicate values
                                    foreach ($duplicate as $key => $value) {
                                        $optionArray[$key] = $value + (rand(1, 20));
                                    }


                                    shuffle($optionArray);
                                    $saveOptions = array(
                                        "question_id" => $saveq,
                                        "q_type_id" => $saveType,
                                        "answer" => array_sum($rowval),
                                        "option" => implode(",", $optionArray),
                                    );

                                    $whereoption = array(
                                        "question_id" => $saveq,
                                        "q_type_id" => $saveType,
                                        "answer" => array_sum($rowval),
                                    );
                                    $optioncnt = DB::table('question_options')->where($whereoption)->get();
                                    if (count($optioncnt) == 0) {
                                        DB::table('question_options')->insertGetId($saveOptions);
                                    } else {
                                        $whereoptiondesable = array(
                                            "question_id" => $saveq,
                                            "q_type_id" => $saveType,
                                        );
                                        DB::table('question_options')->where($whereoptiondesable)->update(["status" => 2]);
                                    }
                                }
                           // }
                            $rowval = array();
                        } else {
                            array_push($rowval, $row_col_value);
                        }
                    }
                }
            } else {
                // echo $loadedSheetNames[$i];
            }

            if (trim($loadedSheetNames[$i]) == "4_ADD_F_1_5") {
                $rowval = array();
                for ($column = 'A'; $column != $lastColumn; $column++) {
                    $lastRow =    $spreadsheet->setActiveSheetIndexbyName($loadedSheetNames[$i])->getHighestRow();
                    for ($row = 1; $row <= $lastRow; $row++) {
                         $row_col_value = $spreadsheet->getActiveSheet()->getCell($column . $row)->getValue();
                        $row_col_value = $spreadsheet->getActiveSheet()->getCell($column . $row)->getCalculatedValue(); //column A
                        if ($row_col_value == "#") {
                            $dt = explode("_", $loadedSheetNames[$i]);

                            $dataArray = array(
                                "level" => $dt[2],
                                "sub_level" => $dt[3],
                                "type" => $dt[1],
                                "prac_id" => $max_prac_id,
                                "user_id" => Auth::user()->id,
                                "duration" => $dt[4]
                            );
                            $datawhere = array(
                                "level" => $dt[2],
                                "sub_level" => $dt[3],
                                "type" => $dt[1],
                                "user_id" => Auth::user()->id,
                                "duration" => $dt[4],
                                "status" => 1
                            );

                            $ddatawhere = array(
                                "level" => $dt[2],
                                "sub_level" => $dt[3],
                                "type" => $dt[1],
                                "user_id" => Auth::user()->id,
                                "duration" => $dt[4],
                                "user_submit_time" => 1
                            );
                            $cnt_for_submit = DB::table('question_type')->where($ddatawhere)->get();
                            if (count($cnt_for_submit) > 0) {
                                DB::table('question_type')->where($ddatawhere)->update(["status" => 2]);
                                DB::table('questions')->where(["q_type" => $cnt_for_submit[0]->id])->update(["status" => 2]);
                            }

                            $cnt = DB::table('question_type')->where($datawhere)->get();
                            if (count($cnt) == 0) {
                                $saveType = DB::table('question_type')->insertGetId($dataArray);
                            } else {
                                $saveType = $cnt[0]->id;
                            }


                            $saveQuesions = array(
                                "q_type" => $saveType,
                                "prac_id" => $max_prac_id,
                                "quesion" => implode(",", $rowval),
                                "answer" => array_sum($rowval),
                                "type" => $dt[1],
                                "level" => $dt[2],
                                "user_id" => Auth::user()->id,

                            );

                            // $save_where = array(
                            //     "q_type" => $saveType,
                            //     "status" => "1",
                            //     "prac_id" => $max_prac_id,
                            //     "answer_status" => "0",
                            //     "user_id" => Auth::user()->id
                            // );
                         //   $saveqcnt =  DB::table('questions')->where($save_where)->count();
                            // if ($saveqcnt == 0) {
                                $saveq =  DB::table('questions')->insertGetId($saveQuesions);
                                if ($saveq) {

                                    $optionArray = array(
                                        array_sum($rowval),
                                        rand(array_sum($rowval), (array_sum($rowval) + rand(pow(10, 2 - 1), pow(10, 2) - 1))),
                                        rand(array_sum($rowval), (array_sum($rowval) + rand((rand(pow(10, 2 - 1), pow(10, 2) - 1)), 30))),
                                        rand(array_sum($rowval), (array_sum($rowval) + rand((rand(pow(10, 2 - 1), pow(10, 2) - 1)), 50))),
                                    );

                                    $array1_keys = array_keys($optionArray); // all keys
                                    $unique_keys = array_keys(array_unique($optionArray)); // keys of unique values

                                    $duplicate = array_diff($array1_keys, $unique_keys); // keys of the duplicate values
                                    foreach ($duplicate as $key => $value) {
                                        $optionArray[$key] = $value + (rand(1, 20));
                                    }


                                    shuffle($optionArray);
                                    $saveOptions = array(
                                        "question_id" => $saveq,
                                        "q_type_id" => $saveType,
                                        "answer" => array_sum($rowval),
                                        "option" => implode(",", $optionArray),
                                    );

                                    $whereoption = array(
                                        "question_id" => $saveq,
                                        "q_type_id" => $saveType,
                                        "answer" => array_sum($rowval),
                                    );
                                    $optioncnt = DB::table('question_options')->where($whereoption)->get();
                                    if (count($optioncnt) == 0) {
                                        DB::table('question_options')->insertGetId($saveOptions);
                                    } else {
                                        $whereoptiondesable = array(
                                            "question_id" => $saveq,
                                            "q_type_id" => $saveType,
                                        );
                                        DB::table('question_options')->where($whereoptiondesable)->update(["status" => 2]);
                                    }
                                }
                           // }
                           
                            $rowval = array();
                        } else {
                            array_push($rowval, $row_col_value);
                        }
                    }
                }
            } else {
                // echo $loadedSheetNames[$i];
            }
        }

        return true;
    }
    
    //  function syncFile()
    // {
    //     ini_set('memory_limit', '-1');
    //     header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
    //     header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date in the past
    //     $inputFileName = base_path() . "/assets/Magic.xls";
    //     $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
    //     $spreadsheet = $reader->load($inputFileName);
    //     $loadedSheetNames = $spreadsheet->getSheetNames();

    //     $max_prac =  DB::table('question_type')->where('user_id', Auth::user()->id)->max('prac_id');
    //     $max_prac_id = isset($max_prac) ? ($max_prac) + 1 : 1;

    //     $disableArray = array(
    //         "prac_id" => ($max_prac),
    //         "status" => 1,
    //     );
    //     //  print_r($disableArray);exit;
    //       $update = DB::table('question_type')->where('status','!=',2)->where('user_submit_time','!=',2)
    //     ->where('user_id', Auth::user()->id)->update(["status" => 0,"user_submit_time" => 0]);

    //     //exit;
    //     for ($i = 0; $i < count($loadedSheetNames); $i++) {
    //         //   echo $loadedSheetNames[$i];  exit;
    //         $objWorksheet = $spreadsheet->setActiveSheetIndexbyName($loadedSheetNames[$i]);
    //         $objWorksheet = $spreadsheet->getActiveSheet();

    //         $lastColumn = $spreadsheet->setActiveSheetIndexbyName($loadedSheetNames[$i])->getHighestColumn();


    //         $lastColumn++;
    //         // $i=1;
    //         $j = 1;

    //         if (trim($loadedSheetNames[$i]) == "4_MUL_F_1_3") {
    //             $mul_value = array();
    //             $lastRow =    $spreadsheet->setActiveSheetIndexbyName($loadedSheetNames[$i])->getHighestRow();
    //             for ($row = 2; $row <= $lastRow; $row++) {
    //                 for ($column = 'A'; $column != $lastColumn; $column++) {
    //                     $row_col_value = $spreadsheet->getActiveSheet()->getCell($column . $row)->getCalculatedValue();
    //                     if (trim($row_col_value) == "=") {

    //                         $dt = explode("_", $loadedSheetNames[$i]);
    //                         $dataArray = array(
    //                             "level" => $dt[2],
    //                             "sub_level" => $dt[0],
    //                             "type" => $dt[1],
    //                             "prac_id" => $max_prac_id,
    //                             "user_id" => Auth::user()->id,
    //                             "duration" => $dt[4]
    //                         );
    //                         //echo "<pre>";
    //                         //print_r($dataArray); //exit;
    //                         $datawhere = array(
    //                             "level" => $dt[2],
    //                             "sub_level" => $dt[0],
    //                             "type" => $dt[1],
    //                             "user_id" => Auth::user()->id,
    //                             "duration" => $dt[4],
    //                             "status" => 1
    //                         );
    //                         $ddatawhere = array(
    //                             "level" => $dt[2],
    //                             "sub_level" => $dt[0],
    //                             "type" => $dt[1],
    //                             "user_id" => Auth::user()->id,
    //                             "duration" => $dt[4],
    //                             "user_submit_time" => 1
    //                         );
    //                         $cnt_for_submit = DB::table('question_type')->where($ddatawhere)->get();
    //                         if (count($cnt_for_submit) > 0) {
    //                             DB::table('question_type')->where($ddatawhere)->update(["status" => 0]);
    //                             DB::table('questions')->where(["q_type" => $cnt_for_submit[0]->id])->update(["status" => 0]);
    //                         }

    //                         $cnt = DB::table('question_type')->where($datawhere)->get();
    //                         //  echo count($cnt);exit;
    //                         if (count($cnt) == 0) {
    //                             $saveType = DB::table('question_type')->insertGetId($dataArray);
    //                         } else {
    //                             $saveType = $cnt[0]->id;
    //                         }

    //                         $saveQuesions = array(
    //                             "q_type" => $saveType,
    //                             "quesion" => implode(",", $mul_value),
    //                             "prac_id" => $max_prac_id,
    //                             "answer" => array_product(array_values(array_diff($mul_value, ["×"]))), //implode(",",$mul_value),
    //                             "type" => $dt[1],
    //                             "level" => $dt[2],
    //                             "user_id" => Auth::user()->id,
    //                             // "q_type" => $dt[1],
    //                         );

    //                         $save_where = array(
    //                             "q_type" => $saveType,
    //                             "status" => "1",
    //                             "prac_id" => $max_prac_id,
    //                             "answer_status" => "0",
    //                             "user_id" => Auth::user()->id
    //                         );
    //                         $saveqcnt =  DB::table('questions')->where($save_where)->count();

    //                         // if ($saveqcnt == 0) {
    //                         $saveq =  DB::table('questions')->insertGetId($saveQuesions);
    //                         if ($saveq) {
    //                             $dts = explode(",", implode(",", $mul_value));
    //                             // print_r($dt);exit;
    //                             $optionArray = array(
    //                                 array_product(array_values(array_diff($mul_value, ["×"]))),
    //                                 (array_product(array_values(array_diff($mul_value, ["×"])))) + (array_sum([$dts[0] + 20, 20])),
    //                                 (array_product(array_values(array_diff($mul_value, ["×"])))) + (array_sum([$dts[0] + rand($dts[2], 50)])),
    //                                 array_product(array_values(array_diff($mul_value, ["×"]))) - (array_sum([-$dts[0] + rand(40, $dts[2])])),
    //                             );
    //                             shuffle($optionArray);
    //                             $saveOptions = array(
    //                                 "question_id" => $saveq,
    //                                 "q_type_id" => $saveType,
    //                                 "answer" => array_product(array_values(array_diff($mul_value, ["×"]))),
    //                                 "option" => implode(",", $optionArray),
    //                             );

    //                             $whereoption = array(
    //                                 "question_id" => $saveq,
    //                                 "q_type_id" => $saveType,
    //                                 "answer" => array_sum($mul_value),
    //                             );
    //                             $optioncnt = DB::table('question_options')->where($whereoption)->get();
    //                             if (count($optioncnt) == 0) {
    //                                 DB::table('question_options')->insertGetId($saveOptions);
    //                             } else {
    //                                 $whereoptiondesable = array(
    //                                     "question_id" => $saveq,
    //                                     "q_type_id" => $saveType,
    //                                 );
    //                                 DB::table('question_options')->where($whereoptiondesable)->update(["status" => 2]);
    //                             }
    //                         }
    //                         //  }
    //                         $mul_value = array();
    //                     } else {
    //                         array_push($mul_value, $row_col_value);
    //                     }
    //                 }
    //             }
    //         }

    //         if (trim($loadedSheetNames[$i]) == "4_ADD_F_1_5" || trim($loadedSheetNames[$i]) == "4_ADD_F_2_3") {
    //             $rowval = array();
    //             for ($column = 'A'; $column != $lastColumn; $column++) {
    //                 $lastRow =    $spreadsheet->setActiveSheetIndexbyName($loadedSheetNames[$i])->getHighestRow();
    //                 for ($row = 2; $row <= $lastRow; $row++) {
    //                 //   echo $row_col_values = $spreadsheet->getActiveSheet()->getCell($column . $row)->getValue();
    //                     $row_col_value = $spreadsheet->getActiveSheet()->getCell($column . $row)->getCalculatedValue();// exit;//column A
    //                     if ($row_col_value == "#") {
    //                         $dt = explode("_", $loadedSheetNames[$i]);

    //                         $dataArray = array(
    //                             "level" => $dt[2],
    //                             "sub_level" => $dt[0],
    //                             "type" => $dt[1],
    //                             "prac_id" => $max_prac_id,
    //                             "user_id" => Auth::user()->id,
    //                             "duration" => $dt[4]
    //                         );
    //                         $datawhere = array(
    //                             "level" => $dt[2],
    //                             "sub_level" => $dt[0],
    //                             "type" => $dt[1],
    //                             "user_id" => Auth::user()->id,
    //                             "duration" => $dt[4],
    //                             "status" => 1
    //                         );

    //                         $ddatawhere = array(
    //                             "level" => $dt[2],
    //                             "sub_level" => $dt[0],
    //                             "type" => $dt[1],
    //                             "user_id" => Auth::user()->id,
    //                             "duration" => $dt[4],
    //                             "user_submit_time" => 1
    //                         );
    //                         $cnt_for_submit = DB::table('question_type')->where($ddatawhere)->get();
    //                         if (count($cnt_for_submit) > 0) {
    //                             DB::table('question_type')->where($ddatawhere)->update(["status" => 2]);
    //                             DB::table('questions')->where(["q_type" => $cnt_for_submit[0]->id])->update(["status" => 2]);
    //                         }

    //                         $cnt = DB::table('question_type')->where($datawhere)->get();
    //                         if (count($cnt) == 0) {
    //                             $saveType = DB::table('question_type')->insertGetId($dataArray);
    //                         } else {
    //                             $saveType = $cnt[0]->id;
    //                         }


    //                         $saveQuesions = array(
    //                             "q_type" => $saveType,
    //                             "prac_id" => $max_prac_id,
    //                             "quesion" => implode(",", $rowval),
    //                             "answer" => array_sum($rowval),
    //                             "type" => $dt[1],
    //                             "level" => $dt[2],
    //                             "user_id" => Auth::user()->id,

    //                         );

    //                         $save_where = array(
    //                             "q_type" => $saveType,
    //                             "status" => "1",
    //                             "prac_id" => $max_prac,
    //                             "answer_status" => "0",
    //                             "user_id" => Auth::user()->id
    //                         );
    //                         $saveqcnt =  DB::table('questions')->where($save_where)->count();
    //                         if($saveqcnt==0){
    //                         $saveq =  DB::table('questions')->insertGetId($saveQuesions);
    //                         if ($saveq) {

    //                             $optionArray = array(
    //                                 array_sum($rowval),
    //                                 rand(array_sum($rowval), (array_sum($rowval) + rand(pow(10, 2 - 1), pow(10, 2) - 1))),
    //                                 rand(array_sum($rowval), (array_sum($rowval) + rand((rand(pow(10, 2 - 1), pow(10, 2) - 1)), 30))),
    //                                 rand(array_sum($rowval), (array_sum($rowval) + rand((rand(pow(10, 2 - 1), pow(10, 2) - 1)), 50))),
    //                             );
                                
    //                             $array1_keys = array_keys($optionArray); // all keys
    //                             $unique_keys = array_keys(array_unique($optionArray)); // keys of unique values
                                
    //                             $duplicate = array_diff($array1_keys, $unique_keys); // keys of the duplicate values
    //                             foreach($duplicate as $key=>$value){
    //                               $optionArray[$key]=$value+(rand(1,20));
    //                             }
                                
                                
    //                             shuffle($optionArray);
    //                             $saveOptions = array(
    //                                 "question_id" => $saveq,
    //                                 "q_type_id" => $saveType,
    //                                 "answer" => array_sum($rowval),
    //                                 "option" => implode(",", $optionArray),
    //                             );

    //                             $whereoption = array(
    //                                 "question_id" => $saveq,
    //                                 "q_type_id" => $saveType,
    //                                 "answer" => array_sum($rowval),
    //                             );
    //                             $optioncnt = DB::table('question_options')->where($whereoption)->get();
    //                             if (count($optioncnt) == 0) {
    //                                 DB::table('question_options')->insertGetId($saveOptions);
    //                             } else {
    //                                 $whereoptiondesable = array(
    //                                     "question_id" => $saveq,
    //                                     "q_type_id" => $saveType,
    //                                 );
    //                                 DB::table('question_options')->where($whereoptiondesable)->update(["status" => 2]);
    //                             }
    //                         }
    //                     }
    //                  //   exit;
    //                         $rowval = array();
    //                     } else {
    //                         array_push($rowval, $row_col_value);
    //                     }
    //                 }
    //             }
    //         } else {
    //           // echo $loadedSheetNames[$i];
    //         }
    //     }

    //     return true;
    // }

    // function syncFile()
    // {
    //   //  echo base_path()."/assets/Magic.xls";exit;
    //     ini_set('memory_limit', '-1');
    //     $inputFileName = base_path() . "/assets/Magic.xls";
    //     $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
    //     $spreadsheet = $reader->load($inputFileName);
    //     $loadedSheetNames = $spreadsheet->getSheetNames();

    //     $max_prac =  DB::table('question_type')->where('user_id', Auth::user()->id)->max('prac_id');
    //     $max_prac_id = isset($max_prac) ? ($max_prac) + 1 : 1;
    //  //   $session_id = $_COOKIE["laravel_session"];
    //     $disableArray = array(
    //         "prac_id" => ($max_prac_id - 1),
    //         "status" => 1,
    //     );
    //     $update = DB::table('question_type')->where($disableArray)->update(["status" => 0]);

    //     //exit;
    //     for ($i = 0; $i < count($loadedSheetNames); $i++) {
    //         //   echo $loadedSheetNames[$i];  exit;
    //         $objWorksheet = $spreadsheet->setActiveSheetIndexbyName($loadedSheetNames[$i]);
    //         $objWorksheet = $spreadsheet->getActiveSheet();

    //         $lastColumn = $spreadsheet->setActiveSheetIndexbyName($loadedSheetNames[$i])->getHighestColumn();


    //         $lastColumn++;
    //         // $i=1;
    //         $j = 1;

    //         if (trim($loadedSheetNames[$i]) == "4_MUL_F_1_3") {
    //             $mul_value = array();
    //             $lastRow =    $spreadsheet->setActiveSheetIndexbyName($loadedSheetNames[$i])->getHighestRow();
    //             for ($row = 2; $row <= $lastRow; $row++) {
    //                 for ($column = 'A'; $column != $lastColumn; $column++) {
    //                     $row_col_value = $spreadsheet->getActiveSheet()->getCell($column . $row)->getCalculatedValue();
    //                     if (trim($row_col_value) == "=") {

    //                         $dt = explode("_", $loadedSheetNames[$i]);
    //                         $dataArray = array(
    //                             "level" => $dt[2],
    //                             "sub_level" => $dt[0],
    //                             "type" => $dt[1],
    //                             "prac_id" => $max_prac_id,
    //                           //  "session_id" => $session_id,
    //                             "user_id" => Auth::user()->id,
    //                             "duration" => $dt[4]
    //                         );
    //                         //echo "<pre>";
    //                         //print_r($dataArray); //exit;
    //                         $datawhere = array(
    //                             "level" => $dt[2],
    //                             "sub_level" => $dt[0],
    //                             "type" => $dt[1],
    //                             "user_id" => Auth::user()->id,
    //                             "duration" => $dt[4],
    //                             "status" => 1
    //                         );
    //                         $ddatawhere = array(
    //                             "level" => $dt[2],
    //                             "sub_level" => $dt[0],
    //                             "type" => $dt[1],
    //                             "user_id" => Auth::user()->id,
    //                             "duration" => $dt[4],
    //                             "user_submit_time" => 1
    //                         );
    //                         $cnt_for_submit = DB::table('question_type')->where($ddatawhere)->get();
    //                         if (count($cnt_for_submit) > 0) {
    //                             DB::table('question_type')->where($ddatawhere)->update(["status" => 2]);
    //                             DB::table('questions')->where(["q_type" => $cnt_for_submit[0]->id])->update(["status" => 2]);
    //                         }

    //                         $cnt = DB::table('question_type')->where($datawhere)->get();
    //                         //  echo count($cnt);exit;
    //                         if (count($cnt) == 0) {
    //                             $saveType = DB::table('question_type')->insertGetId($dataArray);
    //                         } else {
    //                             $saveType = $cnt[0]->id;
    //                         }

    //                         $saveQuesions = array(
    //                             "q_type" => $saveType,
    //                             "quesion" => implode(",", $mul_value),
    //                             "prac_id" => $max_prac_id,
    //                             "answer" => array_product(array_values(array_diff($mul_value, ["×"]))), //implode(",",$mul_value),
    //                             "type" => $dt[1],
    //                             "level" => $dt[2],
    //                             "user_id" => Auth::user()->id,
    //                             // "q_type" => $dt[1],
    //                         );

    //                         $save_where = array(
    //                             "q_type" => $saveType,
    //                             "status" => "1",
    //                             "prac_id" => $max_prac_id,
    //                             "answer_status" => "0",
    //                             "user_id" => Auth::user()->id
    //                         );
    //                         $saveqcnt =  DB::table('questions')->where($save_where)->count();

    //                         // if ($saveqcnt == 0) {
    //                         $saveq =  DB::table('questions')->insertGetId($saveQuesions);
    //                         if ($saveq) {
    //                             $dts = explode(",", implode(",", $mul_value));
    //                             // print_r($dt);exit;
    //                             $optionArray = array(
    //                                 array_product(array_values(array_diff($mul_value, ["×"]))),
    //                                 (array_product(array_values(array_diff($mul_value, ["×"])))) + (array_sum([$dts[0] + 20, 20])),
    //                                 (array_product(array_values(array_diff($mul_value, ["×"])))) + (array_sum([$dts[0] + rand($dts[2], 50)])),
    //                                 array_product(array_values(array_diff($mul_value, ["×"]))) - (array_sum([-$dts[0] + rand(40, $dts[2])])),
    //                             );
    //                             shuffle($optionArray);
    //                             $saveOptions = array(
    //                                 "question_id" => $saveq,
    //                                 "q_type_id" => $saveType,
    //                                 "answer" => array_product(array_values(array_diff($mul_value, ["×"]))),
    //                                 "option" => implode(",", $optionArray),
    //                             );

    //                             $whereoption = array(
    //                                 "question_id" => $saveq,
    //                                 "q_type_id" => $saveType,
    //                                 "answer" => array_sum($mul_value),
    //                             );
    //                             $optioncnt = DB::table('question_options')->where($whereoption)->get();
    //                             if (count($optioncnt) == 0) {
    //                                 DB::table('question_options')->insertGetId($saveOptions);
    //                             } else {
    //                                 $whereoptiondesable = array(
    //                                     "question_id" => $saveq,
    //                                     "q_type_id" => $saveType,
    //                                 );
    //                                 DB::table('question_options')->where($whereoptiondesable)->update(["status" => 2]);
    //                             }
    //                         }
    //                         //  }
    //                         $mul_value = array();
    //                     } else {
    //                         array_push($mul_value, $row_col_value);
    //                     }
    //                 }
    //             }
    //         }

    //         if (trim($loadedSheetNames[$i]) == "4_ADD_F_1_5" || trim($loadedSheetNames[$i]) == "4_ADD_F_2_3") {
    //             $rowval = array();
    //             for ($column = 'A'; $column != $lastColumn; $column++) {
    //                 $lastRow =    $spreadsheet->setActiveSheetIndexbyName($loadedSheetNames[$i])->getHighestRow();
    //                 for ($row = 2; $row <= $lastRow; $row++) {
    //                     $row_col_value = $spreadsheet->getActiveSheet()->getCell($column . $row)->getCalculatedValue(); //column A
    //                     if ($row_col_value == "#") {
    //                         $dt = explode("_", $loadedSheetNames[$i]);

    //                         $dataArray = array(
    //                             "level" => $dt[2],
    //                             "sub_level" => $dt[0],
    //                             "type" => $dt[1],
    //                             "prac_id" => $max_prac_id,
    //                          //   "session_id" => $session_id,
    //                             "user_id" => Auth::user()->id,
    //                             "duration" => $dt[4]
    //                         );
    //                       //  echo "<pre>";print_r($dataArray);exit;
    //                         $datawhere = array(
    //                             "level" => $dt[2],
    //                             "sub_level" => $dt[0],
    //                             "type" => $dt[1],
    //                             "user_id" => Auth::user()->id,
    //                             "duration" => $dt[4],
    //                             "status" => 1
    //                         );

    //                         $ddatawhere = array(
    //                             "level" => $dt[2],
    //                             "sub_level" => $dt[0],
    //                             "type" => $dt[1],
    //                             "user_id" => Auth::user()->id,
    //                             "duration" => $dt[4],
    //                             "user_submit_time" => 1
    //                         );
    //                         $cnt_for_submit = DB::table('question_type')->where($ddatawhere)->get();
    //                         if (count($cnt_for_submit) > 0) {
    //                             DB::table('question_type')->where($ddatawhere)->update(["status" => 2]);
    //                             DB::table('questions')->where(["q_type" => $cnt_for_submit[0]->id])->update(["status" => 2]);
    //                         }

    //                         $cnt = DB::table('question_type')->where($datawhere)->get();
    //                         if (count($cnt) == 0) {
    //                             $saveType = DB::table('question_type')->insertGetId($dataArray);
    //                         } else {
    //                             $saveType = $cnt[0]->id;
    //                         }


    //                         $saveQuesions = array(
    //                             "q_type" => $saveType,
    //                             "prac_id" => $max_prac_id,
    //                             "quesion" => implode(",", $rowval),
    //                             "answer" => array_sum($rowval),
    //                             "type" => $dt[1],
    //                             "level" => $dt[2],
    //                             "user_id" => Auth::user()->id,

    //                         );

    //                         $save_where = array(
    //                             "q_type" => $saveType,
    //                             "status" => "1",
    //                             "answer_status" => "0",
    //                             "user_id" => Auth::user()->id
    //                         );
    //                         $saveqcnt =  DB::table('questions')->where($save_where)->count();

    //                         $saveq =  DB::table('questions')->insertGetId($saveQuesions);
    //                         if ($saveq) {

    //                             $optionArray = array(
    //                                 array_sum($rowval),
    //                                 rand(array_sum($rowval), (array_sum($rowval) + rand(pow(10, 2 - 1), pow(10, 2) - 1))),
    //                                 rand(array_sum($rowval), (array_sum($rowval) + rand((rand(pow(10, 2 - 1), pow(10, 2) - 1)), 50))),
    //                                 rand(array_sum($rowval), (array_sum($rowval) + rand((rand(pow(10, 2 - 1), pow(10, 2) - 1)), 50))),
    //                             );
    //                             shuffle($optionArray);
    //                             $saveOptions = array(
    //                                 "question_id" => $saveq,
    //                                 "q_type_id" => $saveType,
    //                                 "answer" => array_sum($rowval),
    //                                 "option" => implode(",", $optionArray),
    //                             );

    //                             $whereoption = array(
    //                                 "question_id" => $saveq,
    //                                 "q_type_id" => $saveType,
    //                                 "answer" => array_sum($rowval),
    //                             );
    //                             $optioncnt = DB::table('question_options')->where($whereoption)->get();
    //                             if (count($optioncnt) == 0) {
    //                                 DB::table('question_options')->insertGetId($saveOptions);
    //                             } else {
    //                                 $whereoptiondesable = array(
    //                                     "question_id" => $saveq,
    //                                     "q_type_id" => $saveType,
    //                                 );
    //                                 DB::table('question_options')->where($whereoptiondesable)->update(["status" => 2]);
    //                             }
    //                         }

    //                         $rowval = array();
    //                     } else {
    //                         array_push($rowval, $row_col_value);
    //                     }
    //                 }
    //             }
    //         } else {
    //             echo $loadedSheetNames[$i];
    //         }
    //     }

    //     return true;
    // }
}

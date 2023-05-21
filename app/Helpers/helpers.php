<?php

use App\Models\AppConfig;
use App\Models\CreateSchool;
use App\Models\TheamSetting;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;

function app_config($value = '',$branchcode='')
{
    $conf = AppConfig::where('setting','=',$value)->where('branch_code','=',$branchcode)->first();
    return $conf->value;
}
function school_details($id='',$column)
{
      $conf = CreateSchool::where('id','=',$id)->first([$column]);     
      return $conf->$column ?? '';
}

function TheamSetting($id='',$column)
{
      $conf = TheamSetting::where('school_id','=',$id)->first([$column]);
          
      return isset($conf->$column) ? $conf->$column :null;
}

function sendSMS($Mobile_No, $smsText)
    {

        $msg="";
        $mobno = filter_var($Mobile_No,FILTER_SANITIZE_STRING);

        $msg = $smsText;
        $baseurl = "http://msg.smscluster.com/rest/services/sendSMS/sendGroupSms?AUTH_KEY=9044463e6b29e6282dbce1b6b820fdc2&message=$msg&senderId=METASC&routeId=1&mobileNos=$mobno&smsContentType=english";

        $curl_handle=curl_init();
        curl_setopt($curl_handle,CURLOPT_URL,$baseurl);
        curl_setopt($curl_handle,CURLOPT_CONNECTTIMEOUT,2);
        curl_setopt($curl_handle,CURLOPT_RETURNTRANSFER,1);
        $buffer = curl_exec($curl_handle);
        curl_close($curl_handle);
        if (empty($buffer)){
            return $baseurl;
        }
        else{
            return $baseurl;
        }
}

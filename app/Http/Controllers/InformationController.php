<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InformationController extends Controller
{
    public function showLiveStatus($dt,$tno)
    {
        $ch = curl_init();

        $apikey = "e8e32ac506ec8121ce378495fc8435de";
        $dt = explode('-',$dt);
        $dt = implode('',$dt);
        // $date   = "20210207";
        // $trainNumber = "02302" ;
        $date = $dt ;
        $trainNumber = $tno;
        $url = "https://indianrailapi.com/api/v2/livetrainstatus/apikey/";
        $url .= $apikey."/";
        $url .= "trainnumber/"; 
        $url .= $trainNumber."/";
        $url .= "date/";
        $url .= $date."/";
        // dd($url);
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET"); 
       

        // In real life you should use something like:
        // curl_setopt($ch, CURLOPT_POSTFIELDS, 
        //          http_build_query(array('postvar1' => 'value1')));

        // Receive server response ...
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $server_output = curl_exec($ch);

        curl_close ($ch);

        // dd($server_output);
        $server_output_arr = json_decode($server_output,1);
        // dd($server_output_arr['TrainRoute']);
        // Further processing ...
        return $server_output;
        
    }

    public function showSeatAvailability(Request $request)
    {
        $ch = curl_init();

        $apikey = "e8e32ac506ec8121ce378495fc8435de";
        // $date   = "20210207";
        // $trainNumber = "02302" ;
        $info = $request->all();
        // dd($info);
        $dt = $info['date'];
        $dt = explode('-',$dt);
        $dt = implode('',$dt);
        $date = $dt ;
        
        $trainNumber = $info['tno'];
        $stationFrom = $info['from'];
        $stationTo   = $info['to'];
        $classCode   = $info['class'];

        $url = "https://indianrailapi.com/api/v2/SeatAvailability/apikey/";
        $url .= $apikey."/";
        $url .= "trainnumber/"; 
        $url .= $trainNumber."/";
        $url .= "from/"; 
        $url .= $stationFrom."/";
        $url .= "to/"; 
        $url .= $stationTo."/";
        $url .= "date/";
        $url .= $date."/";
        $url .= "Quota/GN/Class/";
        $url .= $classCode;
        // dd($url);
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET"); 
       

        // In real life you should use something like:
        // curl_setopt($ch, CURLOPT_POSTFIELDS, 
        //          http_build_query(array('postvar1' => 'value1')));

        // Receive server response ...
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $server_output = curl_exec($ch);

        curl_close ($ch);

        // dd($server_output);
        $server_output_arr = json_decode($server_output,1);
        // dd($server_output_arr);
        return $server_output;
        // Further processing ...
        
    }

    public function showTrainFare(Request $request)
    {
        // dd($request->all());
        $info = $request->all();
        $ch = curl_init();

        $apikey = "e8e32ac506ec8121ce378495fc8435de";
        $trainNumber =  $info['tno'];
        $stationFrom = $info['from'];
        $stationTo   = $info['to'];
        $classCode   = $info['class'];
        
        // $url = "https://indianrailapi.com/api/v2/trainFare/apikey/e8e32ac506ec8121ce378495fc8435de/trainnumber/02314/from/NDLS/to/HWS/quota/GN/";
        
        $url = "https://indianrailapi.com/api/v2/trainFare/apikey/";
        $url .= $apikey."/";
        $url .= "trainnumber/"; 
        $url .= $trainNumber."/";
        $url .= "from/"; 
        $url .= $stationFrom."/";
        $url .= "to/"; 
        $url .= $stationTo."/";
        $url .= "quota/";
        $url .= $classCode;
        // dd($url);
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET"); 
       

        // In real life you should use something like:
        // curl_setopt($ch, CURLOPT_POSTFIELDS, 
        //          http_build_query(array('postvar1' => 'value1')));

        // Receive server response ...
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $server_output = curl_exec($ch);

        curl_close ($ch);

        // dd($server_output);
        $server_output_arr = json_decode($server_output,1);
        // dd($server_output_arr);
        return $server_output;
        // Further processing ...
        
    }

    public function showTrainSchedule($tno)
    {
        $ch = curl_init();

        $apikey = "e8e32ac506ec8121ce378495fc8435de";
        // $date   = "20210207";
        // $trainNumber = "02302" ;
        $trainNumber = $tno;

        $url = "https://indianrailapi.com/api/v2/TrainSchedule/apikey/";
        $url .= $apikey."/";
        $url .= "trainnumber/"; 
        $url .= $trainNumber."/";
        $url = "https://indianrailapi.com/api/v2/trainSchedule/apikey/e8e32ac506ec8121ce378495fc8435de/trainNumber/12456/";
        // dd($url);
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET"); 
       

        // In real life you should use something like:
        // curl_setopt($ch, CURLOPT_POSTFIELDS, 
        //          http_build_query(array('postvar1' => 'value1')));

        // Receive server response ...
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $server_output = curl_exec($ch);

        curl_close ($ch);

        // dd($server_output);
        $server_output_arr = json_decode($server_output,1);
        // dd($server_output_arr);
        return $server_output;
        // Further processing ...
        
    }

    public function showAvailableTrains($station_code)
    {
        $ch = curl_init();
        $apikey = "e8e32ac506ec8121ce378495fc8435de";

        $url = "https://indianrailapi.com/api/v2/AllTrainOnStation/apikey/";
        $url .= $apikey."/";
        $url .= "StationCode/"; 
        $url .= $station_code;
        // $url = "https://indianrailapi.com/api/v2/trainSchedule/apikey/e8e32ac506ec8121ce378495fc8435de/trainNumber/12456/";
        // dd($url);
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET"); 

         // Receive server response ...
         curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

         $server_output = curl_exec($ch);
 
         curl_close($ch);
 
         // dd($server_output);
         $server_output_arr = json_decode($server_output,1);
        //  dd($server_output_arr);
         return $server_output;
    }

    public function showTrainBtwnStation($from, $to)
    {
        $ch = curl_init();
        $apikey = "e8e32ac506ec8121ce378495fc8435de";

        $url = "https://indianrailapi.com/api/v2/TrainBetweenStation/apikey/";
        $url .= $apikey."/";
        $url .= "from/"; 
        $url .= $from."/";
        $url .= "to/";
        $url .= $to;
        // $url = "https://indianrailapi.com/api/v2/trainSchedule/apikey/e8e32ac506ec8121ce378495fc8435de/trainNumber/12456/";
        // dd($url);
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET"); 

        // Receive server response ...
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $server_output = curl_exec($ch);

        curl_close($ch);

        // dd($server_output);
        $server_output_arr = json_decode($server_output,1);
        //  dd($server_output_arr);
        return $server_output;
    }

}
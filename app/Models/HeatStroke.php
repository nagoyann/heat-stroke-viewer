<?php

namespace App\Models;

use Google_Client;
use Google_Service_Sheets;
use Google_Service_Sheets_ValueRange;

class HeatStroke
{
    public static function getData()  
    {
        $client = new Google_Client();
        $client->setAuthConfig(base_path("../../credentials.json"));
        $client->setScopes([Google_Service_Sheets::SPREADSHEETS]);
		$client->setApplicationName('Google Sheets');
        $sheets = new Google_Service_Sheets($client);
        $values = $sheets->spreadsheets_values->get("1_vJysEBiO_sJld2oq7eV-tFAoqG2gEyyUqr4BAwaDRI", "A1:E100")->getValues();
     
        $modelArray = array();
        $modelCnt = min(count($values),10); #最大でも10個だけ表示

        for($i = 0;$i < $modelCnt;$i++){
            $modelArray[$i] = new HeatStroke(); 
            $modelArray[$i]->date = date('Y年m月d日 H:i', strtotime($values[$i][0]));
            $modelArray[$i]->temp = $values[$i][1];
            $modelArray[$i]->wet = $values[$i][2];
            $modelArray[$i]->remarks = $values[$i][3];
            $modelArray[$i]->status = $values[$i][4];
        }
        return $modelArray;                
    } 

    public $date;
    public $temp;
    public $wet;
    public $remarks;
    public $status;
}

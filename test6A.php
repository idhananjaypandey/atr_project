<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");


if ($_SERVER["REQUEST_METHOD"] === "POST") 
{

 $entval = $tval3 = $atr1entryval1 = $atr1entryval2 = $atr1entryval3 = 
 $atr2entryval1 = $atr2entryval2 = $atr2entryval3 = $atr3entryval1 = 
 $atr3entryval2 = $atr3entryval3 = 0;

  // Retrieve data from POST request
  $selectmain = $_POST["selectmain"];
  $texbox1 = (isset($_POST["texbox1"]) && (is_numeric($_POST["texbox1"]))) ? floatval($_POST["texbox1"]) : 0.0; 
  $texbox2 = (isset($_POST["texbox2"]) && (is_numeric($_POST["texbox2"]))) ? floatval($_POST["texbox2"]) : 0.0; 
  $texbox3 = (isset($_POST["texbox3"]) && (is_numeric($_POST["texbox3"])) )? floatval($_POST["texbox3"]) : 0.0; 
  $selectrisk = $_POST["selectrisk"];
  $acctsize = floatval($_POST["acctsize"]);
  $maxloss = floatval($_POST["maxloss"]);
  $acctsize2 = floatval($_POST["acctsize2"]);
  $maxloss2 = floatval($_POST["maxloss2"]);
  $shorttarget = floatval($_POST["shorttarget"]);
//   $selectshort = $_POST["selectshort"];
  $atr1selectrisk = $_POST["atr1selectrisk"];
  $atr2selectrisk = $_POST["atr2selectrisk"];
  $atr3selectrisk = $_POST["atr3selectrisk"];

  
  function textBox1($data)
{
    $texbox1 = floatval($data["texbox1"]);
    $selectmain = $data["selectmain"];
    $result = [];

    if ($selectmain == "ATRActual") {
        $entval = $texbox1 * 1.15;
        $tval3 = $texbox1 * 0.1;
        $atr1entryval1 = $texbox1 * 0.9;
        $atr1entryval2 = $texbox1 * 1.05 * 2;
        $atr1entryval3 = $texbox1 * 0.1;
        $atr2entryval1 = $texbox1 * 0.9 * 2;
        $atr2entryval2 = $texbox1 * 1.01 * 3;
        $atr2entryval3 = $texbox1 * 0.1;
        $atr3entryval1 = $texbox1 * 0.9 * 3;
        $atr3entryval2 = $texbox1 * 1.005 * 4;
        $atr3entryval3 = $texbox1 * 0.1;
    } elseif ($selectmain == "ATRTicks") {
        $entval = $texbox1 * 0.0115 * 25;
        $tval3 = $texbox1 * 0.001 * 25;
        $atr1entryval1 = $texbox1 * 0.009 * 25*0;
        $atr1entryval2 = $texbox1 * 0.0105 * 2 * 25;
        $atr1entryval3 = $texbox1 * 0.001 * 25;
        $atr2entryval1 = $texbox1 * 0.009 * 2 * 25;
        $atr2entryval2 = $texbox1 * 0.0101 * 3 * 25;
        $atr2entryval3 = $texbox1 * 0.001 * 25;
        $atr3entryval1 = $texbox1 * 0.009 * 3 * 0.1;
        $atr3entryval2 = $texbox1 * 0.01005 * 4 * 0.1;
        $atr3entryval3 = $texbox1 * 0.001 * 0.1;
    }

    $result['entval'] = number_format($entval, 5);
    $result['tval3'] = number_format($tval3, 5);
    $result['atr1entryval1'] = number_format($atr1entryval1, 5);
    $result['atr1entryval2'] = number_format($atr1entryval2, 5);
    $result['atr1entryval3'] = number_format($atr1entryval3, 5);
    $result['atr2entryval1'] = number_format($atr2entryval1, 5);
    $result['atr2entryval2'] = number_format($atr2entryval2, 5);
    $result['atr2entryval3'] = number_format($atr2entryval3, 5);
    $result['atr3entryval1'] = number_format($atr3entryval1, 5);
    $result['atr3entryval2'] = number_format($atr3entryval2, 5);
    $result['atr3entryval3'] = number_format($atr3entryval3, 5);

    return $result;
}

function textBox2($data,$result1)
{
    // Use isset() to check if the array keys exist before attempting to access them
    $texbox2 = isset($data["texbox2"]) ? floatval($data["texbox2"]) : 0.0;
    $texbox1 = isset($data["texbox1"]) ? floatval($data["texbox1"]) : 0.0;
    $entval = isset($result1["entval"]) ? floatval($result1["entval"]) : 0.0;
    $atr1entryval1 = isset($result1["atr1entryval1"]) ? floatval($result1["atr1entryval1"]) : 0.0;
    $atr1entryval2 = isset($result1["atr1entryval2"]) ? floatval($result1["atr1entryval2"]) : 0.0;
    $atr1entryval3 = isset($result1["atr1entryval3"]) ? floatval($result1["atr1entryval3"]) : 0.0;
    $atr2entryval1 = isset($result1["atr2entryval1"]) ? floatval($result1["atr2entryval1"]) : 0.0;
    $atr2entryval2 = isset($result1["atr2entryval2"]) ? floatval($result1["atr2entryval2"]) : 0.0;
    $atr2entryval3 = isset($result1["atr2entryval3"]) ? floatval($result1["atr2entryval3"]) : 0.0;
    $atr3entryval1 = isset($result1["atr3entryval1"]) ? floatval($result1["atr3entryval1"]) : 0.0;
    $atr3entryval2 = isset($result1["atr3entryval2"]) ? floatval($result1["atr3entryval2"]) : 0.0;
    $atr3entryval3 = isset($result1["atr3entryval3"]) ? floatval($result1["atr3entryval3"]) : 0.0;
    $retest = isset($result1["tval3"]) ? floatval($result1["tval3"]) : 0.0;

    $result = [];

    $entprice = round(($texbox2 + $entval) * 20000) / 20000;
    $validaprice = round(($texbox2 + $texbox1) * 20000) / 20000;


    $selectmain = $data["selectmain"];

    if ($selectmain == "ATRActual") {
        $retestprice = round(($texbox2 + $retest)*20000)/20000;
        
    } elseif ($selectmain == "ATRTicks") {
        $retestprice = round(($texbox2 + $retest)*20000)/20000;
    } else {
        $retestprice = 0; 
    }

    
    
    $atr1shortentryprice = round(($texbox2 + $atr1entryval1)*20000)/20000;
    $atr1shortstopprice = round(($texbox2 + $atr1entryval2)*20000)/20000;
    $atr1shortexitprice = round(($texbox2 + $atr1entryval3)*20000)/20000;

    $atr2shortentryprice = round(($texbox2 + $atr2entryval1)*20000)/20000;
    $atr2shortstopprice = round(($texbox2 + $atr2entryval2)*20000)/20000;
    $atr2shortexitprice = round(($texbox2 + $atr2entryval3)*20000)/20000;

    $atr3shortentryprice = round(($texbox2 + $atr3entryval1)*20000)/20000;
    $atr3shortstopprice = round(($texbox2 + $atr3entryval2)*20000)/20000;
    $atr3shortexitprice = round(($texbox2 + $atr3entryval3)*20000)/20000;

    $result['entprice'] = number_format($entprice, 5);
    $result['validaprice'] = number_format($validaprice, 5);
    $result['retestprice'] = number_format($retestprice, 5);
    $result['atr1shortentryprice'] = number_format($atr1shortentryprice, 5);
    $result['atr1shortstopprice'] = number_format($atr1shortstopprice, 5);
    $result['atr1shortexitprice'] = number_format($atr1shortexitprice, 5);
    $result['atr2shortentryprice'] = number_format($atr2shortentryprice, 5);
    $result['atr2shortstopprice'] = number_format($atr2shortstopprice, 5);
    $result['atr2shortexitprice'] = number_format($atr2shortexitprice, 5);
    $result['atr3shortentryprice'] = number_format($atr3shortentryprice, 5);
    $result['atr3shortstopprice'] = number_format($atr3shortstopprice, 5);
    $result['atr3shortexitprice'] = number_format($atr3shortexitprice, 5);
    
    return $result;
}

function textBox3($data,$result1)
{
    $texbox3 = isset($data["texbox3"]) ? floatval($data["texbox3"]) : 0.0;
    $retest = isset($result1["tval3"]) ? floatval($result1["tval3"]) : 0.0;
    
    $entval = isset($result1["entval"]) ? floatval($result1["entval"]) : 0.0;
    $texbox1 = isset($data["texbox1"]) ? floatval($data["texbox1"]) : 0.0;
    $texbox2 = isset($data["texbox2"]) ? floatval($data["texbox2"]) : 0.0;
    $atr1entryval1 = isset($result1["atr1entryval1"]) ? floatval($result1["atr1entryval1"]) : 0.0;
    $atr1entryval2 = isset($result1["atr1entryval2"]) ? floatval($result1["atr1entryval2"]) : 0.0;
    $atr1entryval3 = isset($result1["atr1entryval3"]) ? floatval($result1["atr1entryval3"]) : 0.0;
    $atr2entryval1 = isset($result1["atr2entryval1"]) ? floatval($result1["atr2entryval1"]) : 0.0;
    $atr2entryval2 = isset($result1["atr2entryval2"]) ? floatval($result1["atr2entryval2"]) : 0.0;
    $atr2entryval3 = isset($result1["atr2entryval3"]) ? floatval($result1["atr2entryval3"]) : 0.0;
    $atr3entryval1 = isset($result1["atr3entryval1"]) ? floatval($result1["atr3entryval1"]) : 0.0;
    $atr3entryval2 = isset($result1["atr3entryval2"]) ? floatval($result1["atr3entryval2"]) : 0.0;
    $atr3entryval3 = isset($result1["atr3entryval3"]) ? floatval($result1["atr3entryval3"]) : 0.0;

    $result = [];
    $entprice = 0;
    if($texbox3 > 0) {
         $entprice = round(($texbox3 - $entval) * 20000) / 20000;
    } 
    $stopprice = $entprice;

    $invalidprice = round(($texbox3 - $texbox1) * 20000) / 20000;

    $rightentryprice = $entprice;
    $rightstoporderprice = round(($texbox2 + $entval) * 20000) / 20000;
    $rightvalidprice = $invalidprice;
    $rightretest = round(($texbox3 - $retest) * 20000) / 20000;
    
    $rightinvalid = round(($texbox2 + $texbox1) * 20000) / 20000;
    $rightatr1entryprice = round(($texbox3 - $atr1entryval1) * 20000) / 20000;
    $rightatr1stoporderprice = round(($texbox3 - $atr1entryval2) * 20000) / 20000;
    $rightart1existprice = round(($texbox3 - $atr1entryval3) * 20000) / 20000;

    $rightatr2entryprice = round(($texbox3 - $atr2entryval1) * 20000) / 20000;
    $rightatr2stoporderprice = round(($texbox3 - $atr2entryval2) * 20000) / 20000;
    $rightart2existprice = round(($texbox3 - $atr2entryval3) * 20000) / 20000;

    $rightatr3entryprice = round(($texbox3 - $atr3entryval1) * 20000) / 20000;
    $rightatr3stoporderprice = round(($texbox3 - $atr3entryval2) * 20000) / 20000;
    $rightart3existprice = round(($texbox3 - $atr3entryval3) * 20000) / 20000;

    $result['stopprice'] = number_format($stopprice, 5);
    $result['invalidprice'] = number_format($invalidprice, 5);
    $result['rightentryprice'] = number_format($rightentryprice, 5);
    $result['rightstoporderprice'] = number_format($rightstoporderprice, 5);
    $result['rightvalidprice'] = number_format($rightvalidprice, 5);
    $result['rightretest'] = number_format($rightretest, 5);
    $result['rightinvalid'] = number_format($rightinvalid, 5);
    $result['rightatr1entryprice'] = number_format($rightatr1entryprice, 5);
    $result['rightatr1stoporderprice'] = number_format($rightatr1stoporderprice, 5);
    $result['rightart1existprice'] = number_format($rightart1existprice, 5);
    $result['rightatr2entryprice'] = number_format($rightatr2entryprice, 5);
    $result['rightatr2stoporderprice'] = number_format($rightatr2stoporderprice, 5);
    $result['rightart2existprice'] = number_format($rightart2existprice, 5);
    $result['rightatr3entryprice'] = number_format($rightatr3entryprice, 5);
    $result['rightatr3stoporderprice'] = number_format($rightatr3stoporderprice, 5);
    $result['rightart3existprice'] = number_format($rightart3existprice, 5);

    return $result;
}

function callRisk($data,$result2,$result3) {
    $entprice = floatval(str_replace(',','',$result2["entprice"])); 
    $stopprice = floatval(str_replace(',','',$result3["stopprice"]));
    $selectrisk = $data["selectrisk"];

    if ($selectrisk == "riskpoint") {
        $riskpoints = $entprice - $stopprice;
    } elseif ($selectrisk == "riskticks") {
        $riskpoints = ($entprice - $stopprice) / 0.00005;
    }

    $result['riskpoints'] = number_format($riskpoints, 5);
    return $result;

}

function acctSizeCal($data) {
    $acctsize = floatval($data["acctsize"]);
    $maxloss = floatval($data["maxloss"]);
    $riskval = ($maxloss * $acctsize)/100;

    $result['riskval'] = number_format($riskval, 2);
    return $result;

}

function acctSizeCal2($data) {
    $acctsize2 = floatval($data["acctsize2"]);
    $maxloss2 = floatval($data["maxloss2"]);
    $riskval2 = ($maxloss2 * $acctsize2);

    $result['riskval2'] = number_format($riskval2, 2);
    return $result;

    
}

function Contracts($data,$result4,$result5) {
    $riskval = floatval(str_replace(',','',$result5["riskval"]));
    $riskpoints = floatval(str_replace(',','',$result4["riskpoints"]));
    $selectrisk = $data["selectrisk"];

    $nqcontracts = 0;
    $mnqcontracts = 0;

    if ($riskpoints != 0) { // Check for division by zero
        if ($selectrisk == "riskpoint") {
            $nqcontracts = ($riskval / $riskpoints) / 100000;
        } elseif ($selectrisk == "riskticks") {
            $nqcontracts = (($riskval / $riskpoints) / 100000) / 0.00005;
        }
    }

    
    // $mnqcontracts = number_format($nqcontracts * 10, 1);
    $result['nqcontracts'] = number_format($nqcontracts, 3);
    // $result['mnqcontracts'] = $mnqcontracts;
    return $result;
}

// function Shortvalue($data,$result2,$result3,$result4) {
//         $shorttarget = floatval($data["shorttarget"]);
//         $riskpoints = floatval(str_replace(',','',$result4["riskpoints"]));
//         $entprice = floatval(str_replace(',','',$result2["entprice"]));
//         $rightentryprice = floatval(str_replace(',','',$result3["rightentryprice"]));
//         $selectrisk = $data["selectrisk"];
//         // $selectshort = $data["selectshort"];
       
    
//         $riskreward = 0;
    
//         if ($riskpoints != 0) { // Check for division by zero
//             if ($selectshort == "longtarget" && $selectrisk == "riskpoint") {
//                 $riskreward = ($shorttarget - $entprice) / $riskpoints;
//             } elseif ($selectshort == "longtarget" && $selectrisk == "riskticks") {
//                 $riskreward = (($shorttarget - $entprice) * 1) / $riskpoints;
//             } elseif ($selectshort == "shorttarget" && $selectrisk == "riskticks") {
//                 $riskreward = (($rightentryprice - $shorttarget) * 1) / $riskpoints;
//             } elseif ($selectshort == "shorttarget" && $selectrisk == "riskpoint") {
//                 $riskreward = ($rightentryprice - $shorttarget) / $riskpoints;
//             }
//         }

//     $result['riskreward'] = number_format($riskreward, 2);
    
//     return $result;

// }

function atr1SelectCal($data,$result2,$result6)
{
    $atr1shortstopprice = floatval(str_replace(',','',$result2["atr1shortstopprice"]));
    $atr1shortentryprice = floatval(str_replace(',','',$result2["atr1shortentryprice"]));
    $riskval2 = floatval(str_replace(',','',$result6["riskval2"]));
    $atr1shortexitprice = floatval(str_replace(',','',$result2["atr1shortexitprice"]));
    $atr1selectrisk = $data["atr1selectrisk"];

    $atr1escontracts = 0;
    $atr1riskreward = 0;

    if ($atr1selectrisk == "riskpoint") {
        $atr1riskpoints = $atr1shortstopprice - $atr1shortentryprice;
        if ($atr1riskpoints != 0) {
            $atr1escontracts = $riskval2 / $atr1riskpoints / 100000;
            $atr1riskreward = ($atr1shortentryprice - $atr1shortexitprice) / $atr1riskpoints;
        }
    } elseif ($atr1selectrisk == "riskticks") {
        $atr1riskpoints = ($atr1shortstopprice - $atr1shortentryprice) / 0.00005;
        if ($atr1riskpoints != 0) {
            $atr1escontracts = (($riskval2 / $atr1riskpoints )/ 100000 / 0.00005);
            $atr1riskreward = ($atr1shortentryprice - $atr1shortexitprice) / (0.00005 / $atr1riskpoints);
        }
    }

    // $atr1mescontracts = $atr1escontracts * 10;
    // $atr1escontracts=ceil($atr1escontracts*10)/10;
    $result['atr1riskpoints'] = number_format($atr1riskpoints, 5);
    $result['atr1escontracts'] = number_format($atr1escontracts, 3);
    // $result['atr1mescontracts'] = number_format($atr1mescontracts, 1);
    // $result['atr1riskreward'] = number_format($atr1riskreward, 2);
    return $result;
}


function atr2SelectCal($data,$result2,$result6)
{
    $atr2shortstopprice = floatval(str_replace(',','',$result2["atr2shortstopprice"]));
    $atr2shortentryprice = floatval(str_replace(',','',$result2["atr2shortentryprice"]));
    $riskval2 = floatval(str_replace(',','',$result6["riskval2"]));
    $atr2shortexitprice = floatval(str_replace(',','',$result2["atr2shortexitprice"]));
    $atr2selectrisk = $data["atr2selectrisk"];

    // Initialize variables with default values
    $atr2escontracts = 0;
    $atr2riskreward = 0;

    if ($atr2selectrisk == "riskpoint") {
        $atr2riskpoints = $atr2shortstopprice - $atr2shortentryprice;
        if ($atr2riskpoints != 0) {
            $atr2escontracts = ($riskval2 / $atr2riskpoints) / 100000;
            $atr2riskreward = ($atr2shortentryprice - $atr2shortexitprice) / $atr2riskpoints;
        }
    } else {
        $atr2riskpoints = $atr2shortstopprice - $atr2shortentryprice;
        if ($atr2riskpoints != 0) {
            $atr2escontracts = (($riskval2 / $atr2riskpoints) / 100000) / 0.00005;
            $atr2riskreward = (($atr2shortentryprice - $atr2shortexitprice) / 0.00005) / $atr2riskpoints;
        }
    }

    $atr2mescontracts = $atr2escontracts * 10;

    $result['atr2riskpoints'] = number_format($atr2riskpoints, 5);
    $result['atr2escontracts'] = number_format($atr2escontracts, 3);
    // $result['atr2mescontracts'] = number_format($atr2mescontracts, 2);
    // $result['atr2riskreward'] = number_format($atr2riskreward, 2);

    return $result;
}


function atr3SelectCal($data,$result2,$result6)
{
    $atr3shortstopprice = floatval(str_replace(',','',$result2["atr3shortstopprice"]));
    $atr3shortentryprice = floatval(str_replace(',','',$result2["atr3shortentryprice"]));
    $riskval2 = floatval(str_replace(',','',$result6["riskval2"]));
    $atr3shortexitprice = floatval(str_replace(',','',$result2["atr3shortexitprice"]));
    $atr3selectrisk = $data["atr3selectrisk"];

    // Initialize variables with default values
    $atr3escontracts = 0;
    $atr3riskreward = 0;

    if ($atr3selectrisk == "riskpoint") {
        $atr3riskpoints = $atr3shortstopprice - $atr3shortentryprice;
        if ($atr3riskpoints != 0) {
            $atr3escontracts = ($riskval2 / $atr3riskpoints) / 100000;
            $atr3riskreward = ($atr3shortentryprice - $atr3shortexitprice) / $atr3riskpoints;
        }
    } else{
        $atr3riskpoints = $atr3shortstopprice - $atr3shortentryprice;
        if ($atr3riskpoints != 0) {
            $atr3escontracts = (($riskval2 / $atr3riskpoints) / 100000) / 0.00005;
            $atr3riskreward = (($atr3shortentryprice - $atr3shortexitprice) / 0.00005) / $atr3riskpoints;
        }
    }

    $atr3mescontracts = $atr3escontracts * 10;

    $result['atr3riskpoints'] = number_format($atr3riskpoints, 5);
    $result['atr3escontracts'] = number_format($atr3escontracts, 3);
    // $result['atr3mescontracts'] = number_format($atr3mescontracts, 2);
    // $result['atr3riskreward'] = number_format($atr3riskreward, 2);

    return $result;
}

  // Prepare the data to send back to the client
  // $responseData = textBox2($_POST);

$inputData = $_POST;

$result1 = textBox1($inputData);
$result2 = textBox2($inputData,$result1);
$result3 = textBox3($inputData,$result1);
$result4 = callRisk($inputData,$result2,$result3);
$result5 = acctSizeCal($inputData);
$result7 = Contracts($inputData,$result4,$result5);
// $result8 = Shortvalue($inputData,$result2,$result3,$result4);
$result6 = acctSizeCal2($inputData);
$result9 = atr1SelectCal($inputData,$result2,$result6);
$result10 = atr2SelectCal($inputData,$result2,$result6);
$result11 = atr3SelectCal($inputData,$result2,$result6);





// ,$result4,$result5,$result6,$result7,$result8,$result9,$result10,$result11
$combinedResponse = array_merge($result1, $result2,$result3,$result4,$result5,$result6,$result7,$result9,$result10,$result11);


  header("HTTP/1.1 200 OK");
  header("Content-Type: application/json");
  echo json_encode($combinedResponse);
  exit;
  
}

?>

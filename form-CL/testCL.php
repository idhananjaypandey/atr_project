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
  $texbox1 = floatval($_POST["texbox1"]);
  $texbox2 = floatval($_POST["texbox2"]);
  $texbox3 = floatval($_POST["texbox3"]);
  $selectrisk = $_POST["selectrisk"];
  $acctsize = floatval($_POST["acctsize"]);
  $maxloss = floatval($_POST["maxloss"]);
  $acctsize2 = floatval($_POST["acctsize2"]);
  $maxloss2 = floatval($_POST["maxloss2"]);
  $shorttarget = floatval($_POST["shorttarget"]);
  $selectshort = $_POST["selectshort"];
  $atr1selectrisk = $_POST["atr1selectrisk"];
  $atr2selectrisk = $_POST["atr2selectrisk"];
  $atr3selectrisk = $_POST["atr3selectrisk"];
   
    //TestBox1
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

    $result['entval'] = number_format($entval, 2);
    $result['tval3'] = number_format($tval3, 2);
    $result['atr1entryval1'] = number_format($atr1entryval1, 2);
    $result['atr1entryval2'] = number_format($atr1entryval2, 2);
    $result['atr1entryval3'] = number_format($atr1entryval3, 2);
    $result['atr2entryval1'] = number_format($atr2entryval1, 2);
    $result['atr2entryval2'] = number_format($atr2entryval2, 2);
    $result['atr2entryval3'] = number_format($atr2entryval3, 2);
    $result['atr3entryval1'] = number_format($atr3entryval1, 2);
    $result['atr3entryval2'] = number_format($atr3entryval2, 2);
    $result['atr3entryval3'] = number_format($atr3entryval3, 2);


    //Textbox2
    $entprice = round(($texbox2 + $entval)*100)/100;
    $validaprice = round(($texbox2 + $texbox1) * 100) / 100;
    $retestprice = round(($texbox2 + $tval3)*100)/100;
    $atr1shortentryprice = round(($texbox2 + $atr1entryval1)*100)/100;
    $atr1shortstopprice = round(($texbox2 + $atr1entryval2)*100)/100;
    $atr1shortexitprice = round(($texbox2 + $atr1entryval3)*100)/100;

    $atr2shortentryprice = round(($texbox2 + $atr2entryval1)*100)/100;
    $atr2shortstopprice = round(($texbox2 + $atr2entryval2)*100)/100;
    $atr2shortexitprice = round(($texbox2 + $atr2entryval3)*100)/100;

    $atr3shortentryprice = round(($texbox2 + $atr3entryval1)*100)/100;
    $atr3shortstopprice = round(($texbox2 + $atr3entryval2)*100)/100;
    $atr3shortexitprice = round(($texbox2 + $atr3entryval3)*100)/100;

    $result['entprice'] = number_format($entprice, 2);
    $result['validaprice'] = number_format($validaprice, 2);
    $result['retestprice'] = number_format($retestprice, 2);
    $result['atr1shortentryprice'] = number_format($atr1shortentryprice, 2);
    $result['atr1shortstopprice'] = number_format($atr1shortstopprice, 2);
    $result['atr1shortexitprice'] = number_format($atr1shortexitprice, 2);
    $result['atr2shortentryprice'] = number_format($atr2shortentryprice, 2);
    $result['atr2shortstopprice'] = number_format($atr2shortstopprice, 2);
    $result['atr2shortexitprice'] = number_format($atr2shortexitprice, 2);
    $result['atr3shortentryprice'] = number_format($atr3shortentryprice, 2);
    $result['atr3shortstopprice'] = number_format($atr3shortstopprice, 2);
    $result['atr3shortexitprice'] = number_format($atr3shortexitprice, 2);
    
    //TextBox3
    $stopprice = round(($texbox3 - $entval) * 100) / 100;
    $invalidprice = round(($texbox3 - $texbox1) * 100) / 100;
    $rightentryprice = round(($texbox3 - $entval)*100)/100;
    $rightstoporderprice = round(($texbox2 + $entval) * 100) / 100;
    $rightvalidprice = $invalidprice;
    $rightretest = round(($texbox3 - $tval3) * 100) / 100;
    $rightinvalid = round(($texbox2 + $texbox1) * 100) / 100;
    $rightatr1entryprice = round(($texbox3 - $atr1entryval1) * 100) / 100;
    $rightatr1stoporderprice = round(($texbox3 - $atr1entryval2) * 100) / 100;
    $rightart1existprice = round(($texbox3 - $atr1entryval3) * 100) / 100;

    $rightatr2entryprice = round(($texbox3 - $atr2entryval1) * 100) / 100;
    $rightatr2stoporderprice = round(($texbox3 - $atr2entryval2) * 100) / 100;
    $rightart2existprice = round(($texbox3 - $atr2entryval3) * 100) / 100;

    $rightatr3entryprice = round(($texbox3 - $atr3entryval1) * 100) / 100;
    $rightatr3stoporderprice = round(($texbox3 - $atr3entryval2) * 100) / 100;
    $rightart3existprice = round(($texbox3 - $atr3entryval3) * 100) / 100;

    $result['stopprice'] = number_format($stopprice,2);
    $result['invalidprice'] = number_format($invalidprice,2);
    $result['rightentryprice'] = number_format($rightentryprice,2);
    $result['rightstoporderprice'] = number_format($rightstoporderprice,2);
    $result['rightvalidprice'] = number_format($rightvalidprice,2);
    $result['rightretest'] = number_format($rightretest,2);
    $result['rightinvalid'] = number_format($rightinvalid,2);
    $result['rightatr1entryprice'] = number_format($rightatr1entryprice,2);
    $result['rightatr1stoporderprice'] = number_format($rightatr1stoporderprice,2);
    $result['rightart1existprice'] = number_format($rightart1existprice,2);
    $result['rightatr2entryprice'] = number_format($rightatr2entryprice,2);
    $result['rightatr2stoporderprice'] = number_format($rightatr2stoporderprice,2);
    $result['rightart2existprice'] = number_format($rightart2existprice,2);
    $result['rightatr3entryprice'] = number_format($rightatr3entryprice,2);
    $result['rightatr3stoporderprice'] = number_format($rightatr3stoporderprice,2);
    $result['rightart3existprice'] = number_format($rightart3existprice,2);

    //callRisk
    if ($selectrisk == "riskpoint") {
        $riskpoints = $entprice - $stopprice;
    } elseif ($selectrisk == "riskticks") {
        $riskpoints = ($entprice - $stopprice) /0.01;
    }
    $result['riskpoints'] = number_format($riskpoints, 2);
 
    //acctSizeCal
    $riskval = $maxloss * $acctsize;
    $result['riskval'] = number_format($riskval, 2);
    $riskval2 = $maxloss2 * $acctsize2;
    $result['riskval2'] = number_format($riskval2, 2);



//Contracts
    $nqcontracts = 0;
    $mnqcontracts = 0;
    if ($riskpoints != 0) { // Check for division by zero
        if ($selectrisk == "riskpoint") {
            $nqcontracts = ($riskval / $riskpoints) / 1000;
        } elseif ($selectrisk == "riskticks") {
            $nqcontracts = (($riskval / $riskpoints) / 1000) /0.01;
        }
    }
   
    $mnqcontracts = number_format($nqcontracts * 10, 2);
    $result['nqcontracts'] = number_format($nqcontracts, 2);
    $result['mnqcontracts'] = $mnqcontracts;

       
//Shortvalue
        $riskreward = 0;
    
        if ($riskpoints != 0) { // Check for division by zero
            if ($selectshort == "longtarget" && $selectrisk == "riskpoint") {
                $riskreward = ($shorttarget - $entprice) / $riskpoints;
            } elseif ($selectshort == "longtarget" && $selectrisk == "riskticks") {
                $riskreward = (($shorttarget - $entprice) / 0.01) / $riskpoints;
            } elseif ($selectshort == "shorttarget" && $selectrisk == "riskticks") {
                $riskreward = (($rightentryprice - $shorttarget) / 0.01) / $riskpoints;
            } elseif ($selectshort == "shorttarget" && $selectrisk == "riskpoint") {
                $riskreward = ($rightentryprice - $shorttarget) / $riskpoints;
            }
        }

    $result['riskreward'] = number_format($riskreward, 2);
    
//ATR1 clculate
    $atr1escontracts = 0;
    $atr1riskreward = 0;

    if ($atr1selectrisk == "riskpoint") {
        $atr1riskpoints = $atr1shortstopprice - $atr1shortentryprice;
        // $atr1riskpointsval = $atr1riskpoints;
        if ($atr1riskpoints != 0) {
            $atr1escontracts = ($riskval2 / $atr1riskpoints) / 1000;
            $atr1riskreward = ($atr1shortentryprice - $atr1shortexitprice) / $atr1riskpoints;
        } else {
            // Handle the case where $atr1riskpoints is zero to avoid division by zero.
            // You can set $atr1escontracts and $atr1riskreward to some default values or handle it differently.
        }
    } elseif ($atr1selectrisk == "riskticks") {
        $atr1riskpoints = ($atr1shortstopprice - $atr1shortentryprice)/0.01;
        if ($atr1riskpoints != 0) {
            $atr1escontracts = (($riskval2 / $atr1riskpoints) / 1000 )/ 0.01;
            $atr1riskreward = (($atr1shortentryprice - $atr1shortexitprice) / 0.01) / $atr1riskpoints;
        } 
    }

    $atr1mescontracts = $atr1escontracts * 10;

    $result['atr1riskpoints'] = number_format($atr1riskpoints, 2);
    $result['atr1escontracts'] = number_format($atr1escontracts, 2);
    $result['atr1mescontracts'] = number_format($atr1mescontracts, 2);
    $result['atr1riskreward'] = number_format($atr1riskreward, 2);

 //ATR2Cal   
    // Initialize variables with default values
    $atr2escontracts = 0;
    $atr2riskreward = 0;

    if ($atr2selectrisk == "riskpoint") {
        $atr2riskpoints = $atr2shortstopprice - $atr2shortentryprice;
        if ($atr2riskpoints != 0) {
            $atr2escontracts = ($riskval2 / $atr2riskpoints) / 1000;
            $atr2riskreward = ($atr2shortentryprice - $atr2shortexitprice) / $atr2riskpoints;
        }
    } elseif ($atr2selectrisk == "riskticks") {
        $atr2riskpoints = ($atr2shortstopprice - $atr2shortentryprice)/0.01;
        if ($atr2riskpoints != 0) {
            $atr2escontracts = (($riskval2 / $atr2riskpoints) / 1000 )/ 0.01;
            $atr2riskreward = (($atr2shortentryprice - $atr2shortexitprice) / 0.01) / $atr2riskpoints;
        }
    }

    $atr2mescontracts = $atr2escontracts * 10;

    $result['atr2riskpoints'] = number_format($atr2riskpoints, 2);
    $result['atr2escontracts'] = number_format($atr2escontracts, 2);
    $result['atr2mescontracts'] = number_format($atr2mescontracts, 2);
    $result['atr2riskreward'] = number_format($atr2riskreward, 2);

    // Initialize variables with default values
//ATR3 Cal
    $atr3escontracts = 0;
    $atr3riskreward = 0;

    if ($atr3selectrisk == "riskpoint") {
        $atr3riskpoints = $atr3shortstopprice - $atr3shortentryprice;
        if ($atr3riskpoints != 0) {
            $atr3escontracts = ($riskval2 / $atr3riskpoints) / 1000;
            $atr3riskreward = ($atr3shortentryprice - $atr3shortexitprice) / $atr3riskpoints;
        }
    } elseif ($atr3selectrisk == "riskticks") {
        $atr3riskpoints = ($atr3shortstopprice - $atr3shortentryprice)/0.01;
        if ($atr3riskpoints != 0) {
            $atr3escontracts = (($riskval2 / $atr3riskpoints) / 1000 )/ 0.01;
            $atr3riskreward = (($atr3shortentryprice - $atr3shortexitprice) / 0.01) / $atr3riskpoints;
        }
    }
    $atr3mescontracts = $atr3escontracts * 10;
    $result['atr3riskpoints'] = number_format($atr3riskpoints, 2);
    $result['atr3escontracts'] = number_format($atr3escontracts, 2);
    $result['atr3mescontracts'] = number_format($atr3mescontracts, 2);
    $result['atr3riskreward'] = number_format($atr3riskreward, 2);


  header("HTTP/1.1 200 OK");
  header("Content-Type: application/json");
  echo json_encode($result);
  exit;
  
}

?>

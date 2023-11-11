<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");


if ($_SERVER["REQUEST_METHOD"] === "POST") 
{

 $entval = $tval3 = $atr1entryval1 = $atr1entryval2 = $atr1entryval3 = 
 $atr2entryval1 = $atr2entryval2 = $atr2entryval3 = $atr3entryval1 = 
 $atr3entryval2 = $atr3entryval3 = $entprice=$stopprice=0;

  // Retrieve data from POST request
  $texbox1 = floatval($_POST["texbox1"]);
  $texbox2 = floatval($_POST["texbox2"]);
  $texbox3 = floatval($_POST["texbox3"]);
  $acctsize = floatval($_POST["acctsize"]);
  $maxloss = floatval($_POST["maxloss"]);
  $acctsize2 = floatval($_POST["acctsize2"]);
  $maxloss2 = floatval($_POST["maxloss2"]);



  function DallarCal($dlde, $dlfr) {
    $dlde1 = intval($dlde);
    $dlde2 = $dlde - $dlde1;
    $dltemp1 = ($dlde2 * 100) / 32;
    $dltemp2 = number_format($dlde1 + $dltemp1, 5, '.', ''); // Equivalent of toFixed(5) in JavaScript
    $dlfr1 = floatval($dltemp2) + $dlfr;
    $dlfr2 = intval($dlfr1);
    $dlfr3 = floatval(number_format($dlfr1 - $dlfr2, 5, '.', '')); // Equivalent of toFixed(5) in JavaScript
    $result1 = ($dlfr3 * 32) / 100;
    $result2 = number_format($result1 + $dlfr2, 3, '.', ''); // Equivalent of toFixed(3) in JavaScript
    return $result2;
}

function DallarCal2($dlde, $dlfr) {
    $dlde1 = intval($dlde);
    $dlde2 = $dlde - $dlde1;
    $dltemp1 = ($dlde2 * 100) / 32;
    $dltemp2 = number_format($dlde1 + $dltemp1, 5, '.', ''); // Equivalent of toFixed(5) in JavaScript
    $dlfr1 = floatval($dltemp2) - $dlfr;
    $dlfr2 = intval($dlfr1);
    $dlfr3 = floatval(number_format($dlfr1 - $dlfr2, 5, '.', '')); // Equivalent of toFixed(5) in JavaScript
    $result1 = ($dlfr3 * 32) / 100;
    $result2 = number_format($result1 + $dlfr2, 3, '.', ''); // Equivalent of toFixed(3) in JavaScript
    return $result2;
}


function DallarRiskCal($dlde, $dlfr) {
    $dlde1 = intval($dlde);
    $dlde2 = $dlde - $dlde1;
    $dltemp1 = ($dlde2 * 100) / 32;
    $dltemp2 = number_format($dlde1 + $dltemp1, 4, '.', ''); // Equivalent of toFixed(4) in JavaScript

    $dldet1 = intval($dlfr);
    $dldet2 = $dlfr - $dldet1;
    $dltempt1 = ($dldet2 * 100) / 32;
    $dltempt2 = number_format($dldet1 + $dltempt1, 5, '.', ''); // Equivalent of toFixed(5) in JavaScript

    $dlfr1 = floatval($dltemp2) - floatval($dltempt2);
    $dlfr2 = intval($dlfr1);
    $dlfr3 = floatval(number_format($dlfr1 - $dlfr2, 5, '.', '')); // Equivalent of toFixed(5) in JavaScript
    $result1 = ($dlfr3 * 32) / 100;
    $result2 = $result1 + $dlfr2;
    return (($result2 * 100) / 32);
}
   
   //TestBox1
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

   $result['entval'] = number_format($entval, 4);
   $result['tval3'] = number_format($tval3, 4);
   $result['atr1entryval1'] = number_format($atr1entryval1, 4);
   $result['atr1entryval2'] = number_format($atr1entryval2, 4);
   $result['atr1entryval3'] = number_format($atr1entryval3, 4);
   $result['atr2entryval1'] = number_format($atr2entryval1, 4);
   $result['atr2entryval2'] = number_format($atr2entryval2, 4);
   $result['atr2entryval3'] = number_format($atr2entryval3, 4);
   $result['atr3entryval1'] = number_format($atr3entryval1, 4);
   $result['atr3entryval2'] = number_format($atr3entryval2, 4);
   $result['atr3entryval3'] = number_format($atr3entryval3, 4);


   //Textbox2
   $entprice = DallarCal($texbox2 , $entval);
   $validaprice = DallarCal($texbox2 , $texbox1);
   $retestprice =DallarCal($texbox2 , $tval3);
   $atr1shortentryprice = DallarCal($texbox2 , $atr1entryval1);
   $atr1shortstopprice = DallarCal($texbox2 , $atr1entryval2);
   $atr1shortexitprice = DallarCal($texbox2 , $atr1entryval3);

   $atr2shortentryprice = DallarCal($texbox2 , $atr2entryval1);
   $atr2shortstopprice = DallarCal($texbox2 , $atr2entryval2);
   $atr2shortexitprice = DallarCal($texbox2 , $atr2entryval3);

   $atr3shortentryprice = DallarCal($texbox2 , $atr3entryval1);
   $atr3shortstopprice = DallarCal($texbox2 , $atr3entryval2);
   $atr3shortexitprice = DallarCal($texbox2 , $atr3entryval3);

   $result['entprice'] = number_format($entprice, 2);
   $result['validaprice'] = number_format($validaprice, 2);
   $result['retestprice'] = number_format($retestprice, 2);
   $result['atr1shortentryprice'] = number_format($atr1shortentryprice,3);
   $result['atr1shortstopprice'] = number_format($atr1shortstopprice,3);
   $result['atr1shortexitprice'] = number_format($atr1shortexitprice,3);
   $result['atr2shortentryprice'] = number_format($atr2shortentryprice,3);
   $result['atr2shortstopprice'] = number_format($atr2shortstopprice,3);
   $result['atr2shortexitprice'] = number_format($atr2shortexitprice,3);
   $result['atr3shortentryprice'] = number_format($atr3shortentryprice,3);
   $result['atr3shortstopprice'] = number_format($atr3shortstopprice,3);
   $result['atr3shortexitprice'] = number_format($atr3shortexitprice,3);
    
    //TextBox3
    $stopprice = DallarCal2($texbox3 , $entval);
    $invalidprice = DallarCal2($texbox3 , $texbox1);
    $invalidprice2 = DallarCal2($texbox3, $texbox1);
    $rightentryprice = DallarCal2($texbox3 , $entval);
    $rightstoporderprice =DallarCal($texbox2 , $entval) ;
    $rightvalidprice = $invalidprice;
    $rightretest =DallarCal2($texbox3 , $tval3);
    $rightinvalid = DallarCal($texbox2 , $texbox1);
    $rightinvalid2 = DallarCal($texbox2, $texbox1);
    $rightatr1entryprice = DallarCal2($texbox3 , $atr1entryval1);
    $rightatr1stoporderprice = DallarCal2($texbox3 , $atr1entryval2);
    $rightart1existprice = DallarCal2($texbox3 , $atr1entryval3);

    $rightatr2entryprice = DallarCal2($texbox3 , $atr2entryval1);
    $rightatr2stoporderprice = DallarCal2($texbox3 , $atr2entryval2);
    $rightart2existprice = DallarCal2($texbox3 , $atr2entryval3);

    $rightatr3entryprice = DallarCal2($texbox3 , $atr3entryval1);
    $rightatr3stoporderprice = DallarCal2($texbox3 , $atr3entryval2);
    $rightart3existprice = DallarCal2($texbox3 , $atr3entryval3);

    $result['stopprice'] = number_format($stopprice,2);
    $result['invalidprice'] = number_format($invalidprice,2);
    $result['invalidprice2'] = number_format($invalidprice2,3);
    $result['rightentryprice'] = number_format($rightentryprice,2);
    $result['rightstoporderprice'] = number_format($rightstoporderprice,2);
    $result['rightvalidprice'] = number_format($rightvalidprice,2);
    $result['rightretest'] = number_format($rightretest,2);
    $result['rightinvalid'] = number_format($rightinvalid,2);
    $result['rightinvalid2'] = number_format($rightinvalid2,3);
    $result['rightatr1entryprice'] = number_format($rightatr1entryprice,3);
    $result['rightatr1stoporderprice'] = number_format($rightatr1stoporderprice,3);
    $result['rightart1existprice'] = number_format($rightart1existprice,3);
    $result['rightatr2entryprice'] = number_format($rightatr2entryprice,3);
    $result['rightatr2stoporderprice'] = number_format($rightatr2stoporderprice,3);
    $result['rightart2existprice'] = number_format($rightart2existprice,3);
    $result['rightatr3entryprice'] = number_format($rightatr3entryprice,3);
    $result['rightatr3stoporderprice'] = number_format($rightatr3stoporderprice,3);
    $result['rightart3existprice'] = number_format($rightart3existprice,3);

     //callRisk
     $riskpoints=0;
     $riskpoints = DallarRiskCal($entprice, $stopprice);
     $result['riskpoints'] = number_format($riskpoints, 2);

    //acctSizeCal
    $riskval=0;
    $riskval2=0;
    $riskval = ($maxloss * $acctsize)/100;
    $result['riskval'] = number_format($riskval, 2);
    $riskval2 = $maxloss2 * $acctsize2;
    $result['riskval2'] = number_format($riskval2, 2);



//Contracts
$nqcontracts = 0;
if ($riskpoints != 0) { // Check for division by zero
    $nqcontracts = ($riskval / number_format($riskpoints, 2)) / 1000;
}

//$result['nqcontracts'] = number_format($nqcontracts, 2);
$result['nqcontracts'] = intval($nqcontracts*100)/100;
   

//ATR1 clculate
$atr1escontracts = 0;
$atr1riskpoints = 0;
$atr1riskpoints = DallarRiskCal($atr1shortstopprice , $atr1shortentryprice);
if ($atr1riskpoints != 0) { // Check for division by zero
    $atr1escontracts = ($riskval2 / $atr1riskpoints) / 1000;
}
$result['atr1riskpoints'] = number_format($atr1riskpoints, 2);
$result['atr1escontracts'] = number_format($atr1escontracts, 2);

//ATR2Cal   
// Initialize variables with default values
$atr2escontracts = 0;
$atr2riskpoints = 0;
$atr2riskpoints = DallarRiskCal($atr2shortstopprice , $atr2shortentryprice);
if ($atr2riskpoints != 0) { // Check for division by zero
    $atr2escontracts = ($riskval2 / number_format($atr2riskpoints, 2)) / 1000;
}
$result['atr2riskpoints'] = number_format($atr2riskpoints, 2);
$result['atr2escontracts'] = number_format($atr2escontracts, 2);

// Initialize variables with default values
//ATR3 Cal
$atr3escontracts = 0;
$atr3riskpoints = 0;
$atr3riskpoints = DallarRiskCal($atr3shortstopprice , $atr3shortentryprice);
if ($atr3riskpoints != 0) { // Check for division by zero
    $atr3escontracts = ($riskval2 / number_format($atr3riskpoints, 2)) / 1000;
}

$result['atr3riskpoints'] = number_format($atr3riskpoints, 2);
$result['atr3escontracts'] =intval($atr3escontracts * 100) / 100;;


  header("HTTP/1.1 200 OK");
  header("Content-Type: application/json");
  echo json_encode($result);
  exit;
  
}

?>

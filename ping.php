<?php
$host = 'https://user.traxia.com/app/api/inventory'; 
$port = 80; 
$waitTimeoutInSeconds = 1; 
if($fp = fsockopen($host,$port,$errCode,$errStr,$waitTimeoutInSeconds)){   
   echo "it's all good.";
} else {
   echo "hey for once it's their fault!";
} 
fclose($fp);
?>
<?php

require './secret.php';

echo "hi";
$search = $_GET['search'];
$data = array('key' => $API_KEY,
              /*'consignorId' => '1',*/
			  'query' => $search,
			  'includeItemsWithQuantityZero' => 'false');

$data_string = json_encode($data);

$context = stream_context_create(array(
	'http' => array(
		'method' => "POST",
		'header' => "Accept: application/json\r\n".
					"Content-Type: application/json\r\n",
		'content' => $data_string
	)
));

$result = file_get_contents('https://user.traxia.com/app/api/inventory', false, $context);


$jsonData = $result;
$phpArray = json_decode($jsonData, true);
$phpArray = $phpArray['results'];
rsort($phpArray);
$arrlength=count($phpArray);
for($x=0;$x<$arrlength;$x++)
   {
   echo $phpArray[$x];
   echo "<br>";
   }
/*foreach ($phpArray as $key => $value) { 
    print_r("<h2>$key</h2>");
    foreach ($value as $k => $v) { 
        print_r("$k | $v <br />");
    }
}
*/
/* echo $result; */


?>

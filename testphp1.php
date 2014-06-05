<?php

$search = $_GET['search'];
if ($search == "") {
	echo "Please enter a query. <a href='/search.php'>Click Here</a> to go back";
  break;
}
else {
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
$activeonly = array_filter($phpArray, function($active) { return $status['status']=="ACTIVE"; });
$mykeys = array('name','category','color','size','currentPrice');
}
?>
<html> 
<table border="1" cellpadding="8" cellspacing="0" style="border-collapse: collapse">
     <!-- border, cellspacing, and cellpadding attributes are not recommended; only included for example's conciseness -->
     <thead>
        <tr>
           <?php
        foreach($mykeys as $k) {
            echo "<th>$k</th>";
            echo "<img src='/test/images/UpDown.png'>"
        }
        ?>
        </tr>
     </thead>
     <tbody>
        <?php
        foreach($phpArray as $key => $values) {
            echo '<tr>';
            foreach($mykeys as $k) {
                echo "<td>".$values[$k]."</td>";
            }
            echo '</tr>';
        }
        ?>
     </tbody>
  </table>
</html>
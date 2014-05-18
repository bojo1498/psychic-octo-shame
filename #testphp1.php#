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
?>
<html> 
<table border="1" cellpadding="8" cellspacing="0" style="border-collapse: collapse">
     <!-- border, cellspacing, and cellpadding attributes are not recommended; only included for example's conciseness -->
     <thead>
        <tr>
           <?php
           foreach(array_keys($phpArray[0]) as $k) {
              echo "<th>$k</th>";
           }
           ?>
        </tr>
     </thead>
     <tbody>
        <?php
        foreach($phpArray as $key => $values) {
           echo '<tr>';
           foreach($values as $v) {
              echo "<td>" . implode('<br /> ', (array)$v) . "</td>";
           }
           echo '</tr>';
        }
        ?>
     </tbody>
  </table>
</html>

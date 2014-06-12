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
$mykeys = array('name','sku','category','color','size','currentPrice');
}
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="/test/css/search-results.css">
<script type="text/javascript" src="/test/js/tablesorter/jquery-latest.js"></script> 
<script type="text/javascript" src="/test/js/tablesorter/jquery.tablesorter.js"></script>
<script>
$(document).ready(function() 
    { 
        $("#myTable").tablesorter(); 
    } 
); 
</script> 
</head>
<div class="CSSTableGenerator"> 
<table id="myTable" class="tablesorter">
     <thead>
        <tr>
           <?php
        foreach($mykeys as $k) {
            if ($k == "name") {
              $k = "Name";
            }
            if ($k == "sku") {
              $k = "SKU";
            }
            if ($k == "category") {
              $k = "Category";
            }
            if ($k == "color") {
              $k = "Color";
            }
            if ($k == "size") {
              $k = "Size";
            }
            if ($k == "currentPrice") {
              $k = "Price";
            }
            echo "<th style='cursor:pointer'>$k<img src='/test/images/UpDown.png' width='8px' height='auto' style='margin: 0px 20px'></th>";
        }
        ?>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach($phpArray as $key => $values) {
            if ($values['category'] == 'UNCATEGORIZED') continue;
            if ($values['status'] == '') continue;
            echo '<tr>';
            foreach($mykeys as $k) {
                $value = $k == "currentPrice" ? '$' . number_format($values[$k]/100,'2') : $values[$k];
                echo "<td>" . $value . "</td>";
            }
            echo '</tr>';
        }
        ?>
     </tbody>
  </table>
  </div>
</html>
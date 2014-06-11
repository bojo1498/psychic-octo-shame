<?php
	include(dirname(__FILE__) . '/../inc/init.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf- 8" />
	<title>Check Your Account | The Loft Ames</title>
	<!--[if IE]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<link rel="stylesheet" type="text/css" href="popup.css"> 
    <link rel="stylesheet" type="text/css" href="../css/loft_fonts.css" />
	<link rel="stylesheet" type="text/css" href="../css/loft_style.css" />
	<link href="../admin/themes/css/bootstrap.min.css" rel="stylesheet">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style type="text/css">
body{
color:white;
}
a:link {
	color: #FFF;
	text-decoration: none;
}
a:visited {
	text-decoration: none;
	color: #FFF;
}
a:hover {
	text-decoration: none;
	color: #FFF;
}
a:active {
	text-decoration: none;
	color: #FFF;
}
td, th{
	padding:5px;
}
th{
	text-align:left;
}
.table-hover tbody tr:hover td, .table-hover tbody tr:hover th {
	background-color: #489D5D;
}
th{
	cursor:pointer;
}
</style>
</head>
<body>
<div id="DP01">
<br><br>
<center><h27>Customer Account</h27>
<br>
<a href="popup.php?page=account">Account Info</a> | <a href="popup.php?page=account-inventory">Inventory Details</a> | <a href="popup.php?page=account-sold">Items Sold</a>
</center>
<br>
<strong><h23>Customer Inventory</h23></strong>
<table id="rows" class="table table-hover table-condensed tablesorter">
<thead>
	<tr>
		<th id='ProductID'>ID</th>
		<th id='ProductType'>Type</th>
		<th id='ProductColor'>Color</th>
		<th id='ProductSize'>Size</th>
		<th id='ProductDescription'>Description</th>
		<th id='Price'>Price</th>
	</tr>
</thead>
<tbody>
<?php
$Consigner = new Database('consign.db');
$db = $Consigner->connectDB();
$qString = "SELECT Merchandise.ProductID, Merchandise.ProductType, Merchandise.ProductColor, Merchandise.ProductSize, Merchandise.ProductDescription, Merchandise.OrigPrice, Merchandise.Price, Merchandise.CustomerID, Merchandise.ExpireDate FROM (Merchandise LEFT OUTER JOIN InvDetails ON Merchandise.ProductID = InvDetails.ProductID) WHERE (InvDetails.ProductID IS NULL) AND (Merchandise.ExpireDate >= date('now')) and TransferInd = 'Available' AND (Merchandise.CustomerID = ?)";
/*
$qString = "SELECT ProductID, ProductType, ProductColor, ProductSize, ProductDescription, (Merchandise.OrigPrice + Merchandise.BuyersFee) as Price FROM Merchandise WHERE CustomerID = ? AND TransferDate is NULL ORDER BY ProductType";
*/
$data = array($_SESSION['user']['CustomerID']);
$q = $db->prepare($qString);
$q->execute($data);
$row = $q->fetchAll(PDO::FETCH_ASSOC);
$records = count($row);
foreach($row as $item){
	echo "<tr>";
	foreach(array("ProductID", "ProductType", "ProductColor", "ProductSize", "ProductDescription", "Price") as $col){
	if($col=="Price")
		echo "<td>$" . money_format('%i', $item[$col]) ."</td>";
	else
		echo "<td>" . $item[$col] ."</td>";
	}
	echo "</tr>";
}
?>
</tbody>
</table>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script type="text/javascript" src="/js/jquery.tablesorter.min.js"></script> 
<script type="text/javascript">
$(document).ready(function(){
	$("#rows").tablesorter(); 
});
</script>
<?php
include('footer.php');
?>
</body>
</html>
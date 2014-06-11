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
table{
	/* border: 1px solid white; */
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
<table class="text-left">
<tr>
<th colspan="2"><h23>Account Information</h23></th>
</tr>
<tr>
<th>CustomerID</th><td><?php echo $_SESSION['user']['CustomerID']; ?></td>
</tr>
<tr>
<th>Name</th><td><?php echo $_SESSION['user']['FirstName'] .' '. $_SESSION['user']['LastName']; ?></td>
</tr>
<tr>
<tr>
<th>Email</th><td><?php echo $_SESSION['user']['Email']; ?></td>
</tr>
<tr>
<th>Work Phone</th><td><?php echo $_SESSION['user']['WorkPhone']; ?></td>
</tr>
<tr>
<th>Home Phone</th><td><?php echo $_SESSION['user']['HomePhone']; ?></td>
</tr>
<th>Mailing Address</th><td><?php echo $_SESSION['user']['Address'] . "<br/>" . $_SESSION['user']['City'] . " " . $_SESSION['user']['State'] . ", " . $_SESSION['user']['ZipCode']; ?></td>
</tr>
<tr>
<th>Account Balance</th><td>$<?php echo money_format('%i', $_SESSION['user']['AccountBalance']); ?></td>
</tr>	
</table>
</div>
<?php
include('footer.php');
?>
</body>
</html>
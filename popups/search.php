<?php
	include(dirname(__FILE__) . '/../inc/init.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf- 8" />
	<title>Inventory | The Loft Ames</title>
	<!--[if IE]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<link rel="stylesheet" type="text/css" href="popup.css"> 
    <link rel="stylesheet" type="text/css" href="../css/loft_fonts.css" />
	<link rel="stylesheet" type="text/css" href="../css/loft_style.css" />
	<link href="../admin/themes/css/bootstrap.min.css" rel="stylesheet">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style type="text/css">
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
.form-search{
	text-align:left;
}
.table-hover tbody tr:hover td, .table-hover tbody tr:hover th {
background-color: black;
}
html, body { margin: 0; padding: 0; }
div#DP01 {
	position:relative;
	width:575px;
	/*margin: 0 auto;*/
}th{
	cursor:pointer;
}
</style>
</script>
</head>
<body>
<div id="layout">
<div id="DP01">
    <br><h27><center>Search Our Inventory at The Loft</center></h27><br>
<form action="/test/testphp1.php" method="post">
Search here: <input type="text" name="search"><br>
<input type="submit"><br>
<script type="text/javascript" src="jquery.min.js"></script>

<!--<a href="#" onclick="doSomething();">Click Me!</a>-->
</form>
<br><br>
<!-- <h27><center>View Our Current Inventory</center></h27>
<center>
<a href="#" onclick="getTableRecordsSearch('latest');">Show Latest Inventory</a>
</center> -->

<br><br>
<h31><center>Please contact us if you have any additional questions <a class="popup" href="/popups/contact.html"><strong>here.</strong></a><br>or call us 515-232-9053.</center></h31>
<br><br>
</div>

	</div>
	<?php
include('footer.php');
?>
</body>
</html>
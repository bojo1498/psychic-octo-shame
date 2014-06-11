<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf- 8" />
	<title>Contact | The Loft Ames</title>
	<!--[if IE]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<link rel="stylesheet" type="text/css" href="popup.css"> 
    <link rel="stylesheet" type="text/css" href="../css/loft_fonts.css" />
	<link rel="stylesheet" type="text/css" href="../css/loft_style.css" />
	<link href="../admin/themes/css/bootstrap.min.css" rel="stylesheet" />
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
.full-width{
	width:515px;
}
.input-width{
	width:300px;
}
</style>
</head>
<body>
<div id="DP01">
    <br><h27><center>Contact Us</center></h27><br><br>
	<center>
    <iframe width="532" height="250" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=408+Kellogg+Ave.+Ames,+Iowa+50010&amp;sll=37.0625,-95.677068&amp;sspn=48.822589,79.101563&amp;ie=UTF8&amp;z=14&amp;iwloc=addr&amp;ll=42.034632,-93.609524&amp;output=embed&amp;s=AARTsJqjQhDOy5LmQM58_QgzXdFp5TIHvw"></iframe>
	</center>
	<br />
	<div id="message-container"></div>
	<form action="/tools/mail.php" method="POST">
	<table>
	<tr>
    <td><h33>First Name:</h33>&nbsp;</td><td><input id="First_Name" name="First_Name" type="text" class="input-width" /></td>
    </tr>
	<tr>
	<td><h33>Last Name:</h33>&nbsp;</td><td><input id="Last_Name" name="Last_Name" type="text" class="input-width" /></td>
    </tr>
	<tr>
	<td><h33>Email:</h33>&nbsp;</td><td><input id="Email" name="Email" type="text" class="input-width" /></td>
    </tr>
	<tr>
	<td colspan="2"><h33>Questions or Comments:</h33></td>
	</tr>
	<tr>
	<td colspan="2"><textarea id="question" name="Question_or_Comment" class="full-width"></textarea></td>
	</tr>
	<tr>
	<input id="page" name="page" type="hidden" value="/popups/popup.php?page=contact-submit" />
    <td colspan="2"><button type="submit" class="btn btn-primary">Submit</button> <button class="btn btn-primary" type="reset">Cancel</button></td>
	</tr>
	</table>
	</form>
	<br />
	<div>
    <h33><center>Thank you for your inquiry!  We will try to review your comments as soon as possible and reply within 24 hours.  If for some reason you do not hear from us, please feel free to call the store 515-232-9053.
	</center></h33>
	</div>
</div>
<?php
include('footer.php');
?>
</body>
</html>
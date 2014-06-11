<?php
if (get_magic_quotes_gpc()) {//combine this for all settings for an output function
	echo stripslashes($_SESSION['settings']['trackingcode']);
}else{
	echo $_SESSION['settings']['trackingcode'];
}
?>
<?php
session_start();
//If not logged-in Login
//TODO: Make AJAX
if(($_GET['page'] == "account" || $_GET['page'] == "account-inventory" || $_GET['page'] == "account-sold") && $_SESSION['auth'] == false){
	header('Location: login.php');
}
else{
	header('Location: '. '/test/'.$_GET['page'].'.php');
}
?>
<?php
//session verification. If no session value page redirect to login.php
	include('config.php');
	session_start();
	$user_check=$_SESSION['user'];
 
	$ses_sql=mysql_query("select login from users where login='$user_check' ");
 
	$row=mysql_fetch_array($ses_sql);
 
	$login_session=$row['login'];
 
	if(!isset($login_session))
	{
	header("Location: login.php");
	}
?>
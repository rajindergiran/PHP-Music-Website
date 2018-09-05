<?php
session_start();
require_once 'loginclass.user.php';
$user = new USER();

if(!$user->is_logged_in())
{
	$user->redirect('loginindex.php');
}

if($user->is_logged_in()!="")
{
	$user->logout();	
	$user->redirect('index.php');
}
?>
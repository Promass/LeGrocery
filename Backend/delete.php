<?php
session_start();

if (isset($_SESSION["usernameonnavbar"]) && $_SESSION["usernameonnavbar"] == 'admin'){}
else {
    header("location: ../index.php");
}

	$id = $_GET['id'];

	$users = simplexml_load_file('files/user.xml');
	
	$position = 0;
	$i = 0;

	foreach($users->user as $user){
		if($user->id == $id){
			$position = $i;
			break;
		}
		$i++;
	}
	
	unset($users->user[$position]);
	file_put_contents('files/user.xml', $users->asXML());

	header('location: userlist.php');

?>
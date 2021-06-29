<?php
if(isset($_GET['q']))
{
	$id = $_GET['q'];
	include './getData.php';
	$getData = new getData();
	$getData->deleteDataById($id);
}
else
	header('Location: create-collection.php');

?>
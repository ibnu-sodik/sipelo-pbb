<?php 

session_start();

if (isset($_SESSION['SPUser'])) {
	$user_id = $_SESSION['SPUser'];
	$SQL = $mysqli->query("SELECT * FROM user WHERE id='$user_id'");
	$user_data = mysqli_fetch_assoc($SQL);
}

 ?>
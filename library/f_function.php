<?php 

function sanitize($dirty){
	return htmlentities($dirty, ENT_QUOTES,"UTF-8");
}

function display_errors($errors){
	
	foreach ($errors as $text) {
		$display = swal_error('Opps..!', $text, 'warning', '3000', true);
	}
	return $display;
}

function is_logged_in()
{
	if (isset($_SESSION['SPUser']) && $_SESSION['SPUser']>0) {
		return true;
	}
	return false;
}

function login($user_id)
{
	$_SESSION['SPUser'] = $user_id;
	global $mysqli;
	$date = date("Y-m-d H:i:s");
	$mysqli->query("UPDATE user SET last_login = '$date' WHERE id = '$user_id' ");
}

function has_permission($permission = 'Admin'){
	global $user_data;
	$permissions = explode(",", $user_data['hak_akses']);     
	if(in_array($permission, $permissions, true)) {         
		return true;     
	}
	return false; 
}

?>
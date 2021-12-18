<?php 

function base_url($url = null){
	$base_url = "http://localhost/gemilang-sma-pmd";
	// $base_url = "http://10.10.8.214/gemilang-sma-pmd/";
	if ($url != null) {
		return $base_url."/".$url;
	}else{
		return $base_url;
	}
}

 ?>
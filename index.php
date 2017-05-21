<?php

	include_once "system/libs/Main.php";
	include_once "system/libs/DController.php";
	include_once "system/libs/Load.php";
?>

<?php
	$url = isset($_GET['url'])?$_GET['url']:NULL;
	if ($url != NULl) {
		$url = rtrim($url,'/');
		$url = explode("/",filter_var($url,FILTER_SANITIZE_URL));
	} else {
		unset($url);
	}
	

	if (isset($url['0'])) {
		include_once 'app/controllers/'.$url['0'].'.php';
		$ctrl = new $url['0']();
		if (isset($url['2'])) {
			$ctrl->$url['1']($url['2']);
		} else {
			if (isset($url['1'])) {
				$ctrl->$url['1']();
			} else {
				# code...
			}
			
		}
		
	} else {
		include_once 'app/controllers/Index.php';
		$ctrl = new Index();
		$ctrl->home();
	}
	



?>

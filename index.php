<?php
	require_once $_SERVER['DOCUMENT_ROOT'] . "/class/FileClass.php";
	include $_SERVER['DOCUMENT_ROOT'] . "/elems/include.php";

	if (isset($_GET['page'])) {
		$page = $_GET['page'];
	} else {
		$page = 'main';
	}

	$path = "pages/$page.php";

	if (file_exists($path)) {
		$page = file_get_contents($path);
	} else {
		$page = file_get_contents("pages/404.php");
		//header("HTTP/1.0 404 Not Found");
	}

	$reg = '#\{\{title:(.*?)\}\}#';
	if (preg_match($reg, $page, $match)){
		$title = $match[1];
		$content = trim(preg_replace($reg, '', $page));
	} else {
		$title = '';
	}
	include 'elems/layout.php';
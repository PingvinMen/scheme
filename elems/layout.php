<!DOCTYPE html>
<html lang="ru">
<html>
	<head>
		<link rel="stylesheet" href="/elems/style.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<link rel="stylesheet" href="/elems/style.css">
		<title><?= $title ?></title>
	</head>
	<body>
		<header>
			<?php include 'elems/header.php'; ?>
		</header>
		<main>
			<?php
				include $path;
			?>
		</main>
		<footer>
			<?php include 'elems/footer.php'; ?>
		</footer>
	</body>
</html>
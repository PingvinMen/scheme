<div class="header">
	<div class="header-left">

	</div>
	<div class="header-center-left">
		<?php
		function createLink($href, $text){
			if ($_SERVER['REQUEST_URI'] == $href) {
				echo "<a href=\"$href\"class=\"header-button-active\">$text</a>";
			}else{
				echo "<a href=\"$href\"class=\"header-button\">$text</a>";
			}
		}
		?>
		<?= createLink('/?page=main', 'Главная'); ?>
		<?= createLink('/?page=client', 'Клиенты'); ?>
		<?= createLink('/?page=apartament', 'Квартиры'); ?>
		<?= createLink('/?page=client_apartament', 'Клиенты и квартиры'); ?>

	</div>
	<div class="header-right">

	</div>
</div>
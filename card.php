<?php
   	/* Запускаем сессию */
    session_start();
 
    /* Добавляем файл подключения к БД */
    require_once("db.php");
 
    /* Объявляем ячейку для добавления ошибок, которые могут возникнуть при обработке формы */
    $_SESSION["error_messages"] = "";
 
    /* Объявляем ячейку для добавления успешных сообщений */
    $_SESSION["success_messages"] = "";
?>  
  
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Строй-city</title>
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Roboto&family=Roboto+Condensed&family=Saira&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="style.css">
</head>
<body>
	
	<?php
		require_once("header.php");

		$label = 'id';
		$id = false;
		if (  !empty( $_GET[ $label ] )  )
		{
		  $id = $_GET[ $label ];
		}
		$labelc = 'idc';
		$idc = false;
		if (  !empty( $_GET[ $labelc ] )  )
		{
		  $idc = $_GET[ $labelc ];
		}

	?>

	<main class="card">

		<?php

		$result = mysqli_query($mysqli, "SELECT `catalog`.`name`, `collection`.`collection` FROM `catalog` LEFT OUTER JOIN `collection` ON `collection`.`id` = `catalog`.`collection` WHERE `catalog`.`id` = {$idc};");
		while($row = mysqli_fetch_assoc($result))
            {

		?>

		<h1 class="card__heading"><?php echo "{$row['collection']} {$row['name']}" ?></h1>

		<?php

		}

		?>

		<?php

		$result = mysqli_query($mysqli, "SELECT `name_product`, `picture` FROM `products` WHERE `products`.`id_product` = {$id};");
		while($row = mysqli_fetch_assoc($result))
            {

		?>

		<h2 class="card__subheading"><?php echo $row['name_product'] ?></h2>

		<section class="card__info">
			<div class="info__bordered">
				<?php echo '<img class="info__img" src = "data:image/png;base64,' . base64_encode($row['picture']) . '" width = "331px" height = "321px"/>'; ?>
				<?php

				}

				?>
			</div>
			<div class="info__wrapper">
				<div class="info__menu">
					<button class="info__menu__button info__menu__button--active">Характеристики</button>
					<div class="info__menu__divider"></div>
					<button class="info__menu__button">Комментарии (0)</button>
				</div>
				<br>
				<p class="info__text">

					<?php

					$result = mysqli_query($mysqli, "SELECT `catalog`.`name`, `collection`.`collection` FROM `catalog` LEFT OUTER JOIN `collection` ON `collection`.`id` = `catalog`.`collection` WHERE `catalog`.`id` = {$idc};");
					while($row = mysqli_fetch_assoc($result))
			            {

					?>

					<b class="info__text__bold">Коллекция:</b> <?php echo "{$row['collection']} {$row['name']}" ?>

					<?php

					}

					?>

				</p>
				<br><br>
				<?php

				$result = mysqli_query($mysqli, "SELECT `wear`, `size`, `weight`, `square` FROM `products` WHERE `products`.`id_product` = {$id};");
				while($row = mysqli_fetch_assoc($result))
		            {

				?>
				<p class="info__text">
					<b class="info__text__bold">Износостойкость:</b> <?php echo $row['wear'] ?>
				</p>
				<p class="info__text">
					<b class="info__text__bold">Размеры:</b> <?php echo $row['size'] ?> мм
				</p>
				<p class="info__text">
					<b class="info__text__bold">Площадь:</b> <?php echo $row['square'] ?>
				</p>
				<p class="info__text">
					<b class="info__text__bold">Вес:</b> <?php echo $row['weight'] ?>
				</p>

				<?php

				}

				?>

				<p>
					<button class="info__button">
						Добавить к сравнению
					</button>
				</p>
				<p>
					<button class="info__button">
						В избранное
					</button>
				</p>
			</div>
		</section>

		<section class="item__other">
			<h2 class="other__heading">Вам может понравиться</h2>
			<ul class="other__list">
				<li class="other__item">
					<a class="item__link" href="item.html">
						<h3 class="item__heading">Floorwood Balance</h3>
						<div class="item__img"><img src="img/floorwood-arte/floorwood-balance.jpg" alt=""></div>
					</a>
						<p class="item__text">
							Класс износостойкости: AC 5/33
						</p>
						<p class="item__text">
							Размер доски: 1216 х 198 х 8 мм
						</p>
						<p class="item__text">
							Количество: 8 досок
							<br>
							Площадь: 1,9261 м2
							<br>
							Вес: 13,8 кг
						</p>
				</li>
				<li class="other__item">
					<a class="item__link" href="#">
						<h3 class="item__heading">Floorwood Epica</h3>
						<div class="item__img"><img src="img/floorwood-arte/floorwood-epica.jpg" alt=""></div>
					</a>
					<p class="item__text">
						Класс износостойкости: AC 5/33
					</p>
					<p class="item__text">
						Размер доски: 1380 х 193 х 8 мм
					</p>
					<p class="item__text">
						Количество: 8 досок
						<br>
						Площадь: 2,13 м2
						<br>
						Вес: 15 кг
					</p>
				</li>
			</ul>
		</section>
	</main>

	<footer class="footer-secondary">
        <hr class="footer-secondary__line">
        <p class="footer-secondary__map">Карта сайта</p>
        <p class="footer-secondary__text">© 2020 StroyCity.ru. Все права защищены.</p>
        <p class="footer-secondary__text">Joomla! - бесплатное программное обеспечение, распространяемое по лицензии GNU General Public License.</p>
    </footer>
    <p class="water">Фабрика IT-решений. Московский политех 2021</p>
</body>
</html>
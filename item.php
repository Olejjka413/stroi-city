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

	?>

	<main class="item">

		<?php

		$result = mysqli_query($mysqli, "SELECT `catalog`.`id`, `catalog`.`name`, `catalog`.`description`, `catalog`.`picture`, `catalog`.`picture_big`, `collection`.`collection` FROM `catalog` LEFT OUTER JOIN `collection` ON `collection`.`id` = `catalog`.`collection` WHERE `catalog`.`id` = {$id};");
		while($row = mysqli_fetch_assoc($result))
            {

		?>

		<h1 class="item__heading"><?php echo "{$row['collection']} {$row['name']}" ?></h1>

		<section class="item__info">
			<div class="gallery">
				<div class="gallery__wrapper">

					<!-- <img class="gallery__img" src="img/floorwood-arte/gallery.jpg" alt=""> -->
					<?php echo '<img class="gallery__img" src = "data:image/png;base64,' . base64_encode($row['picture_big']) . '" width = "500px" height = "320px"/>'; ?>

					<button class="gallery__button gallery__button__back">
						<svg width="45" height="30" viewBox="0 0 45 30" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M0.581214 13.7262C-0.197307 14.5097 -0.193217 15.7761 0.590349 16.5546L13.3593 29.2413C14.1429 30.0199 15.4092 30.0158 16.1877 29.2322C16.9663 28.4486 16.9622 27.1823 16.1786 26.4038L4.8284 15.1267L16.1055 3.77648C16.884 2.99292 16.8799 1.72659 16.0964 0.948071C15.3128 0.169549 14.0465 0.173639 13.268 0.957207L0.581214 13.7262ZM44.0409 13L1.99353 13.1358L2.00645 17.1358L44.0538 17L44.0409 13Z" fill="black"/>
						</svg>
					</button>
					<button class="gallery__button gallery__button__forward">
						<svg width="50" height="31" viewBox="0 0 50 31" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M48.5499 16.9142C49.331 16.1332 49.331 14.8668 48.5499 14.0858L35.822 1.35786C35.0409 0.576816 33.7746 0.576816 32.9936 1.35786C32.2125 2.13891 32.2125 3.40524 32.9936 4.18629L44.3073 15.5L32.9936 26.8137C32.2125 27.5948 32.2125 28.8611 32.9936 29.6421C33.7746 30.4232 35.0409 30.4232 35.822 29.6421L48.5499 16.9142ZM0.864746 17.5H47.1357V13.5H0.864746V17.5Z" fill="black"/>
						</svg>
					</button>
				</div>
			</div>
			<ul class="nav">
				<li class="nav__item">
					<a class="nav__item__link" href="#">Описание</a>
				</li>
				<li class="nav__item">
					<a class="nav__item__link" href="#">Характеристики</a>
				</li>
				<li class="nav__item">
					<a class="nav__item__link" href="#">Файлы</a>
				</li>
			</ul>
			<p class="description">
				<?php echo $row['description'] ?>
			</p>
		</section>

		<?php 

            }

        ?> 

		<hr class="item__line">
		<section class="item__products">
			<ul class="products">
				<?php

				$result = mysqli_query($mysqli, "SELECT `catalog`.`id`, `products`.`name_product`, `products`.`id_product`, `products`.`wear`, `products`.`size`, `products`.`weight`, `products`.`square`, `products`.`structure`, `products`.`picture`, `products`.`chamfer`, `catalog`.`name`, `collection`.`collection` FROM `products` 
												LEFT OUTER JOIN `catalog` ON `products`.`collection_name` = `catalog`.`id` 
												LEFT OUTER JOIN `collection` ON `catalog`.`collection` = `collection`.`id`
												WHERE `products`.`collection_name` = {$id};");
				while($row = mysqli_fetch_assoc($result))
		            {

				?>
				<li class="products__item">
					<div class="products__item__wrapper-desc">
						<div class="products__item__img">
							<?php echo '<img src = "data:image/png;base64,' . base64_encode($row['picture']) . '" width = "239px" height = "264px"/>'; ?>
						</div>
						<div class="products__item__info">
							<a href="card.php?id=<?php echo "{$row['id_product']}" ?>&idc=<?php echo "{$row['id']}" ?>">
								<h2 class="info__heading"><?php echo $row['name_product'] ?></h2>
							</a>
							<div>
								<p class="info__text">
									<b class="info__text__bold">Износостойкость:</b> <?php echo $row['wear'] ?>
								</p>
								<p class="info__text">
									<b class="info__text__bold">Размеры:</b> <?php echo $row['size'] ?> мм
								</p>
								<p class="info__text">
									<b class="info__text__bold">Вес:</b> <?php echo $row['weight'] ?>
								</p>
								<p class="info__text">
									<b class="info__text__bold">Площадь:</b> <?php echo $row['square'] ?>
								</p>
								<p class="info__text">
									<b class="info__text__bold">Структура:</b> <?php echo $row['structure'] ?>
								</p>
								<p class="info__text">
									<b class="info__text__bold">Фаска:</b> <?php echo $row['chamfer'] ?>
								</p>
							</div>
							<div>
								<a class="products__item__link" href="#">Подробнее</a>
								<br>
								<p class="products__item__link-text">Коллекция: 
									<a class="products__item__link" href="item.php?id=<?php echo "{$row['id']}" ?>">
										<?php echo "{$row['collection']} {$row['name']}" ?>
									</a>
								</p>
							</div>
						</div>
					</div>
					<div class="products__wrapper-buttons">
						<button type="button">Добавить к сравнению</button>
						<button type="button">В избранное</button>
					</div>
				</li>

				<?php 

		        }
		        mysqli_close($mysqli);

		        ?>

			</ul>
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
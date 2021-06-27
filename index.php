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
	?>

	<main>
		<section class= "catalogs">
			<h2 class ="catalogs__heading">Каталоги</h2>
	
			<div class="catalogs__wrapper stroi__wrapper">
				<div class="figure__stroi">
					<p class="figure__stroi__heading">Каталог</p>
					<p class="figure__stroi__heading">строй-сити 2019</p>
					<p class="figure__stroi__number">1000</p>
					<p class="figure__stroi__text">товаров</p>
				</div>
	
				<div class="stroi__text-wrapper">
				<p class="stroi__text catalogs__p">	Наша компания предлагает оптом и в розницу отделочные материалы 
					ведущих зарубежных и российских производителей, таких как Floorwood, 
					Balterio, Classen, Kronospan, Kronostar и многих других.</p>
				<p class="stroi__text catalogs__p">	Среди всего многообразия представленных товаров вы легко сможете 
					подобрать себе ламинированный паркет, паркетную доску, стеновые 
					панели МДФ и ПВХ, вагонку, сайдинг, подвесные потолки, осветительное 
					оборудование, подложку под ламинат оптом и в розницу...</p>
				</div>
			</div>
	
			<div class="catalogs__wrapper balterio__wrapper">
	
				<p class="balterio__text catalogs__p">Знание запросов и потребностей наших клиентов позволило создать уникальный 
					комплекс обслуживания: высокое качество продукции, приемлемые цены и 
					широкий спектр услуг. Главной составляющей успешной деятельности и 
					конкурентоспособности нашей компании является эффективная работа
					специалистов, преданных своему делу и максимально учитывающих ваши 
					потребности.</p>
	
				<div class="figure__balterio">
					<p class="figure__balterio__heading">Каталог</p>
					<p class="figure__balterio__heading">balterio 2019</p>
					<p class="figure__balterio__number">126</p>
					<p class="figure__balterio__text">категорий</p>
				</div>
			</div>
	
		</section>
	
		<section class="news">
			<h2 class="news__heading">Новости</h2>
			<ul class="news__list">
				
				<!-- ШАБЛОН НОВОСТЕЙ -->
				<!-- 
				<li class="news__item">
					<a href="#">
						<div class="news__bordered">
							<img src="img/news-1.jpg" alt="">
						</div>
						<p>
							Очень важная информация о данном 
							сегменте блока новостей
						</p>
						<span>
							Читать подробнее...
						</span>
					</a>
				</li> 
				-->
				
				<!-- 1 СПОСОБ - начало -->
				<?php 

				$result = mysqli_query($mysqli, "SELECT `id`, `topic`, `article`, `picture` FROM `news`");
				while($row = mysqli_fetch_assoc($result))
				{

				?>

				<li class="news__item">
					<a href="index.php?page=news&id=<?php echo $row['id']; ?>" title="Строй-city | Статья <?php echo $row['id']; ?>">
						<div class="news__bordered">
							<?php echo '<img src = "data:image/png;base64,' . base64_encode($row['picture']) . '" width = "300px" height = "300px"/>'; ?>
						</div>
						<p>
							<?php echo $row['topic']; ?>
						</p>
						<span>
							Читать подробнее...
						</span>
					</a>
				</li> 

				<?php 

				}
				mysqli_close($mysqli);

				?>
				<!-- 1 СПОСОБ - конец -->

				<!-- 2 СПОБОС - начало -->
				<?php
		  		/*
		  		$result = mysqli_query($mysqli, "SELECT `id`, `topic`, `article`, `picture` FROM `news`");
				while($row = mysqli_fetch_assoc($result))
				{
					echo '<li class="news__item">'; 
						echo '<a href="#">';
							echo '<div class="news__bordered">';
				    			echo '<img src = "data:image/png;base64,' . base64_encode($row['picture']) . '" width = "300px" height = "300px"/>';
				    		echo '</div>';
				    		echo "<p>{$row['topic']}</p>";
				    		echo '<span>Читать подробнее...</span>';
				    	echo '</a>';
				    echo '</li>';
				}

				mysqli_close($mysqli);
				*/
				?>
				<!-- 2 СПОСОБ - конец -->

			</ul>
			<ul class="pagination">
				<li><a href="#">1</a></li>
				<li><a href="#">2</a></li>
				<li><a href="#">3</a></li>
				<li><a href="#">4</a></li>
				<li><a href="#">5</a></li>
				<li><a href="#">6</a></li>
				<li><a href="#">7</a></li>
				<li><a href="#">8</a></li>
				<li><a href="#">9</a></li>
			</ul>
		</section>
		<section class="our-catalogs">
			<h2 class="our-catalogs__heading">Наши каталоги</h2>
			<ul class="our-catalogs__list">
				<li class="our-catalogs__item">
					<div>
						<h3 class="our-catalogs__item__heading">Каталог Строй-city 2021</h3>
						<img src="img/image 36stroi.jpg" class="our-catalogs__img">
						<button class="our-catalogs__button">Скачать</button>
					</div>
				</li>
				<li class="our-catalogs__item"><div>
					<h3 class="our-catalogs__item__heading">Каталог Balterio 2019</h3>
					<img src="img/image 37balt.jpg" class="our-catalogs__img">
					<button class="our-catalogs__button">Скачать</button>
				</div></li>
				<li class="our-catalogs__item"><div>
					<h3 class="our-catalogs__item__heading">Каталог Leoline 2020</h3>
					<img src="img/image 38leoline.jpg" class="our-catalogs__img">
					<button class="our-catalogs__button">Скачать</button>
				</div></li>
			</ul>
		</section>
		<section class="index-contacts">
			<h2 class="index-contacts__heading">Контакты</h2>
			<select class="location">
				<option class="location__option location__option--disabled" disabled selected hidden>Выберите город</option>
				<option class="location__option" value="moscow">Москва</option>
				<option class="location__option" value="spb">Санкт-Петербург</option>
			</select>
		</section>
		<section class="moscow">
			<div class="moscow__wrapper">
				<h2 class="moscow__heading">Москва</h2>
				<div class="moscow__flex">
					<section class="moscow__address-phones">
						<p class="margin-30">
							Адрес: 
							<a href="#">Ленинградское шоссе, д. 57, корп. 2</a>
						</p>
						<p>
							Телефон торгового зала: 
							<a href="tel:+79255906638">+7 (925) 590-66-38</a>
						</p>
						<p>
							Телефон московского отдела: 
							<a href="tel:74957857160">+7 (495) 785-71-60 </a>
						</p>
						<p>
							Телефон регионального отдела: 
							<a href="tel:74956269082">+7 (495) 626-90-82,</a>
							<a href="tel:74956269086">+7 (495) 626-90-86</a>
						</p>
					</section>
					<section class="moscow__emails">
						<h3 class="margin-30">Электронная почта:</h3>
						<p>
							Торговый зал: 
							<a href="mailto:torgzal@stroycity.ru">torgzal@stroycity.ru</a>
						</p>
						<p>
							Служба поддержки продаж: 
							<a href="mailto:spp@stroycity.ru">spp@stroycity.ru</a>
						</p>
						<p>
							Отдел закупок: 
							<a href="zakupki@stroycity.ru">zakupki@stroycity.ru</a>
						</p>
					</section>
				</div>
				<section class="moscow__rechnoi">
					<h3 class="margin-30">Время работы торгового зала "Речной Вокзал":</h3>
					<p>ПН-ПТ: с 9.00 до 18.00</p>
					<p>СБ,ВС: выходной</p>
				</section>
				<section class="moscow__podolsk">
					<h3 class="margin-30">Время работы торгового зала в Подольске:</h3>
					<p>ПН-СБ: с 9.00 до 18.00</p>
					<p>ВС: выходной</p>
				</section>
			</div>
			<section class="moscow__map">
				<img src="img/map.jpg" alt="карта">
				<a class="moscow__map__gps">
					Координаты для GPS навигатора: 
					55.854963, 37.465622
				</a>
			</section>
		</section>
	</main>
	<p class= "water">Фабрика IT-решений. Московский политех, 2021</p>
</body>
</html>
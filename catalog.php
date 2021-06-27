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
	<title>Строй-city | Каталог</title>
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Roboto&family=Roboto+Condensed&family=Saira&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="style.css">
</head>
<body>

    <?php
        require_once("header.php");
    ?>

    <h1 class="catalog__heading">Ламинат</h1>
    <div class="catalog__filter">
        <select onсhange="location.href=this.value">
            <option value="all">Все коллекции</option>
            <option value="Floorwood">Floorwood</option>
            <option value="Balterio">Balterio</option>
            <option value="Kronostar">Kronostar</option>
            <option value="Family">Family</option>
            <option value="Kronopool">Kronopool</option>
            <option value="Kronoflooring">Kronoflooring</option>
            <option value="FAUS">FAUS</option>
        </select>
    </div>
    <section class="products">

        <?php 

        $result = mysqli_query($mysqli, "SELECT `id`, `collection` FROM `collection` ORDER BY `collection`.`id` ASC");
        while($row = mysqli_fetch_assoc($result))
        {

        ?>

            <h2 id="<?php echo $row['collection'] ?>" class="products__heading"><?php echo $row['collection'] ?></h2>
            <ul class="products__list">
                
            <?php 

            //$resultt = mysqli_query($mysqli, "SELECT `id`, `collection`, `name`, `description`, `picture` FROM `catalog` ORDER BY `collection` ASC");
            $resultt = mysqli_query($mysqli, "SELECT `catalog`.`id`, `catalog`.`name`, `catalog`.`description`, `catalog`.`picture`, `collection`.`collection` FROM `catalog` LEFT OUTER JOIN `collection` ON `collection`.`id` = `catalog`.`collection` WHERE `catalog`.`collection` = {$row['id']};");
            while($roww = mysqli_fetch_assoc($resultt))
            {

            ?>

                <li>
                    <a href="item.php?id=<?php echo $roww['id'] ?>">
                        <div class="bordered">
                            <?php echo '<img class="bordered__img" src = "data:image/png;base64,' . base64_encode($roww['picture']) . '" width = "200px" height = "200px"/>'; ?>
                        </div>
                    </a>
                </li>

            <?php 

            }

            ?> 

            </ul>

        <?php 

        }
        mysqli_close($mysqli);

        ?>

    </section>

    <section class="catalog__info">
        <div class="catalog__info-wrapper info">
            <ul class="info__topics">
                <li class="info__topic"><button>Преимущества и виды</button></li>
                <li class="info__topic"><button>Где купить ламинат</button></li>
                <li class="info__topic"><button>32 класс</button></li>
                <li class="info__topic"><button>33 класс</button></li>
            </ul>
            <svg class="info__divider" width="120" height="993" viewBox="0 0 120 993" fill="none" xmlns="http://www.w3.org/2000/svg">
                <line x1="60.5" y1="6.55671e-08" x2="60.5" y2="384" stroke="#F6F3FF" stroke-opacity="0.7" stroke-width="3"/>
                <line x1="60.5" y1="568" x2="60.5" y2="993" stroke="#F6F3FF" stroke-opacity="0.7" stroke-width="3"/>
                <line x1="118.661" y1="362.061" x2="1.06075" y2="479.661" stroke="#F6F3FF" stroke-opacity="0.7" stroke-width="3"/>
                <line x1="118.661" y1="400.461" x2="1.06075" y2="518.061" stroke="#F6F3FF" stroke-opacity="0.7" stroke-width="3"/>
                <line x1="118.661" y1="442.061" x2="1.06075" y2="559.661" stroke="#F6F3FF" stroke-opacity="0.7" stroke-width="3"/>
                <line x1="118.661" y1="480.461" x2="1.06075" y2="598.061" stroke="#F6F3FF" stroke-opacity="0.7" stroke-width="3"/>
                </svg>
                
            <div class="info__description">
                <h3>Почему ламинат наиболее востребованное напольное покрытие?</h3>
                <p>В настоящее время мы предлагаем купить ламинат в Москве и других городах России на действительно выгодных условиях, такой тип продукции обязательно станет основной для начала нового бизнеса или усиления своих позиций на рынке строительно-отделочных материалов. Многие, кто обращается к нам, предпочитают купить ламинат оптом, ведь данный материал:</p>
                <ol>
                    <li> Обладает всеми качествами, необходимыми для сопротивляемости различным рабочим нагрузкам.</li>
                    <li> Не требует дополнительных затрат для обслуживания и ухода.</li>
                    <li> Сохраняет структуру и внешний вид на протяжении длительного времени, ему не страшны даже обильные солнечные лучи и воздействие других внешних факторов.</li>
                </ol>
                <p>Покупка ламината от производителя оптом обладает и другими положительными качествами, о которых вы можете узнать, связавшись с нашими специалистами по телефону (495) 626-90-82 или (495) 542-22-40.</p>
                <h3>Какие разновидности ламината мы предлагаем?</h3>
                <p>В настоящее время вы можете купить ламинат в любом количестве прямо со склада компании «Строй-Сити», причем одинаково популярными являются две основные группы данного напольного материала:</p>
                <ul>
                    <li>Бытовой. Такой ламинат оптом предпочитают приобретать строительные и ремонтные компании, работающие с владельцами квартир, частных домов, загородных коттеджей. Здесь нужно помнить, что класс прочности в данном случае не превышает 31.</li>
                    <li>Коммерческий. В Москве ламинат этой группы пользуется стабильно высоким спросом, ведь с его помощью оснащаются многие офисные помещения, развлекательные и другие учреждения. Класс прочности составляет 32 – 33.</li>
                </ul>
                <p> Также продажа ламината большим и мелким оптом подразумевает сотрудничество с разными производителями, продукция которых отличается по цене, эксплуатационным характеристикам и внешнему оформлению.</p>
            </div>
        </div>
    </section>


    <footer class="footer-secondary">
        <hr class="footer-secondary__line">
        <p class="footer-secondary__map">Карта сайта</p>
        <p class="footer-secondary__text">© 2020 StroyCity.ru. Все права защищены.</p>
        <p class="footer-secondary__text">Joomla! - бесплатное программное обеспечение, распространяемое по лицензии GNU General Public License.</p>
    </footer>
    <p class="water">Фабрика IT-решений. Московский политех 2021</p>
</body>
</html>
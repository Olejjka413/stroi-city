<main>
	<?php 

	$result = mysqli_query($mysqli, "SELECT `id`, `topic`, `article`, `picture` FROM `news`");
	while($row = mysqli_fetch_assoc($result))
	{

	?>

	<li class="news__item">
		<div class="news__bordered">
			<?php echo '<img src = "data:image/png;base64,' . base64_encode($row['picture']) . '" width = "300px" height = "300px"/>'; ?>
		</div>
		<p>
			<?php echo $row['topic']; ?>
		</p>
		<p>
			<?php echo $row['article'] ?>
		</p>
	</li> 

	<?php

	}
	mysqli_close($mysqli);

	?>

</main>
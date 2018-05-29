<!DOCTYPE html>
<html lang="ru">
<head>
  <title>Оценка своего дня</title>
  <!-- Базовая мета-информация
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <meta charset="utf-8">
  <meta name="description" content="">
  <meta name="author" content="">
  <!-- Область просмотра для мобильных
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Шрифт Roboto с Google Fonts
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,700&subset=latin,Cyrillic" rel="stylesheet" type="text/css">
  <!-- CSS
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/skeleton.css">
  <link rel="stylesheet" href="css/styles.css">
  <!-- Иконка
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link rel="icon" type="image/png" href="images/favicon.png">
  <!-- JavaScript -->
  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/script.js"></script>
  
</head>
<body>
     <div class="container">
          <div class="row main">
				<p class="rateDay">Оцените свой день!</p>
				<ul class="ratingValuesList">
					<li><button class="ratingValue" value="0">0</button></li>
					<li><button class="ratingValue" value="1">1</button></li>
					<li><button class="ratingValue" value="2">2</button></li>
					<li><button class="ratingValue" value="3">3</button></li>
					<li><button class="ratingValue" value="4">4</button></li>
					<li><button class="ratingValue" value="5">5</button></li>
					<li><button class="ratingValue" value="6">6</button></li>
					<li><button class="ratingValue" value="7">7</button></li>
					<li><button class="ratingValue" value="8">8</button></li>
					<li><button class="ratingValue rainbow" value="9">9</button></li>
				</ul>
				<div class="flex">
					<input type="text" placeholder="Комментарий(макс 50)" class="comment" maxlength="50">
					<button class="send">Оценить</button>
				</div>
          </div>
		  <div class="row">
			<div class="ratingOfDays">
				<ul>
					<?php
						echo $dayDataController->echoDataAsHTML();
					?>
				</ul>
			</div>
		  </div>
     </div>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Оценка своего дня</title>
  <!-- Basic Page Needs
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <meta charset="utf-8">
  <meta name="description" content="">
  <meta name="author" content="">
  <!-- Mobile Specific Metas
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- FONT
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,700&subset=latin,Cyrillic" rel="stylesheet" type="text/css">
  <!-- CSS
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/skeleton.css">
  <link rel="stylesheet" href="css/styles.css">
  <!-- Favicon
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link rel="icon" type="image/png" href="images/favicon.png">
  <!--Script -->
  <script src="jquery-3.3.1.min.js"></script>
  <script src="Js.js"></script>
  
</head>
<body>
     <div class="container">
          <div class="row main">
				<p class="assessDay">Оцените свой день!</p>
				<ul class="marks">
					<li><button class="mark" value="0">0</button></li>
					<li><button class="mark" value="1">1</button></li>
					<li><button class="mark" value="2">2</button></li>
					<li><button class="mark" value="3">3</button></li>
					<li><button class="mark" value="4">4</button></li>
					<li><button class="mark" value="5">5</button></li>
					<li><button class="mark" value="6">6</button></li>
					<li><button class="mark" value="7">7</button></li>
					<li><button class="mark" value="8">8</button></li>
					<li><button class="mark rainbow" value="9">9</button></li>
				</ul>
				<div class="flex">
				<input type="text" placeholder="Комментарий(макс 50)" class="comment" maxlength="50">
				<button class="send">Оценить</button>
				</div>
          </div>
		  <div class="row">
			<div class="marksOfDays">
				<ul>
					$result
				</ul>
			</div>
		  </div>
     </div>
</body>
</html>

<?php
//Данные для подключения к БД
$site = 'localhost';
$db = 'grade';
$user = 'Jtaugner';
$pass = 'bugoga';
//Устанавливаем соединение
$link = mysqli_connect($site, $user, $pass , $db);
//Устанавливаем кодировку
mysqli_set_charset($link, "utf8");
//Результаты прошедших дней
$result = "";
if($sql = mysqli_query($link, "SELECT * FROM marks ORDER BY date DESC")) {
	$num_rows = mysqli_num_rows($sql);
	for($i = 0; $i < $num_rows; $i++){
		mysqli_data_seek($sql, $i);
		$row = mysqli_fetch_array($sql, MYSQLI_ASSOC);
		$result .= "<li>День <span class='day'> " . $row['date'] . '</span>. Оценка: <span class="grade">' .
		$row['mark'] . '</span> - ' . $row['comment'] . "</li>";
	}
};
//Если отосланы данные,
//Добавление данных в БД
if(isset($_POST['mark']) && isset($_POST['comment'])){
	$mark = $_POST['mark'];
	$comment = sanitizeString($link, $_POST['comment']);
	if(preg_match('/^\d$/', $mark) && strlen($comment) < 51){
		$date = date('Y-m-d');
		$sql = mysqli_query($link, "INSERT INTO marks(id, date, mark, comment) VALUES('0','$date','$mark', '$comment')");
		$str = "<li>День <span class='day'> " . $date . '</span>. Оценка: <span class="grade">' .
		$mark . '</span> - ' . $comment . "</li>";
		header('Content-Type: text/plain');
		echo $str ;
	}
}else{
	//HTML код
	echo <<<_END
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
_END;
}
//Безопасность
function sanitizeString($link, $str) {
	echo 'Разработчики пидоры'
}

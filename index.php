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
	require_once('templates/index.html');
}
//Безопасность
function sanitizeString($link, $str) {
	$str = stripcslashes($str);
	$str = strip_tags($str); 
	$str = htmlentities($str);
	$str = mysqli_real_escape_string ($link ,$str); 
	return $str; 
}

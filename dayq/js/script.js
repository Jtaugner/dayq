$(function () {
	/*Выбор оценки*/
   $(".ratingValue").click(function(){
	   $(".ratingValue").toggleClass('getMark', false);
	   $(this).toggleClass('getMark');
   });
   /*Отправить*/
   let send = function(){
	  /*Получаем массив классов getMark для проверок*/
	  let arr = $(".getMark");
	  let val = $(".getMark").val(); //Выбранная оценка
	  if(arr.length > 1){
		  alert("Ты сменил класс через код? Пфф, не удивил");
	  }/*Проверка на смену value */
	  else if(/^\d$/.test(val)){
		  let comment = $(".comment").val();
		  /*Проверка на длину комментария */
		  if(comment.length > 50){
			  alert("Ну длинный коммент :(")
		  }//Отправка данных на сервер
		  else{
			  $(".send").text("Отменить (5c)");
			  $(".send").toggleClass("cancel", true);
			  $(".send").toggleClass("send", false);
			  $('.cancel').unbind('click');
			  //Отменить действие
			  $(".cancel").click(function(){
				  for(let i = 0; i < timeoutId.length; i++){
					  clearTimeout(timeoutId[i]);
				  }
				  $(".cancel").toggleClass("send", true);
				  $(".send").toggleClass("cancel", false);
				  $(".send").click(send);
				  $(".send").text("Отправить");
			  });
			  let timeoutId = [];
			  for(let i = 4, time = 1000; i > 0; i--, time += 1000){
				  timeoutId.push(setTimeout(()=> {
							$(".cancel").text("Отменить (" + i + "с)");
					  }, time));
			  }
			  timeoutId.push(setTimeout(()=> {
							$(".cancel").text("Отменить (" + 0 + "с)");
							$.post("engine/ajax/adddaydata.php", {rating: val, comment: comment}, function(data){
								$(".ratingOfDays ul").prepend(data);
							});
							$(".cancel").text("Победа!");
				  }, 5000));
		  }
	  }else{
		  console.log("Ну где-то ты пытаешься меня обмануть.. Попробуй ещё раз!");
	  }
   }
   $(".send").click(send);
});
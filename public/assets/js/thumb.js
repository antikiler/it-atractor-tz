var $ = jQuery.noConflict();
// Максимальное количество загружаемых изображений за одни раз
var maxFiles_thumb = 1;

var main_block_name_thumb = '.thumb_block ';

// Оповещение по умолчанию
var errMessage_thumb = 0;

// Кнопка выбора файлов
var defaultUploadBtn_thumb = $(main_block_name_thumb+'#uploadbtn');

$(document).on('keypress','#href_name_thumb',function (e){
		
		if (e.keyCode==13) {
			var img_href = $('#href_name_thumb').val();
			if (img_href !='') {
				var img_href_rand_name = randomNumber(1, 12548);
				dataArray_thumb.length=0;
				dataArray_thumb.push({
						name: 'img',
						value: img_href,
						id_pic: img_href_rand_name,
						old: 0,
						type_img: 1,
					}
				);
				
				$(main_block_name_thumb+'#uploaded-holder').show();
				$(main_block_name_thumb+'#dropped-files > .image').remove();
				addImage_thumb((dataArray_thumb.length - 1));
				$('#href_name_thumb').val('');
				
			}
		}
			
	});

	// Область информер о загруженных изображениях - скрыта
	$(main_block_name_thumb+'#uploaded-files').hide();
	
	// Метод при падении файла в зону загрузки
	$(main_block_name_thumb+'#drop-files').on('drop', function(e) {	
		// Передаем в files все полученные изображения
		var files = e.dataTransfer.files;
		if (files.length <= maxFiles_thumb) {
			// Передаем массив с файлами в функцию загрузки на предпросмотр
			dataArray_thumb.length=0;
			addImage_thumb(-1);
			loadInView_thumb(files);
			$(main_block_name_thumb+'#dropped-files > .image').remove();
		}else{
			alert('Вы не можете загружать больше '+maxFiles_thumb+' изображений!'); 
			files.length = 0;
		}
		

	});
	
	// При нажатии на кнопку выбора файлов
	defaultUploadBtn_thumb.on('change', function() {
   		// Заполняем массив выбранными изображениями
   		var files = $(this)[0].files;
   		if (files.length <= maxFiles_thumb) {
	   		
			// Передаем массив с файлами в функцию загрузки на предпросмотр
			dataArray_thumb.length=0;
			addImage_thumb(-1);
			loadInView_thumb(files);
			$(main_block_name_thumb+'#dropped-files > .image').remove();
			
			// Очищаем инпут файл путем сброса формы
	        $(main_block_name_thumb+'#frm').each(function(){
	        	    this.reset();
			});
		}else{
			alert('Вы не можете загружать больше '+maxFiles_thumb+' изображений!'); 
			files.length = 0;
		}
		
	});
	
	// Удаление только выбранного изображения 
	$(main_block_name_thumb+"#dropped-files").on("click","a[id^='drop']", function() {
		// получаем название id
 		var elid = $(this).attr('id');
		// создаем массив для разделенных строк
		var temp = new Array();
		// делим строку id на 2 части
		temp = elid.split('-');
		// получаем значение после тире тоесть индекс изображения в массиве
		dataArray_thumb.splice(temp[1],1);
		// Удаляем старые эскизы
		$(main_block_name_thumb+'#dropped-files > .image').remove();
		// Обновляем эскизи в соответсвии с обновленным массивом
		addImage_thumb(-1);		
	});
      
	
	// Простые стили для области перетаскивания
	$(main_block_name_thumb+'#drop-files').on('dragenter', function() {
		$(this).css({'box-shadow' : 'inset 0px 0px 20px rgba(0, 0, 0, 0.1)', 'border' : '2px dashed #bb2b2b'});
		return false;
	});
	
	$(main_block_name_thumb+'#drop-files').on('drop', function() {
		$(this).css({'box-shadow' : 'none', 'border' : '2px dashed rgba(0,0,0,0.2)'});
		return false;
	});
	
	// Функция загрузки изображений на предросмотр
	function loadInView_thumb(files) {
		// Показываем обасть предпросмотра
		$(main_block_name_thumb+'#uploaded-holder').show();
		
		// Для каждого файла
		$.each(files, function(index, file) {
						
			// Несколько оповещений при попытке загрузить не изображение
			if (!files[index].type.match('image.*')) {
				
				if(errMessage_thumb == 0) {
					$('#drop-files p').html('Эй! только изображения!');
					++errMessage_thumb
				}
				else if(errMessage_thumb == 1) {
					$('#drop-files p').html('Стоп! Загружаются только изображения!');
					++errMessage_thumb
				}
				else if(errMessage_thumb == 2) {
					$('#drop-files p').html("Не умеешь читать? Только изображения!");
					++errMessage_thumb
				}
				else if(errMessage_thumb == 3) {
					$('#drop-files p').html("Хорошо! Продолжай в том же духе");
					errMessage_thumb = 0;
				}
				return false;
			}
			
			// показываем область с кнопками
		    $(main_block_name_thumb+'#upload-button').css({'display' : 'block'});
		
			
			// Создаем новый экземпляра FileReader
			var fileReader = new FileReader();
				// Инициируем функцию FileReader
				fileReader.onload = (function(file) {

					if (file.size < 10000000) {
					
					return function(e) {
						var thumb_id = randomNumber(1, 12548);
						dataArray_thumb.push({
											name : file.name, 
											value : this.result,
											old: 0,
											type_img: 0,
											id_pic:thumb_id
										});
						addImage_thumb((dataArray_thumb.length-1));
					}; 
					}else{
						alert('Изображения с именем '+file.name+' привышает допустимый размер 10м');

					}
						
				})(files[index]);
			// Производим чтение картинки по URI
			fileReader.readAsDataURL(file);
		});
		return false;
	}
		
	// Процедура добавления эскизов на страницу
	function addImage_thumb(ind) {
		// Если индекс отрицательный значит выводим весь массив изображений
		if (ind < 0 ) { 
		start = 0; end = dataArray_thumb.length; 
		} else {
		// иначе только определенное изображение 
		start = ind; end = ind+1; } 
		// Оповещения о загруженных файлах
		if(dataArray_thumb.length == 0) {
			// Если пустой массив скрываем кнопки и всю область
			// $('#upload-button').hide();
			// $('#uploaded-holder').hide();
		} else if (dataArray_thumb.length == 1) {
			$(main_block_name_thumb+'#upload-button span').html("Был выбран 1 файл");
		} else {
			$(main_block_name_thumb+'#upload-button span').html(dataArray_thumb.length+" файлов были выбраны");
		}
		// Цикл для каждого элемента массива
		for (i = start; i < end; i++) {
			// размещаем загруженные изображения

			if($(main_block_name_thumb+'#dropped-files > .image').length <= maxFiles_thumb) { 
				$(main_block_name_thumb+'#dropped-files').append('<div id="img-'+i+'"  class="image" style="background: url('+dataArray_thumb[i].value+'); background-size: contain;" iid="'+i+'"> <a href="javascript:void(0);" id="drop-'+i+'" iid="'+dataArray_thumb[i].id_pic+'" class="drop-button">Удалить изображение</a></div>'); 
			}
			
		}
		
		return false;
	}

function randomNumber(min, max) {
  return Math.floor(Math.random() * (max - min + 1)) + min;
}

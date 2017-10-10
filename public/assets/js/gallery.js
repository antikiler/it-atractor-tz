// Массив для всех изображений

// В dataTransfer помещаются изображения которые перетащили в область div
jQuery.event.props.push('dataTransfer');

// Максимальное количество загружаемых изображений за одни раз
var maxFiles = 15;

var main_block_name = '.content-galler-1 ';

// Оповещение по умолчанию
var errMessage = 0;

// Кнопка выбора файлов
var defaultUploadBtn = $(main_block_name+'#uploadbtn');

// Область информер о загруженных изображениях - скрыта
$(main_block_name+'#uploaded-files').hide();

// Метод при падении файла в зону загрузки
$(main_block_name+'#drop-files').on('drop', function(e) {	
	// Передаем в files все полученные изображения
	var files = e.dataTransfer.files;
	// Проверяем на максимальное количество файлов
	if (files.length <= maxFiles) {
		// Передаем массив с файлами в функцию загрузки на предпросмотр
		loadInView(files);
	} else {
		alert('Вы не можете загружать больше '+maxFiles+' изображений!'); 
		files.length = 0; return;
	}
});

// При нажатии на кнопку выбора файлов
defaultUploadBtn.on('change', function() {
		// Заполняем массив выбранными изображениями
		var files = $(this)[0].files;
		// Проверяем на максимальное количество файлов
	if (files.length <= maxFiles) {
		// Передаем массив с файлами в функцию загрузки на предпросмотр
		loadInView(files);
		// Очищаем инпут файл путем сброса формы
        $(main_block_name+'#frm').each(function(){
        	    this.reset();
		});
	} else {
		alert('Вы не можете загружать больше '+maxFiles+' изображений!'); 
		files.length = 0;
	}
});

// Функция загрузки изображений на предросмотр
function loadInView(files) {
	// Показываем обасть предпросмотра
	$(main_block_name+'#uploaded-holder').show();
	
	// Для каждого файла
	$.each(files, function(index, file) {
					
		// Несколько оповещений при попытке загрузить не изображение
		if (!files[index].type.match('image.*')) {
			
			if(errMessage == 0) {
				$(main_block_name+'#drop-files p').html('Эй! только изображения!');
				++errMessage
			}
			else if(errMessage == 1) {
				$(main_block_name+'#drop-files p').html('Стоп! Загружаются только изображения!');
				++errMessage
			}
			else if(errMessage == 2) {
				$(main_block_name+'#drop-files p').html("Не умеешь читать? Только изображения!");
				++errMessage
			}
			else if(errMessage == 3) {
				$(main_block_name+'#drop-files p').html("Хорошо! Продолжай в том же духе");
				errMessage = 0;
			}
			return false;
		}
		
		// Проверяем количество загружаемых элементов
		if((dataArray.length+files.length) <= maxFiles) {
			// показываем область с кнопками
			$(main_block_name+'#upload-button').css({'display' : 'block'});
		} 
		else { alert('Вы не можете загружать больше '+maxFiles+' изображений!'); return; }
		
		// Создаем новый экземпляра FileReader
		var fileReader = new FileReader();
			// Инициируем функцию FileReader
			fileReader.onload = (function(file) {
				if (file.size < 10000000) {
					return function(e) {
						// Помещаем URI изображения в массив
						var index_img_rand = randomNumber(1,12548);

						dataArray.push({name : file.name, 
										value : this.result,
										id_pic:index_img_rand,
										short_tag:'',
										old:0,
										type_img:0});
						addImage((dataArray.length-1));
					}; 
				}else{
					alert('Изображения с именем '+file.name+' привышает допустимый размер 3м');

				}
					
			})(files[index]);
		// Производим чтение картинки по URI
		fileReader.readAsDataURL(file);
	});
	return false;
}
	
function addImage(ind) {
	// Если индекс отрицательный значит выводим весь массив изображений
	if (ind < 0 ) { 
	start = 0; end = dataArray.length; 
	} else {
	// иначе только определенное изображение 
	start = ind; end = ind+1; } 
	// Оповещения о загруженных файлах
	if(dataArray.length == 0) {
		// Если пустой массив скрываем кнопки и всю область
		$(main_block_name+'#upload-button').hide();
		$(main_block_name+'#uploaded-holder').hide();
	} else if (dataArray.length == 1) {
		$(main_block_name+'#upload-button span').html("Был выбран 1 файл");
	} else {
		$(main_block_name+'#upload-button span').html(dataArray.length+" файлов ");
	}
	// Цикл для каждого элемента массива
	for (i = start; i < end; i++) {
		// размещаем загруженные изображения

		if($(main_block_name+'#dropped-files > .image').length <= maxFiles) { 
			$(main_block_name+'#dropped-files').append('<div id="img-'+i+'"  class="image" style="background: url('+dataArray[i].value+'); background-size: cover;" iid="'+i+'">'+
			                            '<a href="javascript:void(0);" id="main-'+dataArray[i].id_pic+'" iid="'+dataArray[i].id_pic+'" class="main-button">Сделать главной</a>'+
			                            // '<a id="short-'+i+'"  class="short-tags-button"><input type="text" class="short-tags" iid="'+dataArray[i].id_pic+'" placeholder="введите тег" value="'+dataArray[i].short_tag+'"></a>'+
			                            '<a style="cursor: pointer;" id="drop-'+i+'" iid="'+dataArray[i].id_pic+'" old="'+dataArray[i].old+'" class="drop-button">Удалить изображение</a>'+
			                            '</div>'); 
		}
		
	}
	var curent_main = $(main_block_name+'.main_img').val();
	if (curent_main == 0) {
		$(main_block_name+'#main-'+0).addClass('main-button-active').html('Главная');
	    $(main_block_name+'.main_img').val(0);
	}else{
		$(main_block_name+'#main-'+curent_main).addClass('main-button-active').html('Главная');
	}
	
	return false;
}

// Метод Сделать главной
$(document).on('click',main_block_name+'.main-button',function (){
  $(main_block_name+'.main-button').removeClass('main-button-active').html('Сделать главной');

  $(this).addClass('main-button-active').html('Главная');
  $('.main_img').val($(this).attr('iid'));
});

// Функция удаления всех изображений
function restartFiles() {

	// Установим бар загрузки в значение по умолчанию
	$(main_block_name+'#loading-bar .loading-color').css({'width' : '0%'});
	$(main_block_name+'#loading').css({'display' : 'none'});
	$(main_block_name+'#loading-content').html(' ');
	
	// Удаляем все изображения на странице и скрываем кнопки
	$(main_block_name+'#upload-button').hide();
	$(main_block_name+'#dropped-files > .image').remove();
	$(main_block_name+'#uploaded-holder').hide();
	$(main_block_name+'.main_img').val(0);

	// Очищаем массив
	dataArray.length = 0;
	
	return false;
}

// Удаление только выбранного изображения 
$(main_block_name+"#dropped-files").on("click","a[id^='drop']", function() {

	// получаем название id
		var elid = $(this).attr('id');
		var id_pic_img = $(this).attr('iid');
		var curent_main_2 = $('.main_img').val();

		var id_img_adv = $(this).attr('old');
    if (id_img_adv==1) {
    	img_del.push({galler_id : id_pic_img});
    }


		if (id_pic_img == curent_main_2) {
			$(main_block_name+'.main_img').val(0);
		}
	// создаем массив для разделенных строк
	var temp = new Array();
	// делим строку id на 2 части
	temp = elid.split('-');
	$(main_block_name+".short-tags").map(function(indx, element){
	  dataArray[indx].short_tag = $(element).val();
	});
	// получаем значение после тире тоесть индекс изображения в массиве
	dataArray.splice(temp[1],1);
	// Удаляем старые эскизы
	$(main_block_name+'#dropped-files > .image').remove();
	// Обновляем эскизи в соответсвии с обновленным массивом
	addImage(-1);		
});

$(document).on('click',main_block_name+'.add_gallery',function (){
	var img_href = $(main_block_name+'#href_name').val().replace(/\s/ig, '').replace(/^\s+|\s+(?=[\n\r])/gm,'').split(',');
	for (var i = 0; i < img_href.length; i++) {
		if (img_href[i] !='') {
			var img_href_rand_name = randomNumber(1, 12548);
			dataArray.push({
					name: 'img',
					value: img_href[i],
					id_pic: i+img_href_rand_name,
					old: 0,
					short_tag: '',
					type_img: 1,
				}
			);
			addImage((dataArray.length - 1));
		}
		
	  }

	$(main_block_name+'#href_name').val('').css('height','33px');
	$(main_block_name+'#uploaded-holder').css('display','block');
	$(main_block_name+'#upload-button').css('display','block');
});

// Удалить все изображения кнопка 
$(main_block_name+'#dropped-files #upload-button .delete').click(restartFiles);
      

// Простые стили для области перетаскивания
$(main_block_name+'#drop-files').on('dragenter', function() {
	$(this).css({'box-shadow' : 'inset 0px 0px 20px rgba(0, 0, 0, 0.1)', 'border' : '2px dashed #bb2b2b'});
	return false;
});

$(main_block_name+'#drop-files').on('drop', function() {
	$(this).css({'box-shadow' : 'none', 'border' : '2px dashed rgba(0,0,0,0.2)'});
	return false;
});
	

function randomNumber(min, max) {
  return '558878778878745'+Math.floor(Math.random() * (max - min + 1)) + min;
}
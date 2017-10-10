@extends('layouts.admin')

@section('content')
<div class="col-lg-12 content-default">
	<div class="content">
		<h3 style="margin-bottom: 12px;">{{ $title }}</h3>
	</div>
  	<div class="row">
    	<div class="col-lg-12">
	    	<div class="form-group ">
	    		<label>Название заведения</label>
				<textarea class="form-control" type="text" id="title" placeholder="Название заведения" style="font-size: 16px;font-weight: bold;height: 35px;color: black;"></textarea>
			</div>
			<div class="form-group ">
				<label>Выберите Категорию</label>
				<select class="form-control" id="id_category">
					@foreach($categories as $category)
						<option value="{{ $category->id }}">{{ $category->title }}</option>
					@endforeach
				</select>
			</div>
			<div class="form-group ">
	    		<label>Описание заведения</label>
				<textarea class="form-control" type="text" id="description" placeholder="Описание заведения" style="font-size: 16px;font-weight: bold;height: 100px;color: black;"></textarea>
			</div>
			<div class="form-group">
			    <div class="block-ckeack-box block-ckeack-box-2">
					<div class="switcher">
					    <input class="switcher__input active" type="checkbox" checked id="active">
					    <label class="switcher__label" for="active">Опубликовать</label>
					</div>
			    </div>
			    <div style="clear:both"></div>
	        </div>
			<div class="content-galler-1" >
			    <label for="body">Загрузка фото в Галерею</label>
			    <div class="content-img-upload">
			          <!-- Область для перетаскивания -->
			          <div id="drop-files" ondragover="return false">
			              <p style="font-size: 19px;">Перетащите изображение c компьютера сюда</p>
			              <form id="frm">
			                  <input type="file" id="uploadbtn" multiple size="2" />
			                  <input type="hidden" name="test" value="1">
			              </form>
			              <!-- Область предпросмотра -->
			            <div id="uploaded-holder"  style="display:block;"> 
			                <div id="dropped-files">
			                    <!-- Кнопки загрузить и удалить, а также количество файлов -->
			                    <div class="clearfix"></div>
			                    <div id="upload-button">
			                        <center>
			                            <span>0 Файлов</span>
			                            <!-- <a href="javascript:void(0);" class="delete">Удалить все</a> -->
			                        </center>
			                    </div>  
			                </div>
			            </div>
			            <div style="clear:both"></div>
			          </div>
			          <!-- Прогресс бар загрузки -->
                        <div id="loading">
                            <div id="loading-bar">
                                <div class="loading-color"></div>
                            </div>
                            <div id="loading-content"></div>
                        </div>
			          <input type="hidden" class="main_img" value="0">
			      </div>
			  </div>
		</div>
	</div>
	<div class="form-group">
	   <button class="btn btn-primary add-behavior">Добавить</button>
	   <a href="/admin/behavior" class="btn btn-default">Отменить</a>
	   <input type="hidden" id="test_file_name">
	</div>
	
</div>
<script type="text/javascript">

var dataArray = [];
var add_button = '.add-behavior';

$.getScript('/assets/js/gallery.js?v=35');


$(document).on('click',add_button,function() {
	$(add_button).attr('disabled','');
	var title = $('#title').val();
	var id_category = $('#id_category').val();
	var description = $('#description').val();
	var active = $('#active').prop('checked');
	if (active) active=1;else active=0;
	var main = $('.main_img').val();
	var url_redirect = '/admin/behavior';

	$.post('/admin/behavior',{
				title,
				id_category,
				description,
				active
	},function (data){
		var dataImg = {
	                last_id: data,
	                main:main,
	        	};
	    if (dataArray.length > 0) {
	    	
    		upload_loading_item_img(add_button,dataArray,dataImg,'/admin/behavior/add_img',url_redirect);

	    }else{
	    	$(add_button).removeAttr('disabled');
	        window.location = redirect_url;
	    }
		
	});
	
});

</script>
<script type="text/javascript">
	$('#title').autoResize();
	$('#description').autoResize();
</script>
@endsection
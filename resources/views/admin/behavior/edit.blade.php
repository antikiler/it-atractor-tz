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
				<textarea class="form-control" type="text" id="title" placeholder="Название категории" style="font-size: 16px;font-weight: bold;height: 35px;color: black;">{{ $behavior->title }}</textarea>
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
				<textarea class="form-control" type="text" id="description" placeholder="Описание заведения" style="font-size: 16px;font-weight: bold;height: 100px;color: black;">{{ $behavior->description }}</textarea>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-4"> 
			<div class="form-group">
			    <div class="block-ckeack-box block-ckeack-box-2">
					<div class="switcher">
					    <input class="switcher__input active" type="checkbox" 
					    @if($behavior->active) {{ $active='checked' }}
						@else {{ $active='' }} @endif  id="public">
					    <label class="switcher__label" for="public">Опубликовать</label>
					</div>
			    </div>
			    <div style="clear:both"></div>
	        </div>
	    </div>
    </div>

	<div class="form-group">
	   <span class="btn btn-primary edit-behavior">Созранить</span>
	   <a href="/admin/behavior" class="btn btn-default">Отменить</a>
	   <input type="hidden" id="test_file_name">
	</div>
	
</div>
<script type="text/javascript">

	$(document).on('click','.edit-behavior',function() {
		var title = $('#title').val();
		var id_category = $('#id_category').val();
		var description = $('#description').val();
   		var active = $('#active').prop('checked');
   		if (active) active=1;else active=0;

		$.post('/admin/behavior/update',{
					id:{{ $behavior->id }},
					title,
					id_category,
					description,
					active
		},function (data){
			window.location="/admin/behavior";
		});
		
	});

	$("#id_category [value='{{ $behavior->id_category }}']").attr("selected", "selected");
	$('#title').autoResize();
	$('#description').autoResize();
</script>
@endsection
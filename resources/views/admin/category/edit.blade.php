@extends('layouts.admin')

@section('content')
<div class="col-lg-12 content-default">
	<div class="content">
		<h3 style="margin-bottom: 12px;">{{ $title }}</h3>
	</div>
  	<div class="row">
    	<div class="col-lg-12">
	    	<div class="form-group ">
				<textarea class="form-control" type="text" id="title" placeholder="Название категории" style="font-size: 16px;font-weight: bold;height: 35px;color: black;">{{ $category->title }}</textarea>
			</div>
		</div>
		<div class="col-lg-4"> 
			<div class="form-group">
			    <div class="block-ckeack-box block-ckeack-box-2">
					<div class="switcher">
					    <input class="switcher__input active" type="checkbox" 
					    @if($category->active) {{ $active='checked' }}
						@else {{ $active='' }} @endif  id="public">
					    <label class="switcher__label" for="public">Опубликовать</label>
					</div>
			    </div>
			    <div style="clear:both"></div>
	        </div>
	    </div>
    </div>

	<div class="form-group">
	   <span class="btn btn-primary edit-category">Сохранить</span>
	   <a href="/admin/category" class="btn btn-default">Отменить</a>
	   <input type="hidden" id="test_file_name">
	</div>
	
</div>
<script type="text/javascript">

	$(document).on('click','.edit-category',function() {
		var title = $('#title').val();
   		var active = $('#public').prop('checked');
   		if (active) active=1;else active=0;

		$.post('/admin/category/update',{
					id:{{ $category->id }},
					title,
					active
		},function (data){
			window.location="/admin/category";
		});
		
	});

</script>
<script type="text/javascript">
	$('#title').autoResize();
</script>
@endsection
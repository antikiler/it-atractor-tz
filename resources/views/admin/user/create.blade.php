@extends('layouts.admin')

@section('content')
<div class="col-lg-12 content-default">
	<div class="content">
		<h3 style="margin-bottom: 12px;">{{ $title }}</h3>
	</div>
  	<div class="row">
    	<div class="col-lg-6">
	    	<div class="form-group ">
	    		<label>Имя</label>
				<textarea class="form-control" type="text" id="name" placeholder="имя"></textarea>
			</div>
			<div class="form-group ">
				<label>Фамилия</label>
				<textarea class="form-control" type="text" id="last_name" placeholder="Фамилия"></textarea>
			</div>
			<div class="form-group ">
				<label>Email</label>
				<textarea class="form-control" type="email" id="email" placeholder="Email"></textarea>
			</div>
			<div class="form-group ">
				<label>Пароль:min 6 символов</label>
				<input class="form-control" type="password" id="password" placeholder="Пароль">
			</div>
			<div class="form-group ">
				<label>Выбор роли</label>
				<select class="form-control" id="role">
					<option value="0">Пользователь</option>
					<option value="1">Админ</option>
				</select>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-4"> 
			<div class="form-group">
			    <div class="block-ckeack-box block-ckeack-box-2">
					<div class="switcher">
					    <input class="switcher__input active" type="checkbox" checked id="active">
					    <label class="switcher__label" for="active">Активен</label>
					</div>
			    </div>
			    <div style="clear:both"></div>
	        </div>
	    </div>
    </div>

	<div class="form-group">
	   <span class="btn btn-primary add-user">Добавить</span>
	   <a href="/admin/user" class="btn btn-default">Отменить</a>
	   <input type="hidden" id="test_file_name">
	</div>
	
</div>
<script type="text/javascript">

	$(document).on('click','.add-user',function() {
		var name = $('#name').val();
		var last_name = $('#last_name').val();
		var email = $('#email').val();
		var password = $('#password').val();
		var role = $('#role').val();
   		var active = $('#active').prop('checked');
   		if (active) active=1;else active=0;

		$.post('/admin/user',{
					name,
					last_name,
					email,
					password,
					role,
					active
		},function (data){
			window.location="/admin/user";
		});
		
	});

</script>
<script type="text/javascript">
	$('#title').autoResize();
</script>
@endsection
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
				<textarea class="form-control" type="text" id="name" placeholder="имя">{{ $user->name }}</textarea>
			</div>
			<div class="form-group ">
				<label>Фамилия</label>
				<textarea class="form-control" type="text" id="last_name" placeholder="Фамилия">{{ $user->last_name }}</textarea>
			</div>
			<div class="form-group ">
				<label>Email</label>
				{{ $user->email }}
			</div>
			@if(Auth::user()->id == $user->id)
			<div class="form-group ">
				<label>Новый Пароль</label>
				<input class="form-control" type="password" id="password" placeholder="Пароль">
			</div>
			@endif
			@if(Auth::user()->id != $user->id)
			<div class="form-group ">
				<label>Выбор роли</label>
				<select class="form-control" id="role">
					<option value="0">Пользователь</option>
					<option value="1">Админ</option>
				</select>
			</div>
			@else
			<label>Ролm:admin</label><br><br>
			@endif
		</div>
	</div>
	@if(Auth::user()->id != $user->id)
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
    @endif
	<div class="form-group">
	   <span class="btn btn-primary edit-user">Сохранить</span>
	   <a href="/admin/user" class="btn btn-default">Отменить</a>
	   <input type="hidden" id="test_file_name">
	</div>
	
</div>
<script type="text/javascript">

	$(document).on('click','.edit-user',function() {
		var name = $('#name').val();
		var last_name = $('#last_name').val();
		var password = $('#password').val();
		@if(Auth::user()->id != $user->id)
			var active = $('#active').prop('checked');
   			if (active) active=1;else active=0;
   			var role = $('#role').val();
		@else
			var active = 1;
			var role = 1;
		@endif
   		

		$.post('/admin/user/update',{
					id:{{ $user->id }},
					name,
					last_name,
					password,
					role,
					active
		},function (data){
			window.location="/admin/user";
		});
		
	});
	@if(Auth::user()->id != $user->id)
		$("#role [value='{{ $user->role }}']").attr("selected", "selected");
	@endif
</script>
@endsection
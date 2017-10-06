@extends('layouts.admin')

@section('content')

<div class="col-lg-12">
<div class="content">
	<h3 style="margin-bottom: 12px;margin-top: 12px;">{{ $title }}</h3>
</div>
<div id="DataTables_Table_0_wrapper" class="dataTables_wrapper form-inline">
<div class="row">
	<div class="col-sm-12">
		 <a class="btn btn-success add-items" href="/admin/user/create"><i class="fa fa-plus"></i> Добавить</a>
	</div>
</div>
<div class="row">
	<div class="col-sm-6"></div>
</div>
<table class="table table-striped datatables dataTable">
	<thead>
		<tr role="row">
			<th style="width: 8px;">#</th>
			<th>Имя</th>
			<th>Фамилия</th>
			<th>E-mail</th>
			<th style="width: 58px;">Активен</th>
			<th style="width: 58px;">Роль</th>
			<th style="width: 58px;">Кол заведений</th>
			<th style="width: 130px;">Дата добавление</th>
			<th style="width: 60px;"></th>
		</tr>
	</thead>
	<tfoot>
		<tr>
			<td></td>
			<td></td>
			<td></td>
		</tr>
	</tfoot>
	<tbody class="list-items">

	@foreach($users as $item)

	<tr role="row" class="odd">
	  <td>{{ $item->id }}</td>
	  <td>{{ $item->name }}</td>
	  <td>{{ $item->last_name }}</td>
	  <td>{{ $item->email }}</td>
      <td style="text-align:center">
      	@if(Auth::user()->id != $item->id)
		<div class="switcher" style="padding:2px;">
		    <input class="switcher__input active-chek" type="checkbox" 
		    @if($item->active) {{ $active='checked' }}
			@else {{ $active='' }} @endif 
			id="active-{{ $item->id }}" iid="{{ $item->id }}">
		    <label class="switcher__label" for="active-{{ $item->id }}"></label>
		</div>
		@else
		нет
		@endif
	  </td>
	  <td>@if($item->role == 1) admin @else Пользователь @endif</td>
	  <td>{{ $item->count_behavior }}</td>
	  <td>{{ $item->created_at }}</td>
	  <td>
	  <div class="text-right pull-right" style="width: 120px;">
	   <a href="/admin/user/{{ $item->id }}/edit" class="btn btn-default btn-sm edit-items" data-toggle="tooltip" title="Редактировать"><i class="fa fa-pencil"></i></a>
	   @if(Auth::user()->id != $item->id)
	   <button class="btn btn-danger btn-sm btn-delete del_user" id="{{ $item->id }}" data-toggle="tooltip" title="Удалить">
		<i class="fa fa-times"></i></button>
		@else
			нет
		@endif
	   </div>
      </td>
   </tr>

   @endforeach

   </tbody>
   </table>
   <div class="ms"></div>
   <div class="row">
   <div class="col-sm-12">
	   <div class="dataTables_paginate paging_simple_numbers pagination">
		   {{ $users->render() }}
	   </div>
   </div>
  </div>
  </div>
</div>
<script type="text/javascript">
	$('.del_user').click(function (){

		if (confirm("Вы дейстивидельно хотите удалить")) {

			var id = $(this).attr('id');

			$.post('/admin/user/delete', {id}, function(data) {
				window.location = '/admin/user';
			});
		}

	});
	$('.active-chek').click(function (){

	    var id = $(this).attr('iid');
	    var active = $(this).prop('checked');
	    if (active) active=1;else active=0;

	    $.post('/admin/user/active',{id,active});
	});
</script>

@endsection
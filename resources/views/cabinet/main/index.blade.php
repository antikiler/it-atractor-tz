@extends('layouts.site')
@section('saidbar')
  @include('cabinet.components.saidbar')
@endsection
@section('content')

<div class="col-24 col-sm-24 col-md-24 col-lg-18 col-xl-18">
    <div class="bread-crumbs">
        <ul>
            <li>
                <a href="#">Главная</a>
            </li>
            <li>
                <a href="#">Личный кабинет</a>
            </li>
        </ul>
    </div>

    <div class="ticket-content">
        <div class="container">
            <div class="row">
                <div class="col-24 col-sm-24 col-md-24 col-lg-24 col-xl-24">
                    <h3>Добро пожаловать в личный кабинет</h3>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
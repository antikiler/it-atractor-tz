@extends('layouts.site')

@section('content')
<div class="col-24 col-sm-24 col-md-24 col-lg-18 col-xl-18">
    <div class="bread-crumbs">
        <ul>
            <li>
                <a href="#">Главная</a>
            </li>
            <li>
                <a href="#">Вход</a>
            </li>
        </ul>
    </div>

    <div class="ticket-content">
        <div class="row">
            <div class="login-form">
                @include('sites.components.login')
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.site')
@section('content')

<div class="col-24 col-sm-24 col-md-24 col-lg-18 col-xl-18">
    <div class="bread-crumbs">
        <ul>
            <li>
                <a href="#">Главная</a>
            </li>
            <li>
                <a href="#">Популярное заведение</a>
            </li>
        </ul>
    </div>

    <div class="ticket-content">
        <div class="row">
            <div class="col-24 col-sm-24 col-md-12 col-lg-8 col-xl-8">
                <div class="hotel-card">
                    <a href="#">
                        <div class="img" style="background-image: url(/assets/img/01.jpg);"></div>
                    </a>
                    <div class="description">
                        <a href="#">
                            <h3>Заведение номер один</h3>
                        </a>
                        <div class="star-rating">
                            <div class="rateit" 
                                 data-rateit-value="4" 
                                 data-rateit-readonly="true"></div>
                        </div>
                        <p>Заведение номер один, ахаха это описание. Уныло прискорбно ! Заведение номер один, ахаха это описание. Уныло прискорбно</p>
                    </div>
                    <div class="bottom-inform">
                        <div class="date">
                            <i class="fa fa-camera" aria-hidden="true"></i>4
                            <i class="fa fa-eye" aria-hidden="true"></i>12
                        </div>
                        <a href="#">Подробнее</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
<div class="header">
    <div class="container">
        <div class="row">
            <div class="col-24 col-sm-24 col-md-3 col-lg-3 col-xl-3">
                <a href="/"><img src="/assets/img/logo.png" alt="" class="logo"></a>
            </div>
            <div class="col-24 col-sm-24 col-md-21 col-lg-21 col-xl-21">
                <div class="form-addition">
                    @if (!Auth::guest())
                        @if (Auth::user()->role==1)
                            <a href="/admin" class="btn primary"><i class="fa fa-tags"></i> Админка</a>
                        @else
                            <a href="#" class="btn primary"><i class="fa fa-tags"></i> Добавить заведение</a>
                        @endif
                        <a href="/cabinet" class="btn primary"><i class="fa fa-user fa-fw"></i> Кабинет</a>
                        <a href="/logout" class="btn primary"><i class="fa fa-sign-out fa-fw"></i> Выход</a>
                    @else
                        <button class="btn primary enter"><i class="fa fa-sign-out fa-fw"></i> Вход</button>
                        <button class="btn primary registr"><i class="fa fa-btn fa-user"></i> Регистрация</button>
                    @endif
                </div>
                <div class="search">
                    <input type="text" placeholder="Поиск">
                    <button class="search-btn">
                        <i class="fa fa-search" aria-hidden="true"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
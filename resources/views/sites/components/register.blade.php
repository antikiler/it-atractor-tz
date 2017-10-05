<form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
    {{ csrf_field() }}

    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
        <label for="name" class="control-label">Имя</label>

        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Имя">

        @if ($errors->has('name'))
            <span class="help-block">s
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
        <label for="last_name" class="control-label">Фамилия</label>

        <input id="last_name" type="text" class="form-control" name="last_name" value="{{ old('last_name') }}" placeholder="Фамилия">

        @if ($errors->has('name'))
            <span class="help-block">
                <strong>{{ $errors->first('last_name') }}</strong>
            </span>
        @endif
    </div>

    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        <label for="email" class="control-label">E-Mail</label>
        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="E-Mail">

        @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
    </div>

    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
        <label for="password" class="control-label">Пароль</label>
        <input id="password" type="password" class="form-control" name="password"  placeholder="Пароль">
        @if ($errors->has('password'))
            <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
    </div>

    <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
        <label for="password-confirm" class="control-label">Повторите пароль</label>
        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Повторите пароль">

        @if ($errors->has('password_confirmation'))
            <span class="help-block">
                <strong>{{ $errors->first('password_confirmation') }}</strong>
            </span>
        @endif
    </div>
    
    <div class="form-group">
        <button type="submit" class="btn btn-primary">
            <i class="fa fa-btn fa-user"></i> Регистрация
        </button>
    </div>
</form>
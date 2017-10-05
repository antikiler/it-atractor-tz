@extends('layouts.site')

@section('content')
<div class="col-24 col-sm-24 col-md-24 col-lg-18 col-xl-18">
    <div class="bread-crumbs">
        <ul>
            <li>
                <a href="/">Главная</a>
            </li>
            <li>
                <a href="#">Востановление пароля</a>
            </li>
        </ul>
    </div>

    <div class="ticket-content">
        <div class="row">
            <div class="login-form">
                <form class="form-horizontal login-form" role="form" method="POST" action="{{ url('/password/email') }}">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="control-label">E-Mail</label>
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-btn fa-envelope"></i> Востановить
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

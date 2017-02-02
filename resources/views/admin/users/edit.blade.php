@extends('layouts.app')

@section('content')

    <div class="panel-heading table-heading">Изменить пользователя
        {{ $user->first_name }} {{ $user->last_name }}
    </div>
    <div class="col-sm-6 col-sm-offset-3">
        <form action="{{ action('Admin\UsersController@update', $user->id) }}" method="post">
            {{ csrf_field() }}
            <div class="form-group {{ $errors->has('first_name') ? ' has-error' : ''}}">
                <label for="first_name">Имя </label>
                <input name="first_name" id="first_name" class="form-control" value="{{ $user->first_name }}" >

                @if ($errors->has('first_name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('first_name') }}</strong>
                    </span>
                @endif

            </div>

            <div class="form-group {{ $errors->has('last_name') ? ' has-error' : ''}}">
                <label for="last_name">Фамилия </label>
                <input name="last_name" id="last_name" class="form-control" value="{{ $user->last_name }}">

                @if ($errors->has('last_name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('last_name') }}</strong>
                    </span>
                @endif

            </div>

            <div class="form-group {{ $errors->has('email') ? ' has-error' : ''}}">
                <label for="email">Email </label>
                <input name="email" id="email" class="form-control" value="{{ $user->email }}">

                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif

            </div>

            <div class="form-group">
                <input class="btn btn-primary" type="submit" value="Применить">
                <a class="btn btn-primary" href="{{ action('Admin\UsersController@index') }}">Отмена</a>
            </div>


        </form>
    </div>


@endsection
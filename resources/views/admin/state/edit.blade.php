@extends('layouts.app')

@section('content')

    <div class="panel-heading table-heading">Изменить статус
        {{ $state->state_name }}
    </div>
    <div class="col-sm-6 col-sm-offset-3">
        <form action="{{ action('Admin\StateController@update', $state->state_id) }}" method="post">
            {{ csrf_field() }}
            <div class="form-group {{ $errors->has('state_name') ? ' has-error' : ''}}">
                <label for="state_name">Название </label>
                <input name="state_name" id="state_name" class="form-control" value="{{ $state->state_name }}" >

                @if ($errors->has('state_name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('state_name') }}</strong>
                    </span>
                @endif

            </div>

            <div class="form-group {{ $errors->has('state_slug') ? ' has-error' : ''}}">
                <label for="state_slug">Цена</label>
                <input name="state_slug" id="state_slug" class="form-control" value="{{ $state->state_slug }}">

                @if ($errors->has('state_slug'))
                    <span class="help-block">
                        <strong>{{ $errors->first('state_slug') }}</strong>
                    </span>
                @endif

            </div>

            <div class="form-group">
                <input class="btn btn-primary" type="submit" value="Применить">
                <a class="btn btn-primary" href="{{ action('Admin\StateController@index') }}">Отмена</a>
            </div>


        </form>
    </div>


@endsection
@extends('layouts.app')

@section('content')

    <div class="panel-heading table-heading">Изменить элемент
        {{ $additional->additional_name }}
    </div>
    <div class="col-sm-6 col-sm-offset-3">
        <form action="{{ action('Admin\AdditionalController@update', $additional->additional_id) }}" method="post">
            {{ csrf_field() }}
            <div class="form-group {{ $errors->has('additional_name') ? ' has-error' : ''}}">
                <label for="additional_name">Название </label>
                <input name="additional_name" id="additional_name" class="form-control" value="{{ $additional->additional_name }}" >

                @if ($errors->has('additional_name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('additional_name') }}</strong>
                    </span>
                @endif

            </div>

            <div class="form-group {{ $errors->has('additional_price') ? ' has-error' : ''}}">
                <label for="additional_price">Цена</label>
                <input name="additional_price" id="additional_price" class="form-control" value="{{ $additional->additional_price }}">

                @if ($errors->has('additional_price'))
                    <span class="help-block">
                        <strong>{{ $errors->first('additional_price') }}</strong>
                    </span>
                @endif

            </div>

            <div class="form-group">
                <input class="btn btn-primary" type="submit" value="Применить">
                <a class="btn btn-primary" href="{{ action('Admin\AdditionalController@index') }}">Отмена</a>
            </div>


        </form>
    </div>


@endsection
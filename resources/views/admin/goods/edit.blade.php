@extends('layouts.app')

@section('content')

    <div class="panel-heading table-heading">Изменить продукт
        {{ $good->good_name }}
    </div>
    <div class="col-sm-6 col-sm-offset-3">
        <form action="{{ action('Admin\GoodController@update', $good->good_id) }}" method="post">
            {{ csrf_field() }}
            <div class="form-group {{ $errors->has('good_name') ? ' has-error' : ''}}">
                <label for="good_name">Название </label>
                <input name="good_name" id="good_name" class="form-control" value="{{ $good->good_name }}" >

                @if ($errors->has('good_name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('good_name') }}</strong>
                    </span>
                @endif

            </div>

            <div class="form-group {{ $errors->has('good_price') ? ' has-error' : ''}}">
                <label for="good_price">Цена</label>
                <input name="good_price" id="good_price" class="form-control" value="{{ $good->good_price }}">

                @if ($errors->has('good_price'))
                    <span class="help-block">
                        <strong>{{ $errors->first('good_price') }}</strong>
                    </span>
                @endif

            </div>

            <div class="form-group">
                <input class="btn btn-primary" type="submit" value="Применить">
                <a class="btn btn-primary" href="{{ action('Admin\GoodController@index') }}">Отмена</a>
            </div>


        </form>
    </div>


@endsection
@extends('layouts.app')

@section('content')

    <div class="panel-heading table-heading">Изменить продукт
        {{ $good->goods_name }}
    </div>
    <div class="col-sm-6 col-sm-offset-3">
        <form action="{{ action('Admin\GoodController@update', $good->goods_id) }}" method="post">
            {{ csrf_field() }}
            <div class="form-group {{ $errors->has('goods_name') ? ' has-error' : ''}}">
                <label for="goods_name">Название </label>
                <input name="goods_name" id="goods_name" class="form-control" value="{{ $good->goods_name }}" >

                @if ($errors->has('goods_name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('goods_name') }}</strong>
                    </span>
                @endif

            </div>

            <div class="form-group {{ $errors->has('goods_price') ? ' has-error' : ''}}">
                <label for="goods_price">Цена</label>
                <input name="goods_price" id="goods_price" class="form-control" value="{{ $good->goods_price }}">

                @if ($errors->has('goods_price'))
                    <span class="help-block">
                        <strong>{{ $errors->first('goods_price') }}</strong>
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
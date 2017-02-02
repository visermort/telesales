@extends('layouts.app')

@section('content')

    <div class="panel-heading table-heading">Изменить услугу
        {{ $service->services_name }}
    </div>
    <div class="col-sm-6 col-sm-offset-3">
        <form action="{{ action('Admin\ServiceController@update', $service->services_id) }}" method="post">
            {{ csrf_field() }}
            <div class="form-group {{ $errors->has('services_name') ? ' has-error' : ''}}">
                <label for="services_name">Название </label>
                <input name="services_name" id="services_name" class="form-control" value="{{ $service->services_name }}" >

                @if ($errors->has('services_name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('services_name') }}</strong>
                    </span>
                @endif

            </div>

            <div class="form-group {{ $errors->has('services_price') ? ' has-error' : ''}}">
                <label for="services_price">Цена</label>
                <input name="services_price" id="services_price" class="form-control" value="{{ $service->services_price }}">

                @if ($errors->has('services_price'))
                    <span class="help-block">
                        <strong>{{ $errors->first('services_price') }}</strong>
                    </span>
                @endif

            </div>

            <div class="form-group">
                <input class="btn btn-primary" type="submit" value="Применить">
                <a class="btn btn-primary" href="{{ action('Admin\ServiceController@index') }}">Отмена</a>
            </div>


        </form>
    </div>


@endsection
@extends('layouts.app')

@section('content')

    <div class="panel-heading table-heading">Изменить заказ
        № {{  $order->order_id }} от {{ $order->user->first_name }} {{ $order->user->last_name }} {{ $order->user->email }}
    </div>
    <div class="col-sm-6 col-sm-offset-3">
        <form action="{{ action('OrderController@update', $order->order_id) }}" method="post">
            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('item_type') ? ' has-error' : '' }}">
                <label for="item_type">Тип заказа</label>
                <select id="item_type" class="form-control" name="item_type" >
                    <option value="">-- Выберите тип --</option>
                    @foreach (config('telesales.itemTypes') as $key => $itemType)
                        <option value="{{ $key }}"  @if ($key == $order->item_type) selected @endif >{{ $itemType }}</option>
                    @endforeach
                </select>
                @if ($errors->has('item_type'))
                    <span class="help-block">
                        <strong>{{ $errors->first('item_type') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('item_id') ? ' has-error' : '' }}">
                <label for="item_id">Заказ</label>
                <select id="item_id" class="form-control" name="item_id" data-value="{{ $order->item_id }}" >
                    <option value="">-- Выберите заказ --</option>

                </select>
                @if ($errors->has('item_id'))
                    <span class="help-block">
                        <strong>{{ $errors->first('item_id') }}</strong>
                    </span>
                @endif

            </div>

            <div class=" form-group{{ $errors->has('order_state_id') ? ' has-error' : '' }}">
                <label for="order_state_id">Статус заказа</label>
                <select id="order_state_id" class="form-control" name="order_state_id" >

                    @foreach ($item_states as $item_state)
                        <option value="{{ $item_state->state_id }}"
                            @if ($item_state->state_id == $order->order_state_id) selected @endif >
                            {{ $item_state->state_name }}
                        </option>
                    @endforeach
                </select>
                @if ($errors->has('order_state_id'))
                    <span class="help-block">
                        <strong>{{ $errors->first('order_state_id') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group">
                <input class="btn btn-primary" type="submit" value="Применить">
                <a class="btn btn-primary" href="{{ action('OrderController@index') }}">Отмена</a>
            </div>


        </form>
    </div>


@endsection


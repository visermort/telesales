@extends('layouts.app')

@section('content')


    <div class="panel-heading table-heading">Заказы</div>

        <div class="panel col-sm-12 ">
            <form id="photos-form" method="post" action="{{ action('OrderController@store') }}" >
                {{ csrf_field() }}
                <div class="col-sm-3 form-group{{ $errors->has('item_type') ? ' has-error' : '' }}">
                    <label for="item_type">Тип заказа</label>
                    <select id="item_type" class="form-control" name="item_type" >
                        <option value="">-- Выберите тип --</option>
                        @foreach (config('telesales.itemTypes') as $key => $itemType)
                            <option value="{{ $key }}">{{ $itemType }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('item_type'))
                        <span class="help-block">
                        <strong>{{ $errors->first('item_type') }}</strong>
                    </span>
                    @endif
                </div>
                <div class="col-sm-4 form-group{{ $errors->has('item_id') ? ' has-error' : '' }}">
                    <label for="item_id">Заказ</label>
                    <select id="item_id" class="form-control" name="item_id" >
                        <option value="">-- Выберите заказ --</option>

                    </select>
                    @if ($errors->has('item_id'))
                        <span class="help-block">
                        <strong>{{ $errors->first('item_id') }}</strong>
                    </span>
                    @endif

                </div>
                <div class="col-sm-3 form-group{{ $errors->has('order_state_id') ? ' has-error' : '' }}">
                    <label for="order_state_id">Статус заказа</label>
                    <select id="order_state_id" class="form-control" name="order_state_id" >

                        @foreach ($item_states as $item_state)
                            <option value="{{ $item_state->state_id }}">{{ $item_state->state_name }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('order_state_id'))
                        <span class="help-block">
                        <strong>{{ $errors->first('order_state_id') }}</strong>
                    </span>
                    @endif
                </div>

                <div class="form-group buttons-horizontal col-sm-2">
                    <input class="btn btn-primary" type="submit" value="Создать заказ">
                </div>
            </form>
        </div>



    <div class="panel-body datagrid">

        <table id="tt" class="easyui-datagrid" style="width:100%;height:auto;">
            <thead>
            <tr class="head">
                <th class="table-heading" nowrap width="5%">Id</th>
                <th class="table-heading" nowrap width="25%">Клиент</th>
                <th class="table-heading" nowrap width="15%">Тип</th>
                <th class="table-heading" nowrap width="25%">Предмет заказа</th>
                <th class="table-heading" nowrap width="15%">Цена</th>
                <th class="table-heading" nowrap width="10%">Статус заказа</th>
                <th class="table-heading" nowrap width="5%">Изменить</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->order_id }}</td>
                    <td>{{ $order->user->first_name }} {{ $order->user->last_name }} {{ $order->user->email }}</td>
                    <td>{{ $order->type() }}</td>
                    <td>{{ $order->item()['name'] }}</td>
                    <td>{{ $order->item()['price'] }}</td>
                    <td>{{ $order->state->state_name }}</td>
                    <td><a href="{{ action('OrderController@edit', $order->order_id) }}"><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true" ></i></a></td>
                </tr>
            @endforeach


            </tbody>
        </table>
    </div>
    <div class="pagination">
        {{ $orders->links() }}
    </div>

@endsection

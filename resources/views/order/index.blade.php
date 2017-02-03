@extends('layouts.app')

@section('content')


    <div class="panel-heading table-heading">Заказы</div>

        {{--<div class="panel col-sm-12 ">--}}
            {{--<form id="photos-form" method="post" action="{{ action('Admin\StateController@store') }}" >--}}
                {{--{{ csrf_field() }}--}}
                {{--<div class="form-group{{ $errors->has('state_name') ? ' has-error' : '' }} col-sm-6">--}}
                    {{--<label for="state_name">Название</label>--}}
                    {{--<input id="state_name" type="text" class="form-control" name="state_name" placeholder="Название" value="{{ old('state_name') }}" >--}}
                    {{--@if ($errors->has('state_name'))--}}
                        {{--<span class="help-block">--}}
                        {{--<strong>{{ $errors->first('state_name') }}</strong>--}}
                    {{--</span>--}}
                    {{--@endif--}}
                {{--</div>--}}
                {{--<div class="form-group{{ $errors->has('state_slug') ? ' has-error' : '' }} col-sm-3">--}}
                    {{--<label for="state_slug">Псевдоним</label>--}}
                    {{--<input id="state_slug" type="text" class="form-control" name="state_slug" placeholder="Псвдоним" value="{{ old('state_slug') }}" >--}}
                    {{--@if ($errors->has('state_slug'))--}}
                        {{--<span class="help-block">--}}
                        {{--<strong>{{ $errors->first('state_slug') }}</strong>--}}
                    {{--</span>--}}
                    {{--@endif--}}
                {{--</div>--}}

                {{--<div class="form-group buttons-horizontal col-sm-2">--}}
                    {{--<input class="btn btn-primary" type="submit" value="Создать статус">--}}
                {{--</div>--}}
            {{--</form>--}}
        {{--</div>--}}



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

@extends('layouts.app')

@section('content')


    <div class="panel-heading table-heading">Продукты</div>

        <div class="panel col-sm-12 ">
            <form id="photos-form" method="post" action="{{ action('Admin\GoodController@store') }}" >
                {{ csrf_field() }}
                <div class="form-group{{ $errors->has('good_name') ? ' has-error' : '' }} col-sm-6">
                    <label for="good_name">Название</label>
                    <input id="good_name" type="text" class="form-control" name="good_name" placeholder="Название" value="{{ old('good_name') }}" >
                    @if ($errors->has('good_name'))
                        <span class="help-block">
                        <strong>{{ $errors->first('good_name') }}</strong>
                    </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('goog_price') ? ' has-error' : '' }} col-sm-3">
                    <label for="goog_price">Цена</label>
                    <input id="goog_price" type="text" class="form-control" name="goog_price" placeholder="Цена" value="{{ old('goog_price') }}" >
                    @if ($errors->has('goog_price'))
                        <span class="help-block">
                        <strong>{{ $errors->first('goog_price') }}</strong>
                    </span>
                    @endif
                </div>

                <div class="form-group buttons-horizontal col-sm-2">
                    <input class="btn btn-primary" type="submit" value="Создать Продукт">
                </div>
            </form>
        </div>



    <div class="panel-body datagrid">

        <table id="tt" class="easyui-datagrid" style="width:100%;height:auto;">
            <thead>
            <tr class="head">
                <th class="table-heading" nowrap width="5%">Id</th>
                <th class="table-heading" nowrap width="65%">Название</th>
                <th class="table-heading" nowrap width="25%">Цена</th>
                <th class="table-heading" nowrap width="5%">Изменить</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($goods as $good)

                <tr>
                    <td>{{ $good->good_id }}</td>
                    <td>{{ $good->good_name }}</td>
                    <td>{{ $good->goog_price }}</td>
                    <td><a href="{{ action('Admin\GoodController@edit', $good->good_id) }}"><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true" ></i></a></td>
                </tr>
            @endforeach


            </tbody>
        </table>
    </div>
    <div class="pagination">
        {{ $goods->links() }}
    </div>

@endsection

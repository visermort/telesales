@extends('layouts.app')

@section('content')


    <div class="panel-heading table-heading">Прочее</div>

        <div class="panel col-sm-12 ">
            <form id="photos-form" method="post" action="{{ action('Admin\AdditionalController@store') }}" >
                {{ csrf_field() }}
                <div class="form-group{{ $errors->has('additional_name') ? ' has-error' : '' }} col-sm-6">
                    <label for="additional_name">Название</label>
                    <input id="additional_name" type="text" class="form-control" name="additional_name" placeholder="Название" value="{{ old('additional_name') }}" >
                    @if ($errors->has('additional_name'))
                        <span class="help-block">
                        <strong>{{ $errors->first('additional_name') }}</strong>
                    </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('additional_price') ? ' has-error' : '' }} col-sm-3">
                    <label for="additional_price">Цена</label>
                    <input id="additional_price" type="text" class="form-control" name="additional_price" placeholder="Цена" value="{{ old('additional_price') }}" >
                    @if ($errors->has('additional_price'))
                        <span class="help-block">
                        <strong>{{ $errors->first('additional_price') }}</strong>
                    </span>
                    @endif
                </div>

                <div class="form-group buttons-horizontal col-sm-2">
                    <input class="btn btn-primary" type="submit" value="Создать элемент">
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
            @foreach ($additionals as $additional)

                <tr>
                    <td>{{ $additional->additional_id }}</td>
                    <td>{{ $additional->additional_name }}</td>
                    <td>{{ $additional->additional_price }}</td>
                    <td><a href="{{ action('Admin\AdditionalController@edit', $additional->additional_id) }}"><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true" ></i></a></td>
                </tr>
            @endforeach


            </tbody>
        </table>
    </div>
    <div class="pagination">
        {{ $additionals->links() }}
    </div>

@endsection

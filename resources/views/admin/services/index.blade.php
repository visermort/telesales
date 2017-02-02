@extends('layouts.app')

@section('content')


    <div class="panel-heading table-heading">Услуги</div>

        <div class="panel col-sm-12 ">
            <form id="photos-form" method="post" action="{{ action('Admin\ServiceController@store') }}" >
                {{ csrf_field() }}
                <div class="form-group{{ $errors->has('services_name') ? ' has-error' : '' }} col-sm-6">
                    <label for="services_name">Название</label>
                    <input id="services_name" type="text" class="form-control" name="services_name" placeholder="Название" value="{{ old('services_name') }}" >
                    @if ($errors->has('services_name'))
                        <span class="help-block">
                        <strong>{{ $errors->first('services_name') }}</strong>
                    </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('services_price') ? ' has-error' : '' }} col-sm-3">
                    <label for="services_price">Цена</label>
                    <input id="services_price" type="text" class="form-control" name="services_price" placeholder="Цена" value="{{ old('services_price') }}" >
                    @if ($errors->has('services_price'))
                        <span class="help-block">
                        <strong>{{ $errors->first('services_price') }}</strong>
                    </span>
                    @endif
                </div>

                <div class="form-group buttons-horizontal col-sm-2">
                    <input class="btn btn-primary" type="submit" value="Создать Услугу">
                </div>
            </form>
        </div>



    <div class="panel-body datagrid">

        <table id="tt" class="easyui-datagrid" style="width:100%;height:auto;">
            <thead>
            <tr class="head">
                <th class="table-heading" nowrap width="5%">Id</th>
                <th class="table-heading" nowrap width="65%">Услуга</th>
                <th class="table-heading" nowrap width="25%">Цена</th>
                <th class="table-heading" nowrap width="5%">Изменить</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($services as $service)

                <tr>
                    <td>{{ $service->services_id }}</td>
                    <td>{{ $service->services_name }}</td>
                    <td>{{ $service->services_price }}</td>
                    <td><a href="{{ action('Admin\ServiceController@edit', $service->services_id) }}"><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true" ></i></a></td>
                </tr>
            @endforeach


            </tbody>
        </table>
    </div>
    <div class="pagination">
        {{ $services->links() }}
    </div>

@endsection

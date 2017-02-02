@extends('layouts.app')

@section('content')


    <div class="panel-heading table-heading">Пользователи</div>

        <div class="panel col-sm-12 ">
            <form id="photos-form" method="post" action="{{ action('Admin\UsersController@store') }}" >
                {{ csrf_field() }}
                <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }} col-sm-3">
                    <label for="first_name">Имя</label>
                    <input id="first_name" type="text" class="form-control" name="first_name" placeholder="Имя" value="{{ old('first_name') }}" >
                    @if ($errors->has('first_name'))
                        <span class="help-block">
                        <strong>{{ $errors->first('first_name') }}</strong>
                    </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }} col-sm-3">
                    <label for="last_name">Фамилия</label>
                    <input id="last_name" type="text" class="form-control" name="last_name" placeholder="Фамилия" value="{{ old('last_name') }}" >
                    @if ($errors->has('last_name'))
                        <span class="help-block">
                        <strong>{{ $errors->first('last_name') }}</strong>
                    </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} col-sm-3">
                    <label for="email">Email</label>
                    <input id="email" type="text" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}" >
                    @if ($errors->has('email'))
                        <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                    @endif
                </div>
                <div class="form-group buttons-horizontal col-sm-3">
                    <input class="btn btn-primary" type="submit" value="Создать пользователя">
                </div>
            </form>
        </div>



    <div class="panel-body datagrid">

        <table id="tt" class="easyui-datagrid" style="width:100%;height:auto;">
            <thead>
            <tr class="head">
                <th class="table-heading" nowrap width="5%">Id</th>
                <th class="table-heading" nowrap width="25%">Имя</th>
                <th class="table-heading" nowrap width="25%">Email</th>
                <th class="table-heading" nowrap width="25">Последний вход</th>
                <th class="table-heading" nowrap width="15%">Роли</th>
                <th class="table-heading" nowrap width="5%">Изменить</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($users as $user)

                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->first_name }} {{ $user->last_name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->last_login }} </td>
                    <td></td>
                    <td><a href="{{ action('Admin\UsersController@edit', $user->id) }}"><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true" ></i></a></td>
                </tr>
            @endforeach


            </tbody>
        </table>
    </div>
    <div class="pagination">
        {{ $users->links() }}
    </div>

@endsection

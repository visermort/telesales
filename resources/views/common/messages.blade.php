@extends('layouts.app')

@section('content')

                <div class="panel-heading">{{ $title }}</div>
                <div class="panel-body">
                    <div class="alert @if ($status == true) alert-success @else alert-danger @endif">
                        {{ $message }}
                    </div>
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <a class="btn btn-primary" href="{{ action('HomeController@index') }}">Продолжить</a>
                        </div>
                    </div>
                </div>

@endsection
@extends('layouts.app')

@section('content')
{{--<div class="container">--}}
    {{--<div class="row">--}}
        {{--<div class="col-md-8 col-md-offset-2">--}}
            {{--<div class="panel panel-default">--}}
                <div class="panel-heading">{{ $title }}</div>
                <div class="panel-body">
                    <div class="alert @if ($status == true) alert-success @else alert-danger @endif">
                        {{ $message }}
                    </div>
                </div>
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}
@endsection
@extends('layouts.default')

@section('title')
{{ lang('About Us') }}_@parent
@stop

@section('content')

    <div class="panel padding-lg rm-padding-top">
        <div class="panel-body">

        <div class="markdown-body" id="emojify">


          @foreach ($points as $point)
            <h1>{{ $point->name }}-{{$point->machine->name}}</h1>
          @endforeach


        </div>

        </div>
    </div>

@stop

@extends('layouts.default')

@section('title')
{{$machine->name}}报警趋势图 _@parent
@stop

@section('content')
{!! Charts::assets() !!}


    <div class="panel padding-lg rm-padding-top">
        <div class="panel-body">

        <div class="markdown-body" id="emojify">


       <h3>设备：<a href="{{ route('machines.show', [$machine->id]) }}">
             {{$machine->name}}
           </a>
           &nbsp;&nbsp;测点：{{$point->name}}&nbsp;&nbsp;报警时间：{{$warntime}}&nbsp;&nbsp;图表时间段：{{$start}}~{{$end}}</h3>
          </div>

        <div class="form-group" style="border:1px solid #E8E8E8 ; border-radius:8px">
          {!! $chart->render() !!}
       </div>
        </div>
    </div>

@stop

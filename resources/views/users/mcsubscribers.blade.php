@extends('layouts.default')

@section('title')
{{{ $user->name }}} {{ lang('Mcsubscriber') }}_@parent
@stop

@section('content')

<div class="users-show row">

    <div class="col-md-3">
          @include('users.partials.basicinfo')
    </div>

  <div class="main-col col-md-9 left-col">
    <ol class="breadcrumb">
      <li><a href="{{ route('users.show', $user->id) }}">个人中心</a></li>
      <li class="active">Ta 关注的设备</li>
    </ol>

  <div class="panel panel-default">


        <div class="panel-body">

          @if (count($machines))
    	     <div class="pull-left add-padding-vertically">

             <ul class="list-group">
              @foreach ($machines as $machine)
               <li class="list-group-item" >
                 <a href="{{ route('machines.show', [$machine->id]) }}" title="{{{ $machine->name }}}">
                   <img class="media-object img-thumbnail avatar avatar-small inline-block " src="{{ img_crop($machine->cover, 224, 224) }}">
                     {{{ $machine->name }}}
                   </a>
                   <span class="introduction">
                          - {{{ $machine->description }}}
                     </span>
               </li>
               @endforeach
             </ul>
            </div>
          @else
            <div class="empty-block">{{ lang('Dont have any data Yet') }}~~</div>
          @endif

        </div>

  </div>
  <h3><a href="{{ route('machines.index') }}" class="btn btn-primary pull-right no-pjax">全部设备</a></h3>
</div>
</div>

@stop

@extends('layouts.default')

@section('title')
{{ lang('Machine') }}_@parent
@stop

@section('content')

      @foreach ($machines as $machine)
          <div class="col-md-4">
            <div class="panel panel-default corner-radius">
                     <div class="panel-body text-center topic-author-box blog-info">

                       <div class="image blog-cover">
                         <a href="{{ route('machines.show', $machine->id )}}">
                          <img class=" avatar-112 avatar img-thumbnail" src="{{ img_crop($machine->cover, 224, 224) }}">
                        </a>
                      </div>
                      <div class="blog-name">
                        <h4><a href="{{ route('machines.show', $machine->id )}}">{{ $machine->name }}</a></h4>
                      </div>
                      <div class="blog-description">
                        {{ $machine->description }}
                      </div>

                       <hr>

                        <a href="{{ route('machines.show', $machine->id )}}">
                         <li class="list-group-item"><i class="text-md fa fa-list-ul"></i> &nbsp;设备讨论（{{ $machine->article_count }}）</li>
                        </a>
                      <hr>
                      @if ($currentUser->subscrib($machine))
                          <a data-method="post" class="btn btn-default btn-block" href="javascript:void(0);" data-url="{{ route('machines.unsubscribe', $machine->id) }}">
                            <i class="fa fa-minus"></i> 取消关注
                          </a>
                      @else
                          <div class="follow-box">
                              <a data-method="post" class="btn btn-primary btn-block" href="javascript:void(0);" data-url="{{ route('machines.subscribe', $machine->id) }}">
                                <i class="fa fa-eye"></i> 关注设备
                              </a>
                          </div>
                      @endif
                    </div>
                 </div>
         </div>
      @endforeach

@stop

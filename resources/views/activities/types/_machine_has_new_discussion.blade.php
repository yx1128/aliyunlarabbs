<li class="list-group-item media" >
    <div class="avatar pull-left">
        <a href="{{ $activity->data['machine_link'] }}">
            <img class="media-object img-thumbnail avatar" alt="{{ $activity->data['machine_name'] }}" src="{{ img_crop($activity->data['machine_cover'], 224, 224) }}" />
        </a>
    </div>
    <div class="infos">
        <div class="media-heading">

            <i class="fa fa-book" aria-hidden="true"></i>

            <a href="{{ route('users.show', [$activity->user->id]) }}">
                {{ $activity->user->name }}
            </a>
            在设备 <a href="{{ $activity->data['machine_link'] }}">{{ $activity->data['machine_name'] }}</a>

            中发起了讨论
             <a href="{{ $activity->data['topic_link'] }}" title="{{ $activity->data['topic_title'] }}">
                《{{ str_limit($activity->data['topic_title'], '100') }}》
            </a>
             <span class="meta pull-right">
                 <span class="timeago">{{ $activity->created_at }}</span>
            </span>

            @include("activities._topic_images")
        </div>
    </div>
</li>

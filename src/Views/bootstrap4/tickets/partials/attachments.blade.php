@if(!$attachments->isEmpty())
    @foreach($attachments as $attachment)
        <div class="card mb-3 {!! $attachment->user->tickets_role ? "border-info" : "" !!}">
            <div class="card-header d-flex justify-content-between align-items-baseline flex-wrap {!! $attachment->user->tickets_role ? "bg-info text-white" : "" !!}">
                <div>{!! $attachment->user->name !!}</div>
                <div>{!! $attachment->created_at->diffForHumans() !!}</div>
            </div>
            <div class="card-body">
                <a href="{!! route($setting->grab('main_route').'-attachment.show',$attachment->id) !!}">{!! $attachment->public_name !!}</a>
            </div>
        </div>
    @endforeach
@endif


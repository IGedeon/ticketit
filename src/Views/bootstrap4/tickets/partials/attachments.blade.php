@if(!$attachments->isEmpty())
    @foreach($attachments as $comment)
        <div class="card mb-3 {!! $attachment->user->tickets_role ? "border-info" : "" !!}">
            <div class="card-header d-flex justify-content-between align-items-baseline flex-wrap {!! $attachment->user->tickets_role ? "bg-info text-white" : "" !!}">
                <div>{!! $attachment->user->name !!}</div>
                <div>{!! $attachment->created_at->diffForHumans() !!}</div>
            </div>
            <div class="card-body pb-0">
                {!! $attachment->public_name !!}
            </div>
        </div>
    @endforeach
@endif
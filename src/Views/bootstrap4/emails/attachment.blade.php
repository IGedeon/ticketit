<?php $attachment = unserialize($attachment);?>
<?php $ticket = unserialize($ticket);?>

@extends($email)

@section('subject')
	{{ trans('ticketit::email/globals.attachment') }}
@stop

@section('link')
	<a style="color:#ffffff" href="{{ route($setting->grab('main_route').'.show', $ticket->id) }}">
		{{ trans('ticketit::email/globals.view-ticket') }}
	</a>
@stop

@section('content')
	{!! trans('ticketit::email/attachment.data', [
	    'name'      =>  $attachment->user->name,
	    'subject'   =>  $ticket->subject,
	    'status'    =>  $ticket->status->name,
	    'category'  =>  $ticket->category->name,
	    'attachment'   =>  $attachment->public_name
	]) !!}
@stop

{!! CollectiveForm::open(['method' => 'POST', 'route' => $setting->grab('main_route').'-attachment.store', 'class' => '', 'files' => true]) !!}


{!! CollectiveForm::hidden('ticket_id', $ticket->id ) !!}

{!! CollectiveForm::file('attachment', $attributes = array()) !!}

{!! CollectiveForm::submit( trans('ticketit::lang.upload_attachment'), ['class' => 'btn btn-outline-primary pull-right mt-3 mb-3 ml-3']) !!}

{!! CollectiveForm::close() !!}
    
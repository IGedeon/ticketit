<?php

namespace Kordy\Ticketit\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Kordy\Ticketit\Models;
use Kordy\Ticketit\Models\Agent;
use Kordy\Ticketit\Models\Attachment;

class AttachmentsController extends Controller
{

    public function __construct(Attachment $attachments, Agent $agent)
    {
        $this->middleware('Kordy\Ticketit\Middleware\ResAccessMiddleware', ['only' => ['show','store']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'attachment' => 'required|max:20480',
            'ticket_id'   => 'required|exists:ticketit,id',
        ]);
        
        $private_name = $request->file('attachment')->store('attachments');

        $attachment = new Models\Attachment();

        $attachment->private_name = $private_name;

        $attachment->public_name = $request->file('attachment')->getClientOriginalName();

        $attachment->ticket_id = $request->get('ticket_id');
        $attachment->user_id = \Auth::user()->id;
        $attachment->save();

        $ticket = Models\Ticket::find($attachment->ticket_id);
        $ticket->updated_at = $attachment->created_at;
        $ticket->save();

        return back()->with('status', trans('ticketit::lang.attachment-has-been-added-ok'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $attachment = Attachment::findOrFail($id);
        return Storage::download($attachment->private_name,$attachment->public_name);
    }

    

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int     $id
     *
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}

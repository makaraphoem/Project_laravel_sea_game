<?php

namespace App\Http\Controllers;

use App\Http\Requests\TicketRequest;
use App\Http\Resources\ShowTicketRecource;
use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tickets = Ticket::all();
        $tickets =  ShowTicketRecource::collection($tickets);
        return response()->json(['Get ticket success'=>true, 'data'=>$tickets], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TicketRequest $request)
    {
        $ticket = Ticket::store($request);
        return response()->json(['Create ticket success'=>true, 'data'=>$ticket], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $ticket = Ticket::find($id);
        $ticket = new ShowTicketRecource($ticket);
        return response()->json(['Show ticket by id success'=>true, 'data'=>$ticket], 201);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TicketRequest $request, string $id)
    {
        $ticket = Ticket::store($request, $id);
        return response()->json(['Create ticket success'=>true, 'data'=>$ticket], 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $ticket = Ticket::find($id);
        $ticket->delete();
        return response()->json(['Delete ticket success'=>true, 'data'=>$ticket], 200);
    }
}

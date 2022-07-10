<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ticket = Ticket::all();
        return response($ticket);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function searchBy(Request $request)
    {
        $query_params = array ();
        $query_aux = array();
        if ($request->ciudad_origen) {
            $query_aux = array('ciudad_origen','=',$request->ciudad_origen);
            array_push($query_params, $query_aux);
        }
        if ($request->ciudad_destino) {
            $query_aux = array('ciudad_destino','=',$request->ciudad_destino);
            array_push($query_params, $query_aux);
        }
        if ($request->fecha_salida) {
            $query_aux = array('fecha_salida','=',$request->fecha_salida);
            array_push($query_params, $query_aux);
        }
        if ($request->fecha_retorno) {
            $query_aux = array('fecha_retorno','=',$request->fecha_retorno);
            array_push($query_params, $query_aux);
        }

        $ticket = Ticket::where($query_params)->get();

        return response($ticket);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $validator = $request->validate([
                'ciudad_origen' => 'required',
            ]);

            $ticket = Ticket::create($request->all());
            return response($ticket);

        } catch (ValidationException $exception) {
            return $exception;
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ticket = Ticket::findOrFail($id);
        return response($ticket);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $ticket = Ticket::findOrFail($id)
            ->update($request->all());
        return response($ticket);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Ticket::destroy($id);
        return response("Tarea eliminada");
    }
}

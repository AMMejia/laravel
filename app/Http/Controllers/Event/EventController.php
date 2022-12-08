<?php

namespace App\Http\Controllers\Event;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\EventCollection;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(new EventCollection(Event::all()->sortByDesc('id')), 200);
    }

    /**
     * Display one field of the current resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        return response()->json($event, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = auth()->guard('api')->user();
        
        \DB::beginTransaction();
        try {
            $event = new Event();
            $event->title = $request->title;
            $event->start = $request->start;
            $event->color = json_encode($request->color);
            $event->resizable = json_encode($request->resizable);
            $event->products = json_encode($request->products);
            $event->total = $request->total;
            $event->salon = $request->salon;
            $event->cliente = $request->cliente;
            $event->gte_de_gpos = $request->gte_de_gpos;
            $event->pax = $request->pax;
            $event->montaje = $request->montaje;
            $event->notas = $request->notas;
            $event->equipment = $request->equipment;
            $event->operation = $request->operation;
            $event->entertainment = $request->entertainment;
            $event->subtotal = $request->subtotal;
            $event->final = $request->final;
            $event->iva = $request->iva;
            $event->costo_unitario = $request->costo_unitario;
            $event->flete = json_encode($request->flete);
            $event->hotel = $request->hotel;
            $event->comision = $request->comision;
            $event->comisionFinal = $request->comisionFinal;
            $event->coordinacion = json_encode($request->coordinacion);
            $event->ctoOperacion = $request->ctoOperacion;
            $event->entretenimiento = json_encode($request->entretenimiento);
            $event->finalDlrs = $request->finalDlrs;
            $event->group = $request->group;
            $event->ivaDlrs = $request->ivaDlrs;
            $event->ivaFinal = $request->ivaFinal;
            $event->mn = $request->mn;
            $event->proveedores = json_encode($request->proveedores);
            $event->subEntretainment = $request->subEntretainment;
            $event->subEquipment = $request->subEquipment;
            $event->subOperacion = $request->subOperacion;
            $event->subTotalDlrs = $request->subTotalDlrs;
            $event->subtotalFinal = $request->subtotalFinal;
            $event->totalDlrs = $request->totalDlrs;
            $event->totalIvaFinal = $request->totalIvaFinal;
            $event->utilidad = $request->utilidad;
            $event->workforce = json_encode($request->workforce);
            $event->cambio = $request->cambio;
            $event->user()->associate($user);
            $event->save();
             
            \DB::commit();
            return response()->json($event, 200);
        } catch (\Exception $exception) {
            \DB::rollback();
            return response()->json($exception->getMessage(), 404);
        }
    }

     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Event $event, Request $request)
    {
        
        $event->update($request->only([
            'title',
            'start',
            'draggable',
            'salon',
            'cliente',
            'gte_de_gpos',
            'pax',
            'montaje',
            'notas',
            'equipment',
            'operation',
            'entertainment',
            'subtotal',
            'final',
            'iva',
            'total',
            'costo_unitario',
            'mano_de_obra',
            'hotel',
            'comision',
            'comisionFinal',
            'ctoOperacion',
            'finalDlrs',
            'group',
            'ivaDlrs',
            'ivaFinal',
            'mn',
            'subEntretainment',
            'subEquipment',
            'subOperacion',
            'subTotalDlrs',
            'subtotalFinal',
            'totalDlrs',
            'totalIvaFinal',
            'utilidad', 
            'cambio',
            ]));

        $event->update([
            "color" => json_encode($request->color),
            "resizable" => json_encode($request->resizable),
            "products" => json_encode($request->products),
            "flete" => json_encode($request->flete),
            "coordinacion" => json_encode($request->coordinacion),
            "entretenimiento" => json_encode($request->entretenimiento),
            "proveedores" => json_encode($request->proveedores),
            "workforce" => json_encode($request->workforce),
        ]);

        return response()->json($event, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     *  @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        $event->delete();
        return response()->json('Success', 200);
    }
}

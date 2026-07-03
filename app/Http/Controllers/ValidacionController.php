<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\PolizaFactura;
use App\Models\Validacion;
use App\Models\Recibo;
use Illuminate\Support\Facades\DB;

class ValidacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return Inertia::render('Validacion');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        //
        $poliza = $request->all();
        $facturas = $poliza['facturas'];
        unset($poliza['facturas']);
        try{
            DB::beginTransaction();
            PolizaFactura::where('poliza', $poliza['poliza_gasto'])->delete();
            Recibo::where('poliza', $poliza['poliza_gasto'])->delete();
            foreach ($facturas as $factura) {
                if($factura['Tipo'] == 'Factura'){
                    PolizaFactura::create([
                        'uuid' => $factura['UUID'],
                        'total'=> $factura['Total'],
                        'poliza' => $poliza['poliza_gasto'],
                    ]);
                }else{
                    $recibo = array_merge($factura, ['poliza' => $poliza['poliza_gasto']]);
                    Recibo::create(array_merge($factura, ['poliza' => $poliza['poliza_gasto']]));
                }
                // actualiza el estatus de la validacion de la poliza
            }
            Validacion::updateOrCreate(
                ['poliza' => $poliza['poliza_gasto']],
                ['status' => $poliza['status']]
            );
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Poliza;
use App\Models\Validacion;
use Illuminate\Support\Facades\DB;

class PolizaController extends Controller
{
    /**
     * Display the specified resource.
     */
    public function search(Request $request)
    {
        $polizas = Poliza::where('poliza_gasto',$request->query('poliza'))->limit(10)->get();
        return response()->json($polizas);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //exportacion
        $filas = Poliza::whereIn('poliza_gasto',Validacion::select('poliza')->get())->get();
        return response()->json($filas);
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

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $poliza = Poliza::findOrFail($id);
        return response()->json($poliza);
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

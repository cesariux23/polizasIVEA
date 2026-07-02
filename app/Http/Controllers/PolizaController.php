<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Poliza;

class PolizaController extends Controller
{
    /**
     * Display the specified resource.
     */
    public function search(Request $request)
    {
        $polizas = Poliza::where('poliza_gasto',$request->query('poliza'))->get();
        return response()->json($polizas);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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

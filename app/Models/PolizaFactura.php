<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PolizaFactura extends Model
{
    //
    protected $table = 'poliza_factura';
    protected $fillable = [
        'uuid',
        'total',
        'poliza',
    ];
}

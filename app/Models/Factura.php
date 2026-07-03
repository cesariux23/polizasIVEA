<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    //
    protected $table = 'facturas';
    protected $primaryKey = 'UUID';
    public $incrementing = false;
    protected $keyType = 'string';

    protected function casts(): array
    {
        return [
            'Total' => 'float',
            'SubTotal' => 'float',
            'TotalImpuestoTrasladado' => 'float',
        ];
    }

    public $appends = ['Tipo'];

    public function getTipoAttribute()
    {
        return 'Factura';
    }
}

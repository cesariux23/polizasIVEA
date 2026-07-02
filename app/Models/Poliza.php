<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Poliza extends Model
{
    //
    protected $table = 'polizas';
    protected $primaryKey = 'poliza_gasto';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $with = ['facturas'];
    protected $appends = ['status'];

     public function facturas(): HasManyThrough
    {
        return $this->hasManyThrough(Factura::class, PolizaFactura::class, 'poliza', 'UUID', 'poliza_gasto', 'uuid');
    }

    public function statusObj(): HasOne
    {
        return $this->hasOne(Validacion::class, 'poliza', 'poliza_gasto');
    }

    public function getStatusAttribute()
    {
        return $this->statusObj ? $this->statusObj->status : null;
    }


    protected function casts(): array
    {
        return [
            'Importe_gasto' => 'float',
        ];
    }
}

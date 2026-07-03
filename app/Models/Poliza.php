<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
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

    public function facturas(): HasMany
    {
        return $this->hasMany(PolizaFactura::class, 'poliza', 'poliza_gasto')
            ->join('facturas', 'poliza_factura.uuid', '=', 'facturas.UUID')
            ->select('poliza_factura.*', 'poliza_factura.Total', 'facturas.UUID', 'facturas.SubTotal','facturas.Fecha', 'facturas.NombreEmisor', 'facturas.RfcEmisor', 'facturas.Descripcion', 'facturas.TotalImpuestosTrasladados');
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

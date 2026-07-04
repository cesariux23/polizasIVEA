<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\DB;

class Poliza extends Model
{
    //
    protected $table = 'polizas';
    protected $primaryKey = 'poliza_gasto';
    public $incrementing = false;
    public $timestamps = false;
    protected $keyType = 'string';

    protected $with = ['recibos'];
    protected $appends = ['facturas', 'status'];

    public function facturas(): HasMany
    {
        return $this->hasMany(PolizaFactura::class, 'poliza', 'poliza_gasto')
            ->join('facturas', 'poliza_factura.uuid', '=', 'facturas.UUID')
            ->select('poliza_factura.Total', 'facturas.UUID', 'facturas.Folio', 'facturas.SubTotal','facturas.Fecha', 'facturas.NombreEmisor', 'facturas.RfcEmisor', 'facturas.Descripcion', 'facturas.TotalImpuestosTrasladados', 'facturas.Total as Total_Original', DB::raw("'Factura' as Tipo"));
    }
    public function recibos(): HasMany
    {
        return $this->hasMany(Recibo::class, 'poliza', 'poliza_gasto')
        ->select('recibos.*', DB::raw("'Recibo' as Tipo"))
        ;
    }

    public function getFacturasAttribute()
    {
        return array_merge($this->facturas()->get()->toArray(), $this->recibos()->get()->toArray());
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

    protected $fillable = [
        'poliza_pago',
        'fecha_poliza_pago',
        'institucion_bancaria',
        'numero_cuenta',
        'referencia',
        'fecha_transferencia',
        'importe_pago',
    ];
}

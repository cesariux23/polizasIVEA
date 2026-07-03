<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recibo extends Model
{
    //
    protected $table = 'recibos';

    protected $fillable = [
        'poliza',
        'NombreEmisor',
        'Fecha',
        'Total',
        'Descripcion',
        'UUID',
    ];

    public $appends = ['Tipo'];

    public function getTipoAttribute()
    {
        return 'Recibo';
    }

     protected function casts(): array
    {
        return [
            'Total' => 'float',
        ];
    }
}

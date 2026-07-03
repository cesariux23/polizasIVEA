<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Validacion extends Model
{
    //
    protected $table = 'validacion';
    protected $primaryKey = 'poliza';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'poliza',
        'status',
    ];

    public  function getFechaValidacionAttribute() {
        $this->created_at = \Carbon\Carbon::parse($this->created_at)->format('d-m-Y');

    }
}

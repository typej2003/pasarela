<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MetodoPagoC extends Model
{
    use HasFactory;

    protected $fillable = [
        'comercio_id',
        'metodopago',
        'tipocuenta',
        'marcaInternaciona',
        'nrocuenta',
        'ccv-cvv',
        'fechavencimiento',
        'fecha',
        'telefono',
        'titular',
        'tipodocumento',
        'documento',
        'descripcion',
        'pagoonline',
        'email',
        'exchange',
        'exchangeaddress',
    ];

    public function comercios()
    {
        return $this->hasMany('Comercio');
    }
}

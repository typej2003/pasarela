<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaccion extends Model
{
    use HasFactory;

    const STATUS_CONFIRMED = 'confirmed';

    const STATUS_NOTCONFIRMED = 'notconfirmed';

    protected $fillable = [
        'userId',
        'comercioId',
        'clienteId',
        'paymentId',
        'codigoFactura',
        'metodo',
        'currency',
        'banco',
        'codigo',
        'reference',
        'title',
        'description',
        'email',
        'identificationNac',
        'identificationNumber',
        'cellphonecode',
        'cellphone',
        'rifLetter',
        'rifNumber',
        'fechaPago',
        'fecha',
        'amount',
        'status',
    ];

}

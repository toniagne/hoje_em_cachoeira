<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $fillable = [
        'bill_entry_id',
        'nossonumero',
        'id_unico',
        'banco_numero',
        'token_facilitador',
        'linkBoleto',
        'linkGrupo',
        'linhaDigitavel',
        'pedido_numero',
        'situation',
        'credencial'
    ];
}

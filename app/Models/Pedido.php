<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    protected $table = 'pedidos';

    protected $fillable = [
        'cliente_id',
        'fecha_entrega',
        'estado',
        'total',
        'direccion_entrega',
    ];

    protected $casts = [
        'fecha_entrega' => 'date',
        'total' => 'decimal:2'
    ];

    // Relación: Un pedido pertenece a un cliente
    public function detalles()
    {
        return $this->hasMany(DetallePedido::class);
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

}

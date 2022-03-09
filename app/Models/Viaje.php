<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Viaje extends Model
{
    use SoftDeletes;
    use HasFactory;

    public const ESTADO_SELECT = [
        'activo'     => 'Activo',
        'revision'   => 'En Revisión',
        'asignar'    => 'Por Asignar',
        'finalizado' => 'Finalizado',
    ];

    public const ESTADO_BACKGROUND = [
        'activo'     => 'bg-primary',
        'revision'   => 'bg-danger',
        'asignar'    => 'bg-warning',
        'finalizado' => 'bg-info',
    ];

    public $table = 'viajes';

    protected $dates = [
        'fecha_pago',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'nombre_viaje',
        'cliente_id',
        'unidad_id',
        'operador_id',
        'estado',
        'monto_pagado',
        'fecha_pago',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'cliente_id');
    }

    public function unidad()
    {
        return $this->belongsTo(Unidad::class, 'unidad_id');
    }

    public function operador()
    {
        return $this->belongsTo(Operador::class, 'operador_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}

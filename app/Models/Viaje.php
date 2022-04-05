<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Support\HasAdvancedFilter;


class Viaje extends Model
{
    use SoftDeletes;
    use HasFactory;
    use HasAdvancedFilter;

    public const ESTADO_SELECT = [
        'activo'     => 'Activo',
        'revision'   => 'En Revisión',
        'asignar'    => 'Por Asignar',
        'finalizado' => 'Finalizado',
    ];

    public const ESTADO_BACKGROUND = [
        'activo'     => 'activo',
        'revision'   => 'bg-danger',
        'asignar'    => 'bg-warning',
        'finalizado' => 'bg-info',
    ];

    public const GASTOS_OTROS = [
        'HOTELES'     => 'Hoteles',
        'MISC'        => 'Misceláneos',
        'COMIDAS'    => 'Comidas',
        'MANIOBRAS' => 'Maniobras',
        'OTROS' => 'Otros',
    ];

    public $table = 'viajes';

    public $orderable = [
        'id',
        'viaje',
        'otro',
    ];

    public $filterable = [
        'id',
        'viaje',
        'otro',
    ];

    protected $dates = [
        'fecha_pago',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'nombre_viaje',
        'destino',
        'unidad_id',
        'operador_id',
        'estado',
        'monto_pagado',
        'fecha_pago',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function unidad()
    {
        return $this->belongsTo(Unidad::class, 'unidad_id');
    }

    public function operador()
    {
        return $this->belongsTo(Operador::class, 'operador_id');
    }

    public function entregas(){
        return $this->hasMany(Entrega::class);
    }

    public function anticipos(){
        return $this->hasMany(AnticiposViaje::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function casetas(){
        return $this->hasMany(EvidenciaCaseta::class);
    }

    public function combustibles(){
        return $this->hasMany(EvidenciaCombustible::class);
    }

    public function facturas()
    {
        return $this->hasManyThrough(Factura::class, Entrega::class);
    }
}

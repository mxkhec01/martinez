<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'catalogo_access',
            ],
            [
                'id'    => 18,
                'title' => 'menu_cliente_access',
            ],
            [
                'id'    => 19,
                'title' => 'cliente_create',
            ],
            [
                'id'    => 20,
                'title' => 'cliente_edit',
            ],
            [
                'id'    => 21,
                'title' => 'cliente_show',
            ],
            [
                'id'    => 22,
                'title' => 'cliente_delete',
            ],
            [
                'id'    => 23,
                'title' => 'cliente_access',
            ],
            [
                'id'    => 24,
                'title' => 'agregar_cliente_create',
            ],
            [
                'id'    => 25,
                'title' => 'agregar_cliente_edit',
            ],
            [
                'id'    => 26,
                'title' => 'agregar_cliente_show',
            ],
            [
                'id'    => 27,
                'title' => 'agregar_cliente_delete',
            ],
            [
                'id'    => 28,
                'title' => 'agregar_cliente_access',
            ],
            [
                'id'    => 29,
                'title' => 'menu_operadore_access',
            ],
            [
                'id'    => 30,
                'title' => 'operador_create',
            ],
            [
                'id'    => 31,
                'title' => 'operador_edit',
            ],
            [
                'id'    => 32,
                'title' => 'operador_show',
            ],
            [
                'id'    => 33,
                'title' => 'operador_delete',
            ],
            [
                'id'    => 34,
                'title' => 'operador_access',
            ],
            [
                'id'    => 35,
                'title' => 'ver_operadore_create',
            ],
            [
                'id'    => 36,
                'title' => 'ver_operadore_edit',
            ],
            [
                'id'    => 37,
                'title' => 'ver_operadore_show',
            ],
            [
                'id'    => 38,
                'title' => 'ver_operadore_delete',
            ],
            [
                'id'    => 39,
                'title' => 'ver_operadore_access',
            ],
            [
                'id'    => 40,
                'title' => 'unidad_create',
            ],
            [
                'id'    => 41,
                'title' => 'unidad_edit',
            ],
            [
                'id'    => 42,
                'title' => 'unidad_show',
            ],
            [
                'id'    => 43,
                'title' => 'unidad_delete',
            ],
            [
                'id'    => 44,
                'title' => 'unidad_access',
            ],
            [
                'id'    => 45,
                'title' => 'menu_unidade_access',
            ],
            [
                'id'    => 46,
                'title' => 'agregar_unidade_create',
            ],
            [
                'id'    => 47,
                'title' => 'agregar_unidade_edit',
            ],
            [
                'id'    => 48,
                'title' => 'agregar_unidade_show',
            ],
            [
                'id'    => 49,
                'title' => 'agregar_unidade_delete',
            ],
            [
                'id'    => 50,
                'title' => 'agregar_unidade_access',
            ],
            [
                'id'    => 51,
                'title' => 'edicion_access',
            ],
            [
                'id'    => 52,
                'title' => 'menu_entrega_access',
            ],
            [
                'id'    => 53,
                'title' => 'entrega_create',
            ],
            [
                'id'    => 54,
                'title' => 'entrega_edit',
            ],
            [
                'id'    => 55,
                'title' => 'entrega_show',
            ],
            [
                'id'    => 56,
                'title' => 'entrega_delete',
            ],
            [
                'id'    => 57,
                'title' => 'entrega_access',
            ],
            [
                'id'    => 58,
                'title' => 'menu_asigna_entrega_create',
            ],
            [
                'id'    => 59,
                'title' => 'menu_asigna_entrega_edit',
            ],
            [
                'id'    => 60,
                'title' => 'menu_asigna_entrega_show',
            ],
            [
                'id'    => 61,
                'title' => 'menu_asigna_entrega_delete',
            ],
            [
                'id'    => 62,
                'title' => 'menu_asigna_entrega_access',
            ],
            [
                'id'    => 63,
                'title' => 'menu_viaje_access',
            ],
            [
                'id'    => 64,
                'title' => 'viaje_create',
            ],
            [
                'id'    => 65,
                'title' => 'viaje_edit',
            ],
            [
                'id'    => 66,
                'title' => 'viaje_show',
            ],
            [
                'id'    => 67,
                'title' => 'viaje_delete',
            ],
            [
                'id'    => 68,
                'title' => 'viaje_access',
            ],
            [
                'id'    => 69,
                'title' => 'anticipos_viaje_create',
            ],
            [
                'id'    => 70,
                'title' => 'anticipos_viaje_edit',
            ],
            [
                'id'    => 71,
                'title' => 'anticipos_viaje_show',
            ],
            [
                'id'    => 72,
                'title' => 'anticipos_viaje_delete',
            ],
            [
                'id'    => 73,
                'title' => 'anticipos_viaje_access',
            ],
            [
                'id'    => 74,
                'title' => 'menu_agregar_viaje_create',
            ],
            [
                'id'    => 75,
                'title' => 'menu_agregar_viaje_edit',
            ],
            [
                'id'    => 76,
                'title' => 'menu_agregar_viaje_show',
            ],
            [
                'id'    => 77,
                'title' => 'menu_agregar_viaje_delete',
            ],
            [
                'id'    => 78,
                'title' => 'menu_agregar_viaje_access',
            ],
            [
                'id'    => 79,
                'title' => 'factura_create',
            ],
            [
                'id'    => 80,
                'title' => 'factura_edit',
            ],
            [
                'id'    => 81,
                'title' => 'factura_show',
            ],
            [
                'id'    => 82,
                'title' => 'factura_delete',
            ],
            [
                'id'    => 83,
                'title' => 'factura_access',
            ],
            [
                'id'    => 84,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}

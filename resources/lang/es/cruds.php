<?php

return [
    'userManagement' => [
        'title'          => 'Gestión de Usuarios',
        'title_singular' => 'Gestión de Usuarios',
    ],
    'permission' => [
        'title'          => 'Permisos',
        'title_singular' => 'Permiso',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'title'             => 'Title',
            'title_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'role' => [
        'title'          => 'Roles',
        'title_singular' => 'Rol',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'title'              => 'Title',
            'title_helper'       => ' ',
            'permissions'        => 'Permissions',
            'permissions_helper' => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'user' => [
        'title'          => 'Usuarios',
        'title_singular' => 'Usuario',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => ' ',
            'name'                     => 'Name',
            'name_helper'              => ' ',
            'email'                    => 'Email',
            'email_helper'             => ' ',
            'email_verified_at'        => 'Email verified at',
            'email_verified_at_helper' => ' ',
            'password'                 => 'Password',
            'password_helper'          => ' ',
            'roles'                    => 'Roles',
            'roles_helper'             => ' ',
            'remember_token'           => 'Remember Token',
            'remember_token_helper'    => ' ',
            'created_at'               => 'Created at',
            'created_at_helper'        => ' ',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => ' ',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => ' ',
        ],
    ],
    'catalogo' => [
        'title'          => 'Catálogos',
        'title_singular' => 'Catálogo',
    ],
    'menuCliente' => [
        'title'          => 'Clientes',
        'title_singular' => 'Cliente',
    ],
    'cliente' => [
        'title'          => 'Clientes',
        'title_singular' => 'Cliente',
        'fields'         => [
            'id'                     => 'ID',
            'id_helper'              => ' ',
            'razon_social'           => 'Razón Social',
            'razon_social_helper'    => ' ',
            'calle'                  => 'Calle',
            'calle_helper'           => ' ',
            'numero_exterior'        => 'Número Exterior',
            'numero_exterior_helper' => ' ',
            'colonia'                => 'Colonia',
            'colonia_helper'         => ' ',
            'codigo_postal'          => 'Código Postal',
            'codigo_postal_helper'   => ' ',
            'estado'                 => 'Estado',
            'estado_helper'          => ' ',
            'ciudad'                 => 'Ciudad',
            'ciudad_helper'          => ' ',
            'created_at'             => 'Created at',
            'created_at_helper'      => ' ',
            'updated_at'             => 'Updated at',
            'updated_at_helper'      => ' ',
            'deleted_at'             => 'Deleted at',
            'deleted_at_helper'      => ' ',
            'latitud'                => 'Latitud',
            'latitud_helper'         => ' ',
            'longitud'               => 'Longitud',
            'longitud_helper'        => ' ',
        ],
    ],
    'agregarCliente' => [
        'title'          => 'Agregar Clientes',
        'title_singular' => 'Agregar Cliente',
    ],
    'menuOperadore' => [
        'title'          => 'Operadores',
        'title_singular' => 'Operadore',
    ],
    'operador' => [
        'title'          => 'Agregar Operadores',
        'title_singular' => 'Agregar Operadore',
        'fields'         => [
            'id'                      => 'ID',
            'id_helper'               => ' ',
            'nombre'                  => 'Nombre',
            'nombre_helper'           => ' ',
            'fecha_nacimiento'        => 'Fecha Nacimiento',
            'fecha_nacimiento_helper' => ' ',
            'fecha_ingreso'           => 'Fecha Ingreso',
            'fecha_ingreso_helper'    => ' ',
            'licencia'                => 'Licencia',
            'licencia_helper'         => ' ',
            'vence'                   => 'Vence',
            'vence_helper'            => ' ',
            'tipo_licencia'           => 'Tipo Licencia',
            'tipo_licencia_helper'    => ' ',
            'imss'                    => 'Imss',
            'imss_helper'             => ' ',
            'rfc'                     => 'RFC',
            'rfc_helper'              => ' ',
            'curp'                    => 'CURP',
            'curp_helper'             => ' ',
            'tarjeta_bancaria'        => 'Tarjeta Bancaria',
            'tarjeta_bancaria_helper' => ' ',
            'banco'                   => 'Banco',
            'banco_helper'            => ' ',
            'usuario'                 => 'Usuario Aplicación',
            'usuario_helper'          => ' ',
            'password'                => 'Password Aplicación',
            'password_helper'         => ' ',
            'created_at'              => 'Created at',
            'created_at_helper'       => ' ',
            'updated_at'              => 'Updated at',
            'updated_at_helper'       => ' ',
            'deleted_at'              => 'Deleted at',
            'deleted_at_helper'       => ' ',
        ],
    ],
    'operador_grafica' => [
        'title'          => 'Agregar Operadores',
        'title_singular' => 'Agregar Operadore',
        'fields'         => [
            'id'                      => 'ID',
            'id_helper'               => ' ',
            'nombre'                  => 'Nombre',
            'nombre_helper'           => ' ',
            'fecha_nacimiento'        => 'Fecha Nacimiento',
            'fecha_nacimiento_helper' => ' ',
            'fecha_ingreso'           => 'Fecha Ingreso',
            'fecha_ingreso_helper'    => ' ',
            'licencia'                => 'Licencia',
            'licencia_helper'         => ' ',
            'vence'                   => 'Vence',
            'vence_helper'            => ' ',
            'tipo_licencia'           => 'Tipo',
            'tipo_licencia_helper'    => ' ',
            'imss'                    => 'Imss',
            'imss_helper'             => ' ',
            'rfc'                     => 'RFC',
            'rfc_helper'              => ' ',
            'curp'                    => 'CURP',
            'curp_helper'             => ' ',
            'tarjeta_bancaria'        => 'Tarjeta Bancaria',
            'tarjeta_bancaria_helper' => ' ',
            'banco'                   => 'Banco',
            'banco_helper'            => ' ',
            'usuario'                 => 'Usuario Aplicación',
            'usuario_helper'          => ' ',
            'password'                => 'Password Aplicación',
            'password_helper'         => ' ',
            'created_at'              => 'Created at',
            'created_at_helper'       => ' ',
            'updated_at'              => 'Updated at',
            'updated_at_helper'       => ' ',
            'deleted_at'              => 'Deleted at',
            'deleted_at_helper'       => ' ',
        ],
    ],
    'verOperadore' => [
        'title'          => 'Ver Operadores',
        'title_singular' => 'Ver Operadore',
    ],
    'unidad' => [
        'title'          => 'Ver Unidades',
        'title_singular' => 'Ver Unidade',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'codigo'             => 'Código',
            'codigo_helper'      => ' ',
            'nombre'             => 'Nombre',
            'nombre_helper'      => ' ',
            'placas'             => 'Placas',
            'placas_helper'      => ' ',
            'tipo_unidad'        => 'Tipo Unidad',
            'tipo_unidad_helper' => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'unidad_grafica' => [
        'title'          => 'Ver Unidades',
        'title_singular' => 'Ver Unidade',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'codigo'             => 'Código',
            'codigo_helper'      => ' ',
            'nombre'             => 'Nombre',
            'nombre_helper'      => ' ',
            'placas'             => 'Placas',
            'placas_helper'      => ' ',
            'tipo_unidad'        => 'Tipo',
            'tipo_unidad_helper' => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'menuUnidade' => [
        'title'          => 'Unidades',
        'title_singular' => 'Unidade',
    ],
    'agregarUnidade' => [
        'title'          => 'Agregar Unidades',
        'title_singular' => 'Agregar Unidade',
    ],
    'edicion' => [
        'title'          => 'Edición',
        'title_singular' => 'Edición',
    ],
    'menuEntrega' => [
        'title'          => 'Entregas',
        'title_singular' => 'Entrega',
    ],
    'entrega' => [
        'title'          => 'Ver Entregas',
        'title_singular' => 'Ver Entrega',
        'fields'         => [
            'id'                   => 'ID',
            'id_helper'            => ' ',
            'cliente'              => 'Cliente',
            'cliente_helper'       => ' ',
            'fecha_llegada'        => 'Fecha Llegada',
            'fecha_llegada_helper' => ' ',
            'fecha_entrega'        => 'Fecha Entrega',
            'fecha_entrega_helper' => ' ',
            'created_at'           => 'Created at',
            'created_at_helper'    => ' ',
            'updated_at'           => 'Updated at',
            'updated_at_helper'    => ' ',
            'deleted_at'           => 'Deleted at',
            'deleted_at_helper'    => ' ',
            'viaje'                => 'Viaje',
            'viaje_helper'         => ' ',
        ],
    ],
    'menuAsignaEntrega' => [
        'title'          => 'Asignar Entrega',
        'title_singular' => 'Asignar Entrega',
    ],
    'menuViaje' => [
        'title'          => 'Viajes',
        'title_singular' => 'Viaje',
    ],
    'viaje' => [
        'title'          => 'Ver Viajes',
        'title_singular' => 'Ver Viaje',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => ' ',
            'cliente'             => 'Cliente',
            'cliente_helper'      => ' ',
            'unidad'              => 'Unidad',
            'unidad_helper'       => ' ',
            'operador'            => 'Operador',
            'operador_helper'     => ' ',
            'estado'              => 'Estado',
            'estado_helper'       => ' ',
            'created_at'          => 'Created at',
            'created_at_helper'   => ' ',
            'updated_at'          => 'Updated at',
            'updated_at_helper'   => ' ',
            'deleted_at'          => 'Deleted at',
            'deleted_at_helper'   => ' ',
            'nombre_viaje'        => 'Destino',
            'nombre_viaje_helper' => ' ',
        ],
    ],
    'anticiposViaje' => [
        'title'          => 'Agregar Anticipos',
        'title_singular' => 'Agregar Anticipo',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'viaje'              => 'Viaje',
            'viaje_helper'       => ' ',
            'monto'              => 'Monto',
            'monto_helper'       => ' ',
            'descripcion'        => 'Descripción',
            'descripcion_helper' => ' ',
            'fecha'              => 'Fecha Anticipo',
            'fecha_helper'       => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'menuAgregarViaje' => [
        'title'          => 'Agregar Viaje',
        'title_singular' => 'Agregar Viaje',
    ],
    'factura' => [
        'title'          => 'Factura',
        'title_singular' => 'Factura',
        'fields'         => [
            'id'                    => 'ID',
            'id_helper'             => ' ',
            'numero_factura'        => 'Numero Factura',
            'numero_factura_helper' => ' ',
            'created_at'            => 'Created at',
            'created_at_helper'     => ' ',
            'updated_at'            => 'Updated at',
            'updated_at_helper'     => ' ',
            'deleted_at'            => 'Deleted at',
            'deleted_at_helper'     => ' ',
            'entrega'               => 'Entrega',
            'entrega_helper'        => ' ',
        ],
    ],
];

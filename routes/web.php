<?php

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Cliente
    Route::delete('clientes/destroy', 'ClienteController@massDestroy')->name('clientes.massDestroy');
    Route::resource('clientes', 'ClienteController');

    // Agregar Clientes
    Route::delete('agregar-clientes/destroy', 'AgregarClientesController@massDestroy')->name('agregar-clientes.massDestroy');
    Route::resource('agregar-clientes', 'AgregarClientesController');

    // Operador
    Route::delete('operadors/destroy', 'OperadorController@massDestroy')->name('operadors.massDestroy');
    Route::resource('operadors', 'OperadorController');

    // Ver Operadores
    Route::delete('ver-operadores/destroy', 'VerOperadoresController@massDestroy')->name('ver-operadores.massDestroy');
    Route::resource('ver-operadores', 'VerOperadoresController');

    // Unidad
    Route::delete('unidads/destroy', 'UnidadController@massDestroy')->name('unidads.massDestroy');
    Route::resource('unidads', 'UnidadController');

    // Agregar Unidades
    Route::delete('agregar-unidades/destroy', 'AgregarUnidadesController@massDestroy')->name('agregar-unidades.massDestroy');
    Route::resource('agregar-unidades', 'AgregarUnidadesController');

    // Entrega
    Route::delete('entregas/destroy', 'EntregaController@massDestroy')->name('entregas.massDestroy');


    // Menu Asigna Entrega
    Route::delete('menu-asigna-entregas/destroy', 'MenuAsignaEntregaController@massDestroy')->name('menu-asigna-entregas.massDestroy');
    Route::resource('menu-asigna-entregas', 'MenuAsignaEntregaController');

    // Viaje
    Route::delete('viajes/destroy', 'ViajeController@massDestroy')->name('viajes.massDestroy');
    Route::get('viajes/estado/{valor}','ViajeController@mostrar')->name('viajes.mostrar');
    Route::get('viajes/gastos/{viaje}','ViajeController@gastos')->name('viajes.gastos');
    Route::resource('viajes', 'ViajeController');
    Route::resource('viajes.entregas', 'EntregaController');


    // Torre de control
    Route::resource('control', 'ControlController');


    // Anticipos Viaje
    Route::delete('anticipos-viajes/destroy', 'AnticiposViajeController@massDestroy')->name('anticipos-viajes.massDestroy');
    Route::resource('anticipos-viajes', 'AnticiposViajeController');

    // Menu Agregar Viaje
    Route::delete('menu-agregar-viajes/destroy', 'MenuAgregarViajeController@massDestroy')->name('menu-agregar-viajes.massDestroy');
    Route::resource('menu-agregar-viajes', 'MenuAgregarViajeController');

    // Factura
    Route::delete('facturas/destroy', 'FacturaController@massDestroy')->name('facturas.massDestroy');
    Route::resource('facturas', 'FacturaController');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});

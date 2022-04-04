<?php



//rutas publicas
Route::get('usuario', [\App\Http\Controllers\UsuarioController::class, 'index']);
Route::post('/login',[\App\Http\Controllers\UsuarioController::class,'login']);

//Rutas protegidas
Route::group(['middleware'=>['auth:sanctum']], function() {
    Route::get('viajes/{id}', [\App\Http\Controllers\UsuarioController::class,'obten_viajes']);
    Route::post('/logout',[\App\Http\Controllers\UsuarioController::class,'logout']);
    Route::post('sube-comidas', [\App\Http\Controllers\SubeImagenesController::class, 'subeComidas']);
    Route::post('sube-caseta', [\App\Http\Controllers\SubeImagenesController::class,'subeCaseta']);
    Route::get('borra-caseta/{id}/{viaje}', [\App\Http\Controllers\SubeImagenesController::class,'destroy']);
});

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
});


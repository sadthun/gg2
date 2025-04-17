<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Qui puoi registrare le tue rotte API per l'applicazione. Queste rotte
| sono caricate dal RouteServiceProvider all'interno di un gruppo che
| ha il middleware "api". Puoi modificarle e aggiungerne altre come preferisci.
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

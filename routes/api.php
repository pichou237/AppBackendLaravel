<?php

use App\Models\OffreStages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OffreStagesController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/login', function (Request $request) {
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        $user = Auth::user();
        $token = $user->createToken('API Token')->accessToken;
        return response()->json(['token' => $token]);
    }

    return response()->json(['error' => 'Unauthorized'], 401);
})->name("logi");

Route::middleware('auth:api')->post('/logout', function (Request $request) {
    $request->user()->token()->revoke();
    return response()->json(['message' => 'Successfully logged out']);
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
})->name("login");


Route::get('/user-test', function (Request $request) {
    return response()->json(['message' => 'API OK']);
});


Route::prefix('Gestion')->name('gestion.')->group(function(){
    // groupe pour les offres
    Route::prefix('offres')->group(function(){
        Route::get('/index' ,[OffreStagesController::class , 'index'])->name('offre.index');
        Route::get('/index/{id}' ,[OffreStagesController::class , 'findOffre'])->name('offre.find');
        Route::post('/store' ,[OffreStagesController::class , 'store'])->name('offre.store');
        Route::delete('/destroy' ,[OffreStagesController::class , 'destroy'])->name('offre.destroy');
        Route::put('/update' ,[OffreStagesController::class , 'update'])->name('offre.update');
    });
});

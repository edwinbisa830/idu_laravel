<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


/**
 * Estandares
 */
Route::post('getEstadarPage','API\ApiEstandares@getEstandarPage');

/** HISTORICO */
Route::post('getHistorico','API\ApiHistorico@getHistorico');
Route::post('saveHistorico','API\ApiHistorico@saveHistorico');

/** TRANSACCIONES */
Route::post('saveTransaccion','API\ApiTransaccion@saveTransaccion');


/**
 * IDU_EDIFICIOS
 */

Route::post('getEdificios', 'API\ApiEdificios@getEdificiosUser');
Route::post('deleteEdificio', 'API\ApiEdificios@deleteEdificio');
Route::post('addEdificio', 'API\ApiEdificios@addEdificio');

Route::post('Edificio', 'API\ApiEdificios@consultarEdificio');
Route::post('updateEdificio', 'API\ApiEdificios@updateEdificio');

Route::post('addPiso', 'API\ApiPisos@addPisos');
Route::post('deletePiso', 'API\ApiPisos@desactivarPiso');
Route::post('Pisos', 'API\ApiPisos@consultarPisos');

route::post('piso', 'API\ApiPisos@consultarPiso');
Route::post('updatePiso', 'API\ApiPisos@actualizarPisos');

Route::post('Areas', 'API\ApiAreas@consultarAreas');
Route::post('addAreas', 'API\ApiAreas@addAreas');
Route::post('deleteArea', 'API\ApiAreas@deleteAreas');

route::post('consultarArea', 'API\ApiAreas@consultarId');
Route::post('updateArea', 'API\ApiAreas@actualizarArea');

Route::post('Estantes', 'API\ApiEstante@consultarEstantes');
Route::post('addEstante', 'API\ApiEstante@addEstantes');
Route::post('deleteEstante', 'API\ApiEstante@desctivarEstantes');

Route::post('Estante', 'API\ApiEstante@consultarEstante');
Route::post('updateEstante', 'API\ApiEstante@actualizarEstantes');

Route::post('Cajas', 'API\ApiCaja@consultarCajas');
Route::post('addCaja', 'API\ApiCaja@addCaja');
Route::post('updateCaja', 'API\ApiCaja@updateCaja');
Route::post('deleteCaja', 'API\ApiCaja@deleteCaja');

/**
 * IDU_TRD
 * **********************************************************************************************************************************************
 */

//SERIES
Route::get('getSeriesTRD','API\ApiTRD@getSeriesUser');
Route::post('addSerieTRD','API\ApiTRD@addSerie');
Route::post('getSerieByFilter','API\ApiTRD@getSerieByFilter');
Route::delete('deleteSerieTRD','API\ApiTRD@deleteSerie');
Route::post('updateSerieTRD/{id}','API\ApiTRD@updateSerie');

//SUBSERIES
Route::get('getSubSeriesTRD','API\ApiTRD@getSubSeriesUser');
Route::post('addSubSerieTRD','API\ApiTRD@addSubSerie');
Route::delete('deleteSubSerieTRD','API\ApiTRD@deleteSubSerie');
Route::post('updateSubSerieTRD/{id}','API\ApiTRD@updateSubSerie');
Route::post('getSubSerieByFilter','API\ApiTRD@getSubSerieByFilter');

//TIPO DOCUMENTAL
Route::get('getTipoDocumentalTRD','API\ApiTRD@getTipoDocumentalUser');
Route::delete('deleteTipoDocumentalTRD','API\ApiTRD@deleteTipoDocumental');
Route::post('addTipoDocumentalTRD','API\ApiTRD@addTipoDocumental');
Route::post('getTipoDocumentoByFilter','API\ApiTRD@getTipoDocumentoByFilter');
Route::post('updateTipoDocumentoTRD/{id}','API\ApiTRD@updateTipoDocumento');

//MATRIZ
Route::get('getMatrizTRD','API\ApiTRD@getMatrizUser'); 
Route::get('getFilterDependenciaMatrizTRD','API\ApiTRD@getFilterDependenciaMatrizTRD');
Route::post('postFilterDependenciaMatrizTRD','API\ApiTRD@postFilterDependenciaMatrizTRD');
Route::post('addMatrizTRD','API\ApiTRD@addMatrizTRD');
Route::delete('deleteMatrizTRD','API\ApiTRD@deleteMatrizTRD');
Route::post('getMatrizByFilter','API\ApiTRD@getMatrizByFilter');
Route::post('updateMatrizTRD/{id}','API\ApiTRD@updateMatrizTRD');

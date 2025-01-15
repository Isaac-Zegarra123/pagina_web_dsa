<?php

use App\Http\Controllers\AlbergueUniversitarioController;
use App\Http\Controllers\BibliotecaController;
use App\Http\Controllers\BienestarUniversitarioController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\CarouselController;
use App\Http\Controllers\CircularController;
use App\Http\Controllers\ConvocatoriaController;
use App\Http\Controllers\CordinadorAcdemicController;
use App\Http\Controllers\DCurricularController;
use App\Http\Controllers\DictamenController;
use App\Http\Controllers\DsaController;
use App\Http\Controllers\GestionCurricularController;
use App\Http\Controllers\MensajeroController;
use App\Http\Controllers\RegistroCurricularController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\ReporteController;
use App\Http\Controllers\ResolucionController;
use App\Http\Controllers\SecretariaController;
use App\Http\Controllers\TecnicoController;
use Illuminate\Support\Facades\Route;

/*Route::get('/', function () {
    return view('welcome');
});*/
Route::get('/', [ConvocatoriaController::class, 'index'])->name('welcome');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

/* ----------pages------------ */
Route::get('/resolutions', function () {
    return view('pages.resolutions');
})->name('resolutions');

Route::get('/circulars', function () {
    return view('pages.circulars');
})->name('circulars');

Route::get('/curricular', function () {
    return view('pages.curricular');
})->name('curricular');

Route::get('/commission', function () {
    return view('pages.commission');
})->name('commission');

Route::get('/reglamentos', function () {
    return view('pages.regulations.reglamentos');
})->name('reglamentos');

/* -----------organigrama------------------ */

Route::view('/servi_academ', 'organigra.servi_academ')->name('servi_academ');
Route::view('/cordinador', 'organigra.cordinador')->name('cordinador');
Route::view('/bibliotecas', 'organigra.bibliotecas')->name('bibliotecas');
Route::view('/registros', 'organigra.registros')->name('registros');
Route::view('/bienestar', 'organigra.bienestar')->name('bienestar');
Route::view('/encargado', 'organigra.encargado')->name('encargado');
Route::view('/gestion', 'organigra.gestion')->name('gestion');
Route::view('/mensajero', 'organigra.mensajero')->name('mensajero');
Route::view('/secretaria', 'organigra.secretaria')->name('secretaria');
Route::view('/tecnico', 'organigra.tecnico')->name('tecnico');

// ------------------------------------
Route::get('/circulars', function () {
    return view('pages.circulars');
})->name('circulars');

Route::get('/inicio', [ConvocatoriaController::class, 'index'])->name('inicio');

// Ruta para la vista circulars que maneja ambos datos
Route::get('/circulars', [CircularController::class, 'index'])->name('circulars');
Route::get('/resolutions', [ResolucionController::class, 'index'])->name('resolutions');
Route::get('/commission', [DictamenController::class, 'index'])->name('commission');
Route::get('/curricular', [DCurricularController::class, 'index'])->name('curricular');
Route::get('/carrusel', [CarouselController::class, 'index'])->name('carrusel');
Route::get('/servi_academ', [DsaController::class, 'index'])->name('servi_academ');
Route::get('/bibliotecas', [BibliotecaController::class, 'index'])->name('bibliotecas');
Route::get('/cordinador', [CordinadorAcdemicController::class, 'index'])->name('cordinador');
Route::get('/registros', [RegistroController::class, 'index'])->name('registros');
Route::get('/tecnico', [TecnicoController::class, 'index'])->name('tecnico');
Route::get('/secretaria', [SecretariaController::class, 'index'])->name('secretaria');
Route::get('/mensajero', [MensajeroController::class, 'index'])->name('mensajero');
Route::get('/bienestar', [BienestarUniversitarioController::class, 'index'])->name('bienestar');
Route::get('/gestion', [GestionCurricularController::class, 'index'])->name('gestion');
Route::get('/encargado', [AlbergueUniversitarioController::class, 'index'])->name('encargado');

Route::get('/circulars/{year?}', [CircularController::class, 'index'])->name('pages.circulars');
Route::get('/resolutions/{year?}', [ResolucionController::class, 'index'])->name('pages.resolutions');
Route::get('/curricular/{year?}', [DCurricularController::class, 'index'])->name('pages.curricular');
Route::get('/commission/{year?}', [DictamenController::class, 'index'])->name('pages.commission');
Route::get('/calendar/{year?}', [CalendarController::class, 'index'])->name('pages.calendar');
/* reportes */

Route::get('admin/reporte-pdf/{slug}', [ReporteController::class, 'generatePdf'])->name('reporte.pdf');
Route::get('/registercircular', [RegistroCurricularController::class, 'index'])->name('registercircular');

require __DIR__.'/auth.php';

<?php

// use App\CRUD\Controller\CRUDController;
use App\MAHASISWA\Controller\MahasiswaController;
use App\Dosen\Controller\DosenController;
use App\Login\Controller\LoginController;
use App\MainController;
use App\Kelas\Controller\KelasController;
use App\Matakuliah\Controller\MatakuliahController;
use Core\RouteCollection;

$routes = new RouteCollection();

/* -------------------------------------------------------------------------- */
/*                        Route Application Start Here                        */
/* -------------------------------------------------------------------------- */

$routes->push('home', '/', [MainController::class, 'index']);

/* ---------------------------------- route mahasiswa ---------------------------------- */
$routes->prefix('crud', function ($routes) {
    $routes->push('crud_index', '', [MahasiswaController::class, 'index']);
    $routes->push('crud_create', '/create', [MahasiswaController::class, 'create']);
    $routes->push('crud_store', '/store', [MahasiswaController::class, 'store']);
    $routes->push('crud_show', '/{id}/show', [MahasiswaController::class, 'show']);
    $routes->push('crud_edit', '/{id}/edit', [MahasiswaController::class, 'edit']);
    $routes->push('crud_update', '/{id}/update', [MahasiswaController::class, 'update']);
    $routes->push('crud_delete', '/{id}/delete', [MahasiswaController::class, 'delete']);
});
// /* -------------------------------------------------------------------------- */

/* ---------------------------------- route Matakuliah ---------------------------------- */
$routes->prefix('matakuliah', function ($routes) {
    $routes->push('matakuliah_index', '', [MatakuliahController::class, 'index']);
    $routes->push('matakuliah_create', '/create', [MatakuliahController::class, 'create']);
    $routes->push('matakuliah_store', '/store', [MatakuliahController::class, 'store']);
    $routes->push('matakuliah_show', '/{id}/show', [MatakuliahController::class, 'show']);
    $routes->push('matakuliah_edit', '/{id}/edit', [MatakuliahController::class, 'edit']);
    $routes->push('matakuliah_update', '/{id}/update', [MatakuliahController::class, 'update']);
    $routes->push('matakuliah_delete', '/{id}/delete', [MatakuliahController::class, 'delete']);
});
// /* -------------------------------------------------------------------------- */

/* ---------------------------------- route Kelas ---------------------------------- */
$routes->prefix('kelas', function ($routes) {
    $routes->push('kelas_index', '', [KelasController::class, 'index']);
    $routes->push('kelas_create', '/create', [KelasController::class, 'create']);
    $routes->push('kelas_store', '/store', [KelasController::class, 'store']);
    $routes->push('kelas_show', '/{id}/show', [KelasController::class, 'show']);
    $routes->push('kelas_edit', '/{id}/edit', [KelasController::class, 'edit']);
    $routes->push('kelas_update', '/{id}/update', [KelasController::class, 'update']);
    $routes->push('kelas_delete', '/{id}/delete', [KelasController::class, 'delete']);
});
// /* -------------------------------------------------------------------------- */

/* ---------------------------------- route dosen ---------------------------------- */
$routes->prefix('dosen', function ($routes) {
    $routes->push('dosen_index', '', [DosenController::class, 'index']);
    $routes->push('dosen_create', '/create', [DosenController::class, 'create']);
    $routes->push('dosen_store', '/store', [DosenController::class, 'store']);
    $routes->push('dosen_show', '/{id}/show', [DosenController::class, 'show']);
    $routes->push('dosen_edit', '/{id}/edit', [DosenController::class, 'edit']);
    $routes->push('dosen_update', '/{id}/update', [DosenController::class, 'update']);
    $routes->push('dosen_delete', '/{id}/delete', [DosenController::class, 'delete']);
});
// /* -------------------------------------------------------------------------- */





// $routes->push('home', '/', [MainController::class, 'index']);

// /* ---------------------------------- Auth ---------------------------------- */
// $routes->prefix('crud', function ($routes) {
//     $routes->push('', '', [CRUDController::class, 'index']);
//     $routes->push('crud_create', '/create', [CRUDController::class, 'create']);
//     $routes->push('crud_store', '/store', [CRUDController::class, 'store']);
//     $routes->push('crud_show', '/{id}/show', [CRUDController::class, 'show']);
//     $routes->push('crud_edit', '/{id}/edit', [CRUDController::class, 'edit']);
//     $routes->push('crud_update', '/{id}/update', [CRUDController::class, 'update']);
//     $routes->push('crud_delete', '/{id}/delete', [CRUDController::class, 'delete']);
// });
// /* -------------------------------------------------------------------------- */

// /* ------------------------------- Maintenance ------------------------------ */
// $routes->push('maintenance', '/maintenance', [MaintenanceController::class, 'index']);
/* -------------------------------------------------------------------------- */


return $routes;

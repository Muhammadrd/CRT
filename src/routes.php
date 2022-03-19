<?php

// use App\CRUD\Controller\CRUDController;
use App\MAHASISWA\Controller\MahasiswaController;
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

/* ---------------------------------- Data mahasiswa ---------------------------------- */
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

/* ---------------------------------- Data Matakuliah ---------------------------------- */
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

/* ---------------------------------- Data Kelas ---------------------------------- */
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

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/admin-login', [AuthController::class, 'adminLogin'])->name('admin.login');
Route::post('/user-login', [AuthController::class, 'userLogin'])->name('user.login');

//Hado kidiw les pages dyal users

Route::get('/ibtisam', function () {
    return view('ibtisam');
})->name('ibtisam.page');
Route::get('/ilyas', function () {
    return view('ilyas');
})->name('ilyas.page');
Route::get('/ayoub', function () {
    return view('ayoub');
})->name('ayoub.page');
Route::get('/zakaria', function () {
    return view('zakaria');
})->name('zakaria.page');







use App\Http\Controllers\TaskController;


Route::post('/tasks/store', [TaskController::class, 'store'])->name('tasks.store');




Route::get('/admin', function () {
    // Sample data, replace this with actual user data and tasks from the database
    $users = [
        ['name' => 'Ibtisam', 'tasks' => [
            'Lundi' => ['daily' => true, 'project' => false],
            'Mardi' => ['daily' => false, 'project' => true],
            'Mercredi' => ['daily' => true, 'project' => true],
            // Continue for other days...
        ]],
        ['name' => 'Ilyas', 'tasks' => [
            'Lundi' => ['daily' => false, 'project' => true],
            'Mardi' => ['daily' => true, 'project' => false],
            'Mercredi' => ['daily' => false, 'project' => false],
            // Continue for other days...
        ]],
        // Add other users...
        ['name' => 'Zakaria', 'tasks' => [
            'Lundi' => ['daily' => false, 'project' => true],
            'Mardi' => ['daily' => true, 'project' => false],
            'Mercredi' => ['daily' => false, 'project' => false],
            // Continue for other days...
        ]],
        ['name' => 'Ayoub', 'tasks' => [
            'Lundi' => ['daily' => false, 'project' => true],
            'Mardi' => ['daily' => true, 'project' => false],
            'Mercredi' => ['daily' => false, 'project' => false],
            // Continue for other days...
        ]],
    ];

    return view('admin', compact('users'));
})->name('admin.page');

<?php

use Illuminate\Support\Facades\Route;
// 使用するコントローラーを宣言する
use App\Http\Controllers\TaskController;
use App\Http\Controllers\FolderController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// valet環境下ではtodos.test/folders/id/tasks ページへ遷移
Route::get('/folders/{id}/tasks/', [TaskController::class, 'index'])->name('tasks.index');

Route::get('/folders/create', [FolderController::class, 'showCreateForm'])->name('folders.create');

Route::post('/folders/create', [FolderController::class, 'create']);
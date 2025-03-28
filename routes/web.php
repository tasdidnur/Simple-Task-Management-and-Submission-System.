<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\TeammateController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\FrontendController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [FrontendController::class, 'index'])->name('home');

// sign up page
Route::get('/signup', [FrontendController::class, 'signUp'])->name('signup')->middleware('guest');
Route::post('/manager-insert', [FrontendController::class, 'managerInsert'])->name('manager-insert');

// Route::get('/dashboard', function () {
//     return view('layouts.main');
// })->middleware(['auth', 'verified'])->name('dashboard');

// manager routes starts here
Route::middleware(['auth', 'verified' , 'manager'])->prefix('manager')->group(function () {
    Route::get('/dashboard', [ManagerController::class, 'dashboard'])->name('manager.dashboard');

    // teammate starts here 
    Route::get('/list-teammates', [ManagerController::class, 'listTeammates'])->name('manager.list-teammates');
    Route::get('/create-teammate', [ManagerController::class, 'createTeammate'])->name('manager.create-teammate');
    Route::post('/store-teammate', [ManagerController::class, 'storeTeammate'])->name('manager.store-teammate');
    // teammate ends here 

    // project ends here 
    Route::get('/list-projects', [ProjectController::class, 'listProjects'])->name('manager.list-projects');
    Route::get('/create-project', [ProjectController::class, 'createProject'])->name('manager.create-project');
    Route::post('/store-project', [ProjectController::class, 'storeProject'])->name('manager.store-project');
    // project ends here 

    // task starts here
    Route::get('/list-tasks', [TaskController::class, 'listTasks'])->name('manager.list-tasks');
    Route::get('/create-task', [TaskController::class, 'createTask'])->name('manager.create-task');
    Route::post('/store-task', [TaskController::class, 'storeTask'])->name('manager.store-task');
    // task ends here 
});
// manager routes ends here

// teammate routes starts here
Route::middleware(['auth', 'verified' , 'teammate'])->prefix('teammate')->group(function () {
    Route::get('/dashboard', [TeammateController::class, 'dashboard'])->name('teammate.dashboard');

    // assigned tasks starts here
    Route::get('/assigned-tasks', [TeammateController::class, 'assignedTasks'])->name('teammate.assigned-tasks');
    Route::get('/view-task/{id}', [TeammateController::class, 'viewTask'])->name('teammate.view-task');
    Route::post('/update-task-status', [TeammateController::class, 'updateTaskStatus'])->name('teammate.update-task-status');
    // assigned tasks ends here
});
// teammate routes ends here

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__.'/auth.php';

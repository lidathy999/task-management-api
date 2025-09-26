<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskTypesController;
use App\Http\Controllers\TasksController;
use App\Http\Controllers\TaskPrioritiesController;

Route::get('/user', function (Request $request) {
    return $request->user();
});
Route::post("/task", [TasksController::class, 'store']);
Route::get("/tasks", [TasksController::class, 'index']);
Route::put("/task/{id}", [TasksController::class, 'update']);
Route::delete("/task/{id}", [TasksController::class, 'destroy']);
Route::put("/task/update-status/{id}", [TasksController::class, 'updateTaskStatus']);
Route::get("/priorities", [TaskPrioritiesController::class, 'index']);
Route::get("/task-type", [TaskTypesController::class, 'index']);
Route::post("/task-type", [TaskTypesController::class, 'store']);
Route::put("/task-type/{id}", [TaskTypesController::class, 'update']);
Route::delete("/task-type/{id}", [TaskTypesController::class, 'destroy']);
Route::get("/task-type/{id}", [TaskTypesController::class, 'show']);

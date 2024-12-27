<?php

use App\Http\Controllers\CourseController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
// returns the home page with all posts
Route::get('/', CourseController::class .'@index')->name('courses.index');
// returns the form for adding a post
Route::get('/courses/create', CourseController::class . '@create')->name('courses.create');
// adds a post to the database
Route::post('/courses', CourseController::class .'@store')->name('courses.store');
// returns a page that shows a full post
Route::get('/courses/{course}', CourseController::class .'@show')->name('courses.show');
// returns the form for editing a post
Route::get('/courses/{course}/edit', CourseController::class .'@edit')->name('courses.edit');
// updates a post
Route::put('/courses/{course}', CourseController::class .'@update')->name('courses.update');
// deletes a post
Route::delete('/courses/{course}', CourseController::class .'@destroy')->name('courses.destroy');


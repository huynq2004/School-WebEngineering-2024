<?php
use App\Http\Controllers\IssueController;
use Illuminate\Support\Facades\Route;

// returns the home page with all issues
Route::get('/', IssueController::class .'@index')->name('issues.index');
// returns the form for adding a issue
Route::get('/issues/create', IssueController::class . '@create')->name('issues.create');
// adds a issue to the database
Route::post('/issues', IssueController::class .'@store')->name('issues.store');
// returns a page that shows a full issue
Route::get('/issues/{issue}', IssueController::class .'@show')->name('issues.show');
// returns the form for editing a issue
Route::get('/issues/{issue}/edit', IssueController::class .'@edit')->name('issues.edit');
// updates a issue
Route::put('/issues/{issue}', IssueController::class .'@update')->name('issues.update');
// deletes a issue
Route::delete('/issues/{issue}', IssueController::class .'@destroy')->name('issues.destroy');

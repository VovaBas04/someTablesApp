<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SendController;
use App\Http\Controllers\Form10\AcceptController;
use App\Http\Controllers\Form13\AllFormController;
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
Route::apiResource('/books','App\Http\Controllers\Form10\BookController')->middleware(['auth', 'verified']);
Route::apiResource('/books/{book_id}/pages','App\Http\Controllers\Form10\PageController');
Route::apiResource('/books/{book_id}/pages/{page_id}/notes','App\Http\Controllers\Form10\NoteController');
Route::apiResource('/formLists','App\Http\Controllers\Form13\FormListController');
Route::apiResource('/formLists/{formList_id}/forms','App\Http\Controllers\Form13\FormController');
Route::apiResource('/formLists/{formList_id}/forms/{form_id}/formNotes','App\Http\Controllers\Form13\FormNoteController');
Route::apiResource('/accountingBook','\App\Http\Controllers\AccountingBookController');
Route::apiResource('/accountingBook/{accountingBook}/accountingPage','\App\Http\Controllers\AccountingPageController');
Route::apiResource('/accountingBook/{accountingBook}/accountingPage/{accountingPage}/accountingNote','\App\Http\Controllers\AccountingNoteController');
Route::get('/books/{book_id}/send',SendController::class);
Route::post('/books/{book_id}/accept',AcceptController::class);
Route::get('/formLists/{formList_id}/',AllFormController::class);
Route::post('/formLists/{form_id}/accept',App\Http\Controllers\Form13\AcceptController::class);
Route::get('/formLists/{formList_id}/all',AllFormController::class);

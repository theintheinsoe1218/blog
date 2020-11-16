<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/articles',function(){
    return 'Article List';

});

Route::get('/articles/detail',function(){
    return 'Article Detail';
})->name('article.detail');

Route::get('/articles/detail/{id}', function ($id) {
    return "Articles Detail - $id";
});

Route::get('/articles/more',function(){
    return redirect()->route('article.detail');
});

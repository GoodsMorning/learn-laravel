<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('index',['posts' => Post::all()]);
});

Route::get('/post/{post}', function ($id) {
    //Find a post by its slug and pass it to a view call "post"
    return view('post', ['post' => Post::findOrFail($id)]);

});

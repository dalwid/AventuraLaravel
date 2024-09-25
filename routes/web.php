<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;

use Illuminate\Support\Facades\Route;

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/',             [HomeController::class, 'index']);
Route::get('/posts/{post}', [HomeController::class, 'show']);


// Rotas admin posts
Route::get('/admin/posts', [\App\Http\Controllers\Admin\PostsController::class, 'index']);

Route::prefix('/admin')
    ->middleware('auth')
    ->name('admin.')
    ->group(function(){
    Route::resource('posts', \App\Http\Controllers\Admin\PostsController::class);
   /* Route::prefix('/posts')
    ->name('posts.')
    ->controller(\App\Http\Controllers\Admin\PostsController::class)
    ->group(function(){
        Route::get('/', 'index')->name('index'); // apelido admin.posts.index
        Route::get('/create', 'create')->name('create'); // apelido admin.post.create
        Route::post('/store', 'store')->name('store');

        Route::get('/{post}/edit', 'edit')->name('edit');
        Route::post('/{post}/edit', 'update')->name('update');
        
        Route::post('/{post}/destroy', 'destroy')->name('destroy');
    });*/    
});


//Rotas do laravel breeze que nos entrega u madmin inicial
//Com login, registro, dashboard e reset de senha ...
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

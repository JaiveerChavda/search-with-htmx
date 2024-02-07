<?php

use App\Http\Controllers\ArticleController;
use App\Models\Article;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::resource('articles',ArticleController::class)->middleware(['auth'])->only('index');

/*
|--------------------------------------------------------------------------
| Htmx get request (search) method
|--------------------------------------------------------------------------
| As htmx request only accepts response which should be parsed by browser
|  so eloquent and collection  object cannot be returned directly,
| we need to convert it into html parsable
| format using blade template engine.
|this method returns a view page which contain our search results.
|
|
*/

Route::get('/search', function (){

    if (!is_null(request('search'))) {
        $results = Article::query()->where('title','LIKE', '%'. request('search') . '%')->paginate(3);
        return view('search-results',['articles' => $results]);
    }

    $results = Article::query()->paginate(3);
    return view('search-results',['articles' => $results]);
});

require __DIR__.'/auth.php';

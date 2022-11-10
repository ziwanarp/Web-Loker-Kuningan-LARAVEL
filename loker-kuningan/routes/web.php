<?php

use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\PostController;
use App\Models\Category;
use App\Models\Home;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\HomeController;

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
    return view('home', [
        "title" => "Home",
        'active' => "home",
        'homes' => Home::all(),
        'categories' => Category::all()

    ]);
});

Route::get('/posts', [PostController::class, 'index']);

Route::get('/posts/{post:slug}', [PostController::class, 'show']);

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'login']);

Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/dashboard', function () {
    return view('dashboard.index', [
        'posts' => Post::all(),
        'mypost' => Post::where('user_id', auth()->user()->id),
        'user0' => User::where('is_admin', 0),
        'user1' => User::where('is_admin', 1),
        'category' => Category::all(),
    ]);
})->middleware('auth');

// Check Slug Posts
Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('auth');

Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');

Route::get('/dashboard/allposts', [DashboardPostController::class, 'allposts'])->middleware('admin');

Route::resource('/dashboard/categories', AdminCategoryController::class)->except('show')->middleware('admin');

// Check Slug Category
Route::get('/dashboard/categories/checkSlug', [AdminCategoryController::class, 'checkSlug'])->middleware('admin');

Route::resource('/dashboard/users', AdminUserController::class)->except('show')->middleware('admin');

Route::resource('/dashboard/home', HomeController::class)->except('delete')->middleware('admin');

// Route::resource('/dashboard/allposts', AdminPostController::class)->middleware('admin');

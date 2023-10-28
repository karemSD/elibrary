<?php

use App\Http\Controllers\Admin\AdminController;
use App\Models\book;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ShowBookController;
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\Auth\NewPasswordControlleradmin;
use App\Http\Controllers\Admin\Auth\PasswordResetLinkControlleradmin;
use App\Http\Controllers\Admin\Auth\AuthenticatedSessionControlleradmin;
use App\Http\Controllers\CopyBookController;
use App\Models\Cart;
use App\Models\CopyBook;

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

Route::get('/',[ShowBookController::class,'index']

);
Route::get('/showBook/{id}',[ShowBookController::class,'show']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';


Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function () {

    Route::namespace('Auth')->middleware('guest:admin')->group(function () {
        //login Route
        Route::get('login', [AuthenticatedSessionControlleradmin::class, 'create'])->name('login');
        Route::Post('login', [AuthenticatedSessionControlleradmin::class, 'store'])->name('adminlogin');
        Route::get('forgot-password', [PasswordResetLinkControlleradmin::class, 'create'])
            ->name('password.request');

        Route::post('forgot-password', [PasswordResetLinkControlleradmin::class, 'store'])
            ->name('password.email');

        Route::get('reset-password/{token}', [NewPasswordControlleradmin::class, 'create'])
            ->name('password.reset');

        Route::post('reset-password', [NewPasswordControlleradmin::class, 'store'])
            ->name('password.store');
    });
    Route::middleware('admin')->group(function () {

        Route::get('dashboard', [HomeController::class, 'index'])->name('dashboard');

    });
    Route::post('logout', [AuthenticatedSessionControlleradmin::class, 'destroy'])->name('logout');
});
Route::resource('authors', AuthorController::class)->middleware('admin');
Route::resource('categorys', CategoryController::class)->middleware('admin');
Route::resource('publishers', PublisherController::class)->middleware('admin');
Route::get('/showbooksofcustomer/{id}',[AdminController::class,'showBooksOfCustomer'])->middleware('admin');


Route::resource('users',UserController::class);
Route::get('sendmail',[AdminController::class,'sendmail'])->middleware('admin');
// Route::resource('books',BookController::class)->middleware('admin');
Route::resource('books',BookController::class)->middleware('admin');
Route::resource('customers',CustomerController::class);

Route::resource('carts',CartController::class)->middleware('auth');

Route::get('/addtocart/{idbook}/{iduser}',[CartController::class,'addtocart'])->middleware('auth');
Route::get('/mycart/{id}',[CartController::class,'mycart'])->middleware('auth')->name('mycart');
Route::get('/createcopy',[CopyBookController::class,'createcopy']);



// Route::post('/createcopy/{ids}',[CopyBookController::class,'createcopy']);
// Route::get('/createcopy/{array}',[CopyBookController::class,'createcopy'])->name('createcopy');


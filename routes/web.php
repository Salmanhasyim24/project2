<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AboutController;
use App\Http\Controllers\Backend\BlogCategoryController;
use App\Http\Controllers\Backend\BlogController;
use App\Http\Controllers\Backend\ContactController;
use App\Http\Controllers\Backend\FooterController;
use App\Http\Controllers\Backend\HomeSlide;
use App\Http\Controllers\Backend\HomeSlideController;
use App\Http\Controllers\Backend\PortofolioController;
use App\Http\Controllers\ProfileController;
use App\Models\BlogCategory;
use Illuminate\Support\Facades\Route;
use PhpParser\Node\Expr\AssignOp\Concat;

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
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

    Route::controller(ContactController::class)->group(function(){
        Route::get('/contact', 'Contact')->name('contact.me');
        Route::post('/store/message', 'StoreMessage')->name('store.message');
    });

    Route::prefix('dashboard')->middleware(['auth'])->group(function () {
        Route::get('/', [AdminController::class, 'dashboard'])->name('admin.dashboard');   
        Route::get('/logout', [ AdminController::class, 'adminlogout'])->name('admin.logout');
        Route::get('/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');
        Route::post('/profile/store', [AdminController::class, 'AdminProfileStore'])->name('admin.profile.store');
        Route::get('/change/password', [AdminController::class, 'AdminChangePassword'])->name('admin.change.password');
        Route::post('/update/password', [AdminController::class, 'AdminUpdatePassword'])->name('update.password');

    Route::controller(HomeSlideController::class)->group(function(){
        Route::get('/home/slide', 'HomeSlider')->name('home.slide');
        Route::post('/update/slider', 'UpdateSlider')->name('update.slider');
    });
    Route::controller(AboutController::class)->group(function(){
       Route::get('/all/about' , 'index')->name('about');
       Route::get('/add/about' , 'create')->name('add.about');
       Route::post('/store/about' , 'store')->name('store.about');
       Route::get('/edit/about/{id}' , 'edit')->name('edit.about');
       Route::post('/update/about' , 'update')->name('update.about');
       Route::post('/update/about/thumbnail' , 'UpdateaboutThumbnail')->name('update.about.thumbnail');
       Route::post('/update/about/multiimage' , 'UpdateaboutMultiimage')->name('update.about.multiimage');
       Route::get('/about/multiimg/delete/{id}' , 'MulitImageDelelte')->name('about.multiimg.delete');
       Route::get('/delete/about/{id}' , 'aboutDelete')->name('delete.about'); 
    });
        //Fortofolio All Controller
    Route::controller(PortofolioController::class)->group(function(){
        Route::get('/all/portofolio' , 'index')->name('portofolio');
        Route::get('/create/portofolio' , 'create')->name('add.portofolio');
        Route::post('/store/portofolio' , 'store')->name('store.portofolio');
        Route::get('/edit/portofolio/{id}' , 'edit')->name('edit.portofolio');
        Route::post('/update/portofolio{id}' , 'update')->name('update.portofolio');
        Route::post('/update/portofolio/thumbnail{id}' , 'UpdatePortofolioThumbnail')->name('update.portofolio.thumbnail');
        Route::get('/delete/portofolio/{id}' , 'destroy')->name('delete.portofolio');
    });
    //BlogCategory All Route
    Route::controller(BlogCategoryController::class)->group(function(){
        Route::get('/all/category' , 'index')->name('category');
        Route::get('/create/category' , 'create')->name('add.category');
        Route::post('/store/category' , 'store')->name('store.category');
        Route::get('/edit/category/{id}' , 'edit')->name('edit.category');
        Route::post('/update/category{id}' , 'update')->name('update.category');
        Route::get('/delete/category/{id}' , 'destroy')->name('delete.category');
    });
    //Blog All Route
    Route::controller(BlogController::class)->group(function(){
        Route::get('/all/blog' , 'index')->name('blog');
        Route::get('/create/blog' , 'create')->name('add.blog');
        Route::post('/store/blog' , 'store')->name('store.blog');
        Route::get('/edit/blog/{id}' , 'edit')->name('edit.blog');
        Route::post('/update/blog{id}' , 'update')->name('update.blog');
        Route::post('/update/blog/thumbnail{id}' , 'updateimage')->name('update.image');
        Route::get('/delete/blog/{id}' , 'destroy')->name('delete.blog');
    });
    //Footer All Route
    Route::controller(FooterController::class)->group(function(){
        Route::get('/all/footer' , 'index')->name('footer');
        Route::post('/update/footer{id}' , 'update')->name('update.footer');
        Route::get('/delete/footer/{id}' , 'destroy')->name('delete.footer');
    });
    // Contact All Route
    Route::controller(ContactController::class)->group(function () {
        Route::get('/contact/message', 'ContactMessage')->name('contact.message');   
        Route::get('/delete/message/{id}', 'DeleteMessage')->name('delete.message');     
    });
}); //end grup admin middleware 

require __DIR__.'/auth.php';

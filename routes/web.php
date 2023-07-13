<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\Admin\AppointmentController as AppointmentController1;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\ContactController as ContactController1;
use App\Http\Controllers\Admin\DashboardController as DashboardController1;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\BlogController as BlogController4;
use App\Http\Controllers\CommentController as CommentController3;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PricingController;
use App\Http\Controllers\Receptionist\AppointmentController as AppointmentController2;
use App\Http\Controllers\Receptionist\BlogController as BlogController2;
use App\Http\Controllers\Receptionist\CategoryController as CategoryController2;
use App\Http\Controllers\Receptionist\CommentController as CommentController1;
use App\Http\Controllers\Receptionist\ContactController as ContactController2;
use App\Http\Controllers\Receptionist\DashboardController as DashboardController2;
use App\Http\Controllers\Receptionist\SettingsController as SettingsController1;
use App\Http\Controllers\Receptionist\TagController as TagController2;
use App\Http\Controllers\ServiceController as ServiceController1;
use App\Http\Controllers\User\AppointmentController as AppointmentController3;
use App\Http\Controllers\User\BlogController as BlogController3;
use App\Http\Controllers\User\CommentController as CommentController2;
use App\Http\Controllers\User\DashboardController as DashboardController3;
use App\Http\Controllers\User\SettingsController as SettingsController2;
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


// Route::get('/appo', function () {
//     return view('appointment');
// }

Route::get('/appo', function () {
    return view('appointment');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard'); 


// HomePage
Route::get('/', [HomeController::class, 'index'])->name('home');
// Route::get('/', [HomeController::class, 'slider'])->name('home');

// aboutus
Route::get('/about', [AboutController::class, 'index'])->name('about');

// blogs
Route::get('/blogs', [BlogController4::class, 'index'])->name('blogs');
Route::get('/blog/{id}', [BlogController4::class, 'details'])->name('blog.details');



// contactus
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('contact/store', [ContactController::class, 'store'])->name('contact.store');


// pricing
Route::get('/pricing', [PricingController::class, 'index'])->name('pricing');

// service
Route::get('/service', [ServiceController1::class, 'index'])->name('services');
Route::get('service/{id}', [ServiceController1::class, 'details'])->name('service.details');



Route::group(['middleware'=>['auth']], function (){
// appointment
Route::get('appointment', [AppointmentController::class, 'index'])->name('appointment.index');
Route::post('appointment', [AppointmentController::class, 'store'])->name('appointment.store');
Route::get('payment', [AppointmentController::class, 'payment'])->name('payment');
Route::post('stripe', [PaymentController::class, 'stripePayment'])->name('stripe.payment');

Route::post('comment/{blog}',[CommentController3::class, 'store'])->name('comment.store');


});



// admin route

Route::group(['as'=>'admin.','prefix'=>'admin','middleware'=>['auth','admin']], function (){

Route::get('/dashboard', [DashboardController1::class, 'index'])->name('dashboard');

// Home Page
Route::resource('/service', ServiceController::class);
// Appointment
Route::resource('/appointment', AppointmentController1::class);
Route::get('/pending/appointment', [AppointmentController1::class, 'pending'])->name('appointment.pending');
Route::get('/appointment/{id}/approve', [AppointmentController1::class, 'approval'])->name('appointment.approval');
// Tag
Route::resource('/tag', TagController::class);
// Category
Route::resource('/category', CategoryController::class);
// Blog
Route::resource('/blog', BlogController::class);
Route::resource('contact', ContactController1::class);
Route::get('/pending/blog', [BlogController::class, 'pending'])->name('blog.pending');
Route::get('/blog/{id}/approve', [BlogController::class, 'approval'])->name('blog.approval');
// Slider
Route::resource('/slider', SliderController::class);
// Gallery
Route::resource('/gallery', GalleryController::class);
// Team
Route::resource('/team', TeamController::class);
// Testimonial
Route::resource('/testimonial', TestimonialController::class);
// Settings
Route::get('seetings', [SettingsController::class, 'settings'])->name('settings');
// Profile
Route::put('update-profile', [SettingsController::class, 'updateProfile'])->name('update.profile');
Route::put('password-update', [SettingsController::class, 'updatePassword'])->name('password.update');
// Comment
Route::get('comments',[CommentController::class, 'index'])->name('comment.index');
Route::delete('comments/{id}',[CommentController::class, 'destroy'])->name('comment.destroy');



});






// receptionist route
Route::group(['as'=>'receptionist.','prefix'=>'receptionist','middleware'=>['auth','receptionist']], function (){
// Dashboard
Route::get('/dashboard', [DashboardController2::class, 'index'])->name('dashboard');
// Appointment
Route::resource('/appointment', AppointmentController2::class);
Route::get('/pending/appointment', [AppointmentController2::class, 'pending'])->name('appointment.pending');
Route::get('/appointment/{id}/approve', [AppointmentController2::class, 'approval'])->name('appointment.approval');
// Blog
Route::resource('/blog', BlogController2::class);
Route::resource('/category', CategoryController2::class);
Route::resource('/tag', TagController2::class);
// settings
Route::get('seetings', [SettingsController1::class, 'settings'])->name('settings');
Route::put('update-profile', [SettingsController1::class, 'updateProfile'])->name('update.profile');
Route::put('password-update', [SettingsController1::class, 'updatePassword'])->name('password.update');
// commment
Route::get('comments',[CommentController1::class, 'index'])->name('comment.index');
Route::delete('comments/{id}',[CommentController1::class, 'destroy'])->name('comment.destroy');
// contact
Route::resource('contact', ContactController2::class);

    });


// userroute
Route::group(['as'=>'user.','prefix'=>'user','middleware'=>['auth','user']], function (){
// Dashboard
Route::get('/dashboard', [DashboardController3::class, 'index'])->name('dashboard');
// Appointment
Route::resource('/appointment', AppointmentController3::class);
// Blog
Route::resource('/blog', BlogController3::class);
// Seetings
Route::get('seetings', [SettingsController2::class, 'settings'])->name('settings');
Route::put('update-profile', [SettingsController2::class, 'updateProfile'])->name('update.profile');
Route::put('password-update', [SettingsController2::class, 'updatePassword'])->name('password.update');
// Comment
Route::get('comments',[CommentController2::class, 'index'])->name('comment.index');
    Route::delete('comments/{id}',[CommentController2::class, 'destroy'])->name('comment.destroy');

    });




require __DIR__.'/auth.php';



<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FolwerController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\GenerateController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\GenneratelistController;
use App\Http\Controllers\ImageQrController;

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
Auth::routes();

Route::get('/failed', function () {
    return view('failed');
})->name('failed');

// Route::get('/mark-as-read/{messageId}', [App\Http\Controllers\HomeController::class, 'markAsRead']);
// Route::get('/folwers', [App\Http\Controllers\FolwerController::class, 'indexxl'])->name('comment');


Route::middleware(['admin'])->group(function () {
    // กำหนดเส้นทางของ admin login ที่นี่
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
   
    Route::get('/test',function(){
        return view('testtemplate');
    });
    Route::resource('folwers',FolwerController::class);
    Route::get('/detail/{id}', [App\Http\Controllers\FolwerController::Class, 'detail']);
    // Route::get('/folwers', [App\Http\Controllers\FolwerController::class, 'indexxl'])->name('comment');
    Route::resource('users',UserController::class);
    Route::resource('generates',GenerateController::class);
    Route::resource('comments',CommentController::class);
    Route::resource('orders',OrderController::class);
    Route::resource('generatelists',GenneratelistController::class);
    // Route::get('/replymas', [App\Http\Controllers\HomeController::class, 'addform'])->name('replymas');
    Route::get('/addreplymas/{id}', [App\Http\Controllers\HomeController::class, 'addform']);
    Route::post('/replymas/{id}', [App\Http\Controllers\HomeController::class, 'addreplymas']);
    Route::get('/orderlist/{id}', [OrderController::class, 'show'])->name('orderlist.show');
    Route::post('/orderlist/updateStatus', [OrderController::class, 'updateStatus'])->name('orderlist.updateStatus');
    // Route::get('/generatelist/{id}', [GeneratelistController::class, 'show'])->name('generatelists.show');
    Route::get('/allgeneratelist', [App\Http\Controllers\GenneratelistController::class, 'allgeneratelist'])->name('allgeneratelist');
    Route::get('/addgeneratelist1/{id}', [App\Http\Controllers\GenneratelistController::class, 'addform']);
    Route::post('/generatelits1/{id}', [App\Http\Controllers\GenneratelistController::class, 'generatelist']);
    Route::post('/generatelist/updateStatus', [GenneratelistController::class, 'updateStatus'])->name('orderlist.updateStatus');
    
    // Route::post('/comment/{id}', 'BlogController@addcomment');
    // Route::post('upload',[UploadController::class,'index']);
    // Route::get('/orderlist/{order_idorder}', 'OrderListController@show')->name('orderlist.show');
    // Route::post('/update-status-to-2', 'OrderListController@updateStatusTo2')->name('orderlist.updateStatusTo2'); 
    // Route::post('/update-status-to-5', 'OrderListController@updateStatusTo5')->name('orderlist.updateStatusTo5');
    Route::get('/acceptorder', [App\Http\Controllers\OrderController::class, 'acceptorder']);
    Route::get('/cancelorder', [App\Http\Controllers\OrderController::class, 'cancelorder']);
    Route::get('/checkmoney', [App\Http\Controllers\OrderController::class, 'checkmoney']);
    Route::get('/acceptcheckmoney', [App\Http\Controllers\OrderController::class, 'acceptcheckmoney']);
    Route::get('/rejectcheckmoney', [App\Http\Controllers\OrderController::class, 'rejectcheckmoney']);

    // Route สำหรับการยอมรับ order
    Route::post('/order/{order}/accept', [OrderController::class, 'acceptOrder1'])->name('order.accept1');
    
    // Route สำหรับการไม่ยอมรับ order
    Route::post('/order/{order}/reject', [OrderController::class, 'rejectOrder'])->name('order.reject');
    Route::get('/updatework', [OrderController::class, 'updatework'])->name('update.work');
    Route::get('/generatelist/{generatelist}/imagework', [OrderController::class, 'imagework'])->name('generatelist.imagework.imagework');
    Route::resource('imageQR',ImageQrController::class);
    // Route::get('/images/create', [ImageQRController::class, 'create'])->name('images.create');
    // Route::post('/images/store', [ImageQRController::class, 'store'])->name('images.store');
    // Route::get('/images/{id}/edit', [ImageQRController::class, 'edit'])->name('images.edit');
    // Route::put('/images/{id}', [ImageQRController::class, 'update'])->name('images.update');
    
    // Assuming you have the routes defined like this
    
    
    // Existing routes...
    
    // Route::post('/update-status-to-2', [OrderController::class, 'updateStatusTo2'])->name('orderlist.updateStatusTo2');
    // Route::post('/update-status-to-4', [OrderController::class, 'updateStatusTo5'])->name('orderlist.updateStatusTo5');//เส้นทางเปลี่ยนสถานะของคำสั่งซื้อดอกไม้และยอมรับดอกไม้
    
    
    // testdata
    // Route::get('/testdata', function () {
    //     return view('testdata');
    // });
    // Route::get('/addcomment/{id}', 'BlogController@addform');// get เส้นทางเดียว
    // ตัวอย่างการประกาศ route ใน web.php
});





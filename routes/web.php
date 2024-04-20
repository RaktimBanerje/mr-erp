<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AgentStudentController;
use App\Http\Controllers\CounsellingController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\StudentController;

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



// Route::get('/dashboard', function () {
//     if(auth()->user()->role == 'agent') {
//         return redirect()->route('agentstudent.index');
//     }
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::resource('agentstudent', AgentStudentController::class);
    Route::resource('counselling', CounsellingController::class);
    Route::resource('admission', StudentController::class);

    Route::get('payment/new-collection/{student_id}', [PaymentController::class, 'new_collection'])->name('payment.new_collection');
    Route::get('payment/fees-detail/{student_id}', [PaymentController::class, 'fees_detail'])->name('payment.fees_detail');
    Route::get('payment/search', [PaymentController::class, 'search_page'])->name('payment.search_page');
    Route::post('payment/search', [PaymentController::class, 'search'])->name('payment.search');
    Route::resource('payment', PaymentController::class);

    Route::get('/', function () {
        if (auth()->user()->role == 'agent') {
            return redirect()->route('agentstudent.index');
        }
        elseif(auth()->user()->role == 'agent handler') {
            return redirect()->route('agentstudent.index');
        } 
        elseif (auth()->user()->role == 'admission support') {
            return redirect()->route('admission.index');
        } 
        elseif (auth()->user()->role == 'accountant') {
            return redirect()->route('payment.index');
        }
    });
    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
});

require __DIR__.'/auth.php';

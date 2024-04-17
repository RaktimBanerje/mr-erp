<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AgentStudentController;
use App\Http\Controllers\CounsellingController;

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

    Route::get('/', function () {
        if (auth()->user()->role == 'agent') {
            return redirect()->route('agentstudent.index');
        }
        elseif(auth()->user()->role == 'agent handler') {
            return redirect()->route('agentstudent.index');
        }
    });
    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
});

require __DIR__.'/auth.php';

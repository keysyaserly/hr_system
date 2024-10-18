<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\employeeController;
use App\Http\Controllers\FamilyDatasController;
use App\Http\Controllers\ViolationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;


Route::get('/', function () {
    return view('welcome');
});

// routes/web.php

Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');



Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::get('/employee/create', [employeeController::class, 'create'])->middleware('auth')->name('employee.create');


// Rute untuk Employee
Route::get('/employee', [employeeController::class, 'index'])->name('employee.index'); // Menampilkan daftar karyawan
Route::get('/employee/create', [EmployeeController::class, 'create'])->middleware('auth')->name('employee.create');
Route::get('/employee/{id}', [EmployeeController::class, 'show'])->name('employee.show');
Route::post('/employee/store', [EmployeeController::class, 'store'])->middleware('auth')->name('employee.store');
Route::get('/employee/{id_number}/edit', [EmployeeController::class, 'edit'])->name('employee.edit');
Route::put('/employee/{id_number}', [EmployeeController::class, 'update'])->name('employee.update');
Route::delete('/employee/{id}', [employeeController::class, 'destroy'])->name('employee.destroy'); // Menghapus data karyawan




// Rute untuk FamilyDatas
Route::get('/family_datas', [FamilyDatasController::class, 'index'])->name('family_datas.index'); // Menampilkan daftar data keluarga
Route::get('/family_datas/create', [FamilyDatasController::class, 'create'])->name('family_datas.create'); // Menampilkan form untuk menambah data keluarga
Route::post('/family_datas/store', [FamilyDatasController::class, 'store'])->name('family_datas.store'); // Menyimpan data keluarga baru
Route::get('/family_datas/{id}/show', [FamilyDatasController::class, 'show'])->name('family_datas.show'); // Menampilkan detail data keluarga
Route::get('/family_datas/{id}/edit', [FamilyDatasController::class, 'edit'])->name('family_datas.edit'); // Menampilkan form untuk edit data keluarga
Route::put('/family_datas/{id}', [FamilyDatasController::class, 'update'])->name('family_datas.update'); // Memperbarui data keluarga
Route::delete('/family_datas/{id}', [FamilyDatasController::class, 'destroy'])->name('family_datas.destroy'); // Menghapus data keluarga




Route::resource('violations', ViolationController::class);
Route::get('violations/{nik}/create', [ViolationController::class, 'create'])->name('violations.show');
Route::get('/violations/{violation}/edit', [ViolationController::class, 'edit'])->name('violations.edit');
Route::put('/violations/{violation}', [ViolationController::class, 'update'])->name('violations.update');
Route::delete('violations/{nik}', [ViolationController::class, 'destroy'])->name('violations.destroy');
Route::get('/violations/{violation}', [ViolationController::class, 'show'])->name('violations.show');



// Menampilkan data karyawan yang diarsipkan
Route::get('/employee/archived', [EmployeeController::class, 'showArchived'])->name('employee.archived');
Route::put('/employee/{id_number}/archive', [EmployeeController::class, 'archive'])->name('employee.archive');





Route::middleware(['role:manager'])->group(function () {
    Route::get('/manage-users', [UserController::class, 'manageUsers']);
});


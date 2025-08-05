<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\Order\OrderController;
use App\Http\Controllers\Order\DueOrderController;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\Purchase\PurchaseController;
use App\Http\Controllers\Order\OrderPendingController;
use App\Http\Controllers\Order\OrderCompleteController;
use App\Http\Controllers\Quotation\QuotationController;
use App\Http\Controllers\Dashboards\DashboardController;
use App\Http\Controllers\Product\ProductExportController;
use App\Http\Controllers\Product\ProductImportController;
use App\Http\Controllers\Aset\AsetController;
use App\Http\Controllers\Aset\AsetLancarController;

// Debug Route
Route::get('php/', function () {
    return phpinfo();
});

// Redirect root to login
Route::get('/', function () {
    return redirect()->route('login');
});

// Protected Routes
Route::middleware(['auth'])->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('/profile/settings', [ProfileController::class, 'settings'])->name('profile.settings');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // User Management
    // Route::resource('/users', UserController::class);
    // Route::put('/user/change-password/{username}', [UserController::class, 'updatePassword'])->name('users.updatePassword');

    // =============================
    // ROUTES FOR ASET
    // =============================

    // Aset Tetap Routes
    Route::get('/asets/export', [AsetController::class, 'export'])->name('asets.export');
    Route::resource('asets', AsetController::class);
    Route::get('/asets/{id}/download-pdf', [AsetController::class, 'downloadPdf'])->name('asets.downloadPdf');

    // Tambahan: Register Preview & Info
    Route::post('/asets/generate-register-preview', [AsetController::class, 'generateRegisterPreview'])->name('asets.generate-register-preview');
    Route::post('/asets/get-register-info', [AsetController::class, 'getRegisterInfo'])->name('asets.get-register-info');

    // API Routes for AJAX calls - Group them for better organization
    Route::prefix('api/asets')->name('api.asets.')->group(function () {
        Route::get('/kelompoks/{akunId}', [AsetController::class, 'getKelompoks'])->name('kelompoks');
        Route::get('/jenis/{kelompokId}', [AsetController::class, 'getJenis'])->name('jenis');
        Route::get('/objeks/{jenisId}', [AsetController::class, 'getObjeks'])->name('objeks');
        Route::get('/rincian-objeks/{objekId}', [AsetController::class, 'getRincianObjeks'])->name('rincian-objeks');
        Route::get('/sub-rincian-objeks/{rincianObjekId}', [AsetController::class, 'getSubRincianObjeks'])->name('sub-rincian-objeks');
        Route::get('/sub-sub-rincian-objeks/{subRincianObjekId}', [AsetController::class, 'getSubSubRincianObjeks'])->name('sub-sub-rincian-objeks');
        Route::post('/generate-kode-preview', [AsetController::class, 'generateKodeBarangPreview'])->name('generate-kode-preview');
    });

    // =============================
    // ROUTES FOR ASET LANCAR
    // =============================

    // Aset Lancar Routes
    Route::get('/aset-lancars/export', [AsetLancarController::class, 'export'])->name('aset-lancars.export');
    Route::resource('aset-lancars', AsetLancarController::class);

    // API Routes for AJAX calls - Group them for better organization
    Route::prefix('api/aset-lancars')->name('api.aset-lancars.')->group(function () {
        Route::get('/rekening-uraian/{id}', [AsetLancarController::class, 'getRekeningUraian'])->name('rekening-uraian');
    });
});

// Auth routes
require __DIR__ . '/auth.php';

// Test route - Fixed
Route::get('test/', function () {
    return 'Test route is working!';
});

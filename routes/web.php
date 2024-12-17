<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\SiteSettingController;
use App\Http\Controllers\Admin\ContactInfoController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

/*
|----------------------------------------------------------------------
| Web Routes
|----------------------------------------------------------------------
| Burada uygulamanızın web rotalarını tanımlayabilirsiniz.
|----------------------------------------------------------------------
*/
Route::middleware(['web'])->group(function () {
    Route::post('/admin/logout', [AuthController::class, 'logout'])->name('admin.logout');
});
Route::prefix('admin')->name('admin.')->group(function () {
    // **Misafir Kullanıcılar için Rotalar (Giriş Yapmamış Olanlar)**
    Route::middleware('guest')->group(function () {
        // Login Sayfası
        Route::get('/login', function () {
            return view('admin.auth.login');
        })->name('login');

        // Login İşlemi
        Route::post('/login', [AuthController::class, 'login'])->name('login');
        // Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    });

    // **Giriş Yapmış Kullanıcılar için Rotalar**
    Route::middleware(['auth', 'web'])->group(function () {
        // Dashboard
        Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
       
        // Site Ayarları
        Route::get('/site-settings', [SiteSettingController::class, 'index'])->name('site_settings.index');
        Route::post('/site-settings/update', [SiteSettingController::class, 'update'])->name('site_settings.update');

        //İletişim Bilgileri
        Route::get('/contact-info', [ContactInfoController::class, 'index'])->name('contact_info.index');
        Route::post('/contact-info/update', [ContactInfoController::class, 'update'])->name('contact_info.update');

        // Logout İşlemi
      
    });
});

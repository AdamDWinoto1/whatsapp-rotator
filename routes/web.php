<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\PerusahaanController;
use App\Http\Controllers\WhatsappRotatorController;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

// ===========================
// Default route (saat run project)
// ===========================
Route::get('/', function () {
    return redirect()->route('login');
});

// ===========================
// Halaman Login & Register
// ===========================
Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/register', function () {
    return view('register');
})->name('register');

// ===========================
// Dashboard
// ===========================
Route::get('/dashboard', function () {
    if (!session('logged_in')) {
        return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
    }

    $companies = \App\Models\Company::all();
    return view('dashboard', ['companies' => $companies]);
})->name('dashboard');

// ===========================
// CRUD Perusahaan
// ===========================
Route::get('/perusahaan', [PerusahaanController::class, 'index'])->name('perusahaan');
Route::post('/perusahaan', [PerusahaanController::class, 'store'])->name('perusahaan.store');
Route::put('/perusahaan/{id}', [PerusahaanController::class, 'update'])->name('perusahaan.update');
Route::delete('/perusahaan/{id}', [PerusahaanController::class, 'destroy'])->name('perusahaan.destroy');

// ===========================
// Whatsapp Rotator
// ===========================
Route::get('/whatsapp-rotator/{company}', [WhatsappRotatorController::class, 'index'])->name('whatsapp.rotator');
Route::get('/whatsapp-rotator/{company}/next', [WhatsappRotatorController::class, 'next'])->name('whatsapp.rotator.next');
Route::post('/whatsapp-rotator/{company}/store', [WhatsappRotatorController::class, 'store'])->name('whatsapp.rotator.store');
Route::put('/whatsapp-rotator/{company}/{id}', [WhatsappRotatorController::class, 'update'])->name('whatsapp.rotator.update');
Route::delete('/whatsapp-rotator/{company}/delete/{id}', [WhatsappRotatorController::class, 'destroy'])->name('whatsapp.rotator.delete');

// POST register -> simpan ke database
Route::post('/register', function (Request $request) {
    // validasi
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:users,email',
        'password' => 'required|string|min:6|confirmed', // butuh field password_confirmation
    ]);

    // buat user (password di-hash)
    $user = User::create([
        'name' => $validated['name'],
        'email' => $validated['email'],
        'password' => Hash::make($validated['password']),
    ]);

    return redirect()->route('login')->with('success', 'Registrasi berhasil! Silakan login.');
});

// POST login -> cek di database
Route::post('/login', function (Request $request) {
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    $user = User::where('email', $request->email)->first();

    if ($user && Hash::check($request->password, $user->password)) {
        // simpan session sederhana (atau gunakan Auth::login($user) jika ingin)
        Session::put('logged_in', true);
        Session::put('user_id', $user->id);
        Session::put('user_name', $user->name);

        return redirect()->route('dashboard'); // pastikan route dashboard ada
    }

    return back()->with('error', 'Email atau password salah!');
});

// ===========================
// Logout
// ===========================
Route::get('/logout', function () {
    session()->flush();
    return redirect()->route('login')->with('success', 'Berhasil logout.');
});

// ===========================
// Settings
// ===========================
Route::get('/settings', function () {
    return view('settings');
})->name('settings');

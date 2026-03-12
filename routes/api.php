<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\WhatsappNumber;

Route::get('/whatsapp-rotator/{company}/random', function ($company) {
    $number = WhatsappNumber::where('company_slug', $company)
        ->where('status', 'Aktif')
        ->inRandomOrder()
        ->first();

    if ($number) {
        return response()->json(['nomor' => $number->nomor]);
    } else {
        return response()->json(['nomor' => null]);
    }
});

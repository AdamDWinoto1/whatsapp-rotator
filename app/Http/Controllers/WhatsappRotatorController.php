<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WhatsappNumber;
use Illuminate\Support\Facades\Cache;

class WhatsappRotatorController extends Controller
{
    // Display the list of WhatsApp numbers for a company
    public function index($company)
    {
        $rotatorData = WhatsappNumber::where('company_slug', $company)->get();
        return view('whatsapp_rotator', ['company' => $company, 'rotatorData' => $rotatorData]);
    }

    // Rotate to the next WhatsApp number
    public function next($company)
{
    // Ambil semua nomor aktif
    $numbers = WhatsappNumber::where('company_slug', $company)
                             ->where('status', 'Aktif')
                             ->pluck('nomor')
                             ->toArray();

    if (empty($numbers)) {
        return response('Tidak ada nomor WhatsApp aktif untuk perusahaan ini.', 404);
    }

    // Ambil index terakhir dari cache
    $cacheKey = "rotator_index_{$company}";
    $index = Cache::get($cacheKey, 0);

    // Pilih nomor berikutnya
    $selectedNumber = $numbers[$index];

    // Hitung index berikutnya
    $nextIndex = ($index + 1) % count($numbers);
    Cache::put($cacheKey, $nextIndex, now()->addDay());

    // Arahkan ke nomor yang dipilih
    $whatsappUrl = "https://wa.me/{$selectedNumber}";
    return redirect()->away($whatsappUrl);
}

    // Store a new WhatsApp number
    public function store(Request $request, $company)
{
    $exists = WhatsappNumber::where('company_slug', $company)
                            ->where('nomor', $request->nomor)
                            ->exists();

    if ($exists) {
        // Jika nomor sudah ada → kirimkan notifikasi error
        return redirect()
            ->route('whatsapp.rotator', ['company' => $company])
            ->with('error', 'Nomor WhatsApp ini sudah terdaftar untuk perusahaan ini!');
    }

    // Simpan jika belum ada
    WhatsappNumber::create([
        'company_slug' => $company,
        'nomor' => $request->nomor,
        'nama' => $request->nama,
        'status' => $request->status,
    ]);

    return redirect()
        ->route('whatsapp.rotator', ['company' => $company])
        ->with('success', 'Nomor WhatsApp berhasil ditambahkan!');
}

    // Update an existing WhatsApp number
    public function update(Request $request, $company, $id)
    {
        $whatsappNumber = WhatsappNumber::where('company_slug', $company)->where('id', $id)->firstOrFail();

        $validated = $request->validate([
            'nomor' => 'required|string',
            'nama' => 'required|string',
            'status' => 'required|in:Aktif,Tidak Aktif',
        ]);

        $whatsappNumber->update($validated);

        if ($request->expectsJson()) {
            return response()->json([
                'nomor' => $whatsappNumber->nomor,
                'nama' => $whatsappNumber->nama,
                'status' => $whatsappNumber->status,
            ]);
        }

        return redirect()->route('whatsapp.rotator', ['company' => $company])->with('success', 'Nomor WhatsApp berhasil diperbarui.');
    }

    // Delete an existing WhatsApp number
    public function destroy($company, $id)
    {
        $whatsappNumber = WhatsappNumber::where('company_slug', $company)->where('id', $id)->firstOrFail();
        $whatsappNumber->delete();

        return redirect()->route('whatsapp.rotator', ['company' => $company])->with('success', 'Nomor WhatsApp berhasil dihapus.');
    }
}

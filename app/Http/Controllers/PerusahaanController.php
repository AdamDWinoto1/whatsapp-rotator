<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;

class PerusahaanController extends Controller
{
    public function index()
    {
        $companies = Company::with(['activeWhatsappNumber'])->get();

        // Map to add whatsapp_nomor attribute for convenience
        $companies->transform(function ($company) {
            $company->whatsapp_nomor = $company->activeWhatsappNumber ? $company->activeWhatsappNumber->nomor : null;
            return $company;
        });

        return view('perusahaan', ['companies' => $companies]);
    }

    public function store(Request $request)
{
    // Cek apakah perusahaan dengan nama sama sudah ada
    $exists = Company::where('nama', $request->nama)->exists();

    if ($exists) {
        // Kirim pesan error ke view
        return redirect()->back()->with('error', 'Nama perusahaan sudah terdaftar!');
    }

    // Jika belum ada, simpan data
    Company::create([
        'nama' => $request->nama,
        'alamat' => $request->alamat,
    ]);

    return redirect()->back()->with('success', 'Perusahaan berhasil ditambahkan!');
}


    public function update(Request $request, $id)
    {
        $company = Company::findOrFail($id);

        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'nullable|string|max:255',
        ]);

        $validated['slug'] = \Str::slug($validated['nama']);

        $company->update($validated);

        return response()->json($company);
    }

    public function destroy($id)
    {
        $company = Company::findOrFail($id);
        $company->delete();

        return response()->json(['message' => 'Perusahaan berhasil dihapus']);
    }
}

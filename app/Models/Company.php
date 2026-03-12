<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Company extends Model
{
    use HasFactory;

    // Nama tabel di database
    protected $table = 'perusahaan';

    // Kolom yang boleh diisi
    protected $fillable = [
        'nama',
        'slug',
        'alamat',
    ];

    // Relasi ke tabel whatsapp_numbers
    public function whatsappNumbers()
    {
        return $this->hasMany(WhatsappNumber::class, 'company_slug', 'slug');
    }

    // Relasi untuk 1 nomor aktif
    public function activeWhatsappNumber()
    {
        return $this->hasOne(WhatsappNumber::class, 'company_slug', 'slug')
                    ->where('status', 'Aktif');
    }

    // Otomatis buat slug dari nama perusahaan
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($company) {
            if (empty($company->slug)) {
                $company->slug = Str::slug($company->nama) . '-' . uniqid();
            }
        });
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WhatsappNumber extends Model
{
    use HasFactory;

    protected $table = 'whatsapp_numbers';

    protected $fillable = [
        'company_slug',
        'nomor',
        'nama',
        'status',
    ];
}

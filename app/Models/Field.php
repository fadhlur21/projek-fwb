<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Field extends Model
{
    protected $fillable = [
        'nama_lapangan',
        'tipe_lapangan',
        'lokasi',
        'harga_per_jam'
    ];

    public function bookings(): HasMany{
        return $this->hasMany(Booking::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Booking extends Model
{
    protected $fillable = [
        'customer_id',
        'field_id',
        'tanggal_booking',
        'jam_mulai',
        'jam_selesai'
    ];

    public function customer()
{
    return $this->belongsTo(Customer::class);
}


    public function field(){
        return $this->belongsTo(Field::class);
    }
}

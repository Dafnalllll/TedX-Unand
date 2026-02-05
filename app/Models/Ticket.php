<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $table = 'tickets';

    // Kolom yang dapat diisi massal sesuai tabel tickets
    protected $fillable = [
        'event',
        'price',
        'available',
        'sold',
        'category_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}

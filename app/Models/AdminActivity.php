<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminActivity extends Model
{
    protected $table = 'admin_activities';

    protected $fillable = [
        'activity',
        'created_at',
    ];

    public $timestamps = false; // Karena hanya ada created_at, tanpa updated_at
}

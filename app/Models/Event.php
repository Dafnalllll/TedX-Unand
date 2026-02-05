<?php

namespace App\Models;

use App\Models\Speaker;
use App\Models\EventCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'event_date',
        'location',
        'photo',
        'registration_link',
        'event_category_id',
        //'ticket_price',
    ];

    public function eventCategory()
    {
        return $this->belongsTo(EventCategory::class, 'event_category_id');
    }

    public function speakers()
    {
        return $this->belongsToMany(Speaker::class);
    }
}

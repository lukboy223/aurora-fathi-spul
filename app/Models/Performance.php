<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Performance extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'date',
        'time',
        'duration',
        'price',
        'max_capacity',
        'is_active'
    ];

    protected $casts = [
        'date' => 'date',
        'time' => 'datetime',
        'is_active' => 'boolean',
        'price' => 'decimal:2'
    ];

    // Relationships (commented out until models exist)
    // public function tickets()
    // {
    //     return $this->hasMany(Ticket::class);
    // }

    // public function reservations()
    // {
    //     return $this->hasMany(Reservation::class);
    // }

    // Scopes
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeUpcoming($query)
    {
        return $query->where('date', '>=', now()->toDateString());
    }

    // Accessors
    public function getFormattedDateAttribute()
    {
        return $this->date->format('d-m-Y');
    }

    public function getFormattedTimeAttribute()
    {
        return $this->time->format('H:i');
    }

    public function getFormattedPriceAttribute()
    {
        return '€ ' . number_format($this->price, 2, ',', '.');
    }
}

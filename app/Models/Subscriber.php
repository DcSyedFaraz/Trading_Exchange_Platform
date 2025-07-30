<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
    use HasFactory;

    protected $fillable = ['email', 'confirm_token', 'confirmed_at'];

    protected $casts = [
        'confirmed_at' => 'datetime',
    ];

    public function campaigns()
    {
        return $this->belongsToMany(Campaign::class)
            ->withTimestamps()
            ->withPivot(['sent_at', 'opened_at', 'clicked_at']);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    use HasFactory;

    protected $fillable = ['subject', 'body', 'send_at', 'status'];

    protected $casts = [
        'send_at' => 'datetime',
    ];

    public function subscribers()
    {
        return $this->belongsToMany(Subscriber::class)
            ->withTimestamps()
            ->withPivot(['sent_at', 'opened_at', 'clicked_at','id']);
    }
}

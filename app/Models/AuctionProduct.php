<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuctionProduct extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $casts = [
        'auction_end_time' => 'datetime', // This automatically converts it to Carbon instance
    ];
    public function closeAuction()
    {
        if (Carbon::now()->greaterThanOrEqualTo($this->auction_end_time)) {
            $this->is_closed = true;
            $this->save();
        }
    }

    public function scopeActive($query)
    {
        return $query->where('is_closed', false);
    }
    public function highestBid()
    {
        return $this->hasOne(Bid::class)->orderByDesc('amount');
    }

    // Relationship with bids
    public function bids()
    {
        return $this->hasMany(Bid::class);
    }
}

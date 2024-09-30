<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];
    // In the Product model
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class, );
    }
}

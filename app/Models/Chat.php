<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;
    protected $fillable = ['user_one_id', 'user_two_id', 'product_id',];

    public function userOne()
    {
        return $this->belongsTo(User::class, 'user_one_id');
    }
    public function interestedUsers()
    {
        return $this->belongsToMany(User::class, 'chat_interests')->withTimestamps();
    }
    public function userTwo()
    {
        return $this->belongsTo(User::class, 'user_two_id');
    }
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function messages()
    {
        return $this->hasMany(Message::class, 'chat_id', 'id');
    }
}

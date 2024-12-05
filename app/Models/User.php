<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'address',
        'city',
        'province',
        'country',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function chatsAsUserOne()
    {
        return $this->hasMany(Chat::class, 'user_one_id');
    }

    public function chatsAsUserTwo()
    {
        return $this->hasMany(Chat::class, 'user_two_id');
    }

    public function messages()
    {
        return $this->hasMany(Message::class, 'sender_id');
    }
    public function interestedChats()
    {
        return $this->belongsToMany(Chat::class, 'chat_interests')->withTimestamps();
    }
}

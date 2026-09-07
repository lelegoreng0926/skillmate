<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | RELATIONSHIP
    |--------------------------------------------------------------------------
    */

    // Satu user memiliki satu profil
    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    // Satu user memiliki banyak skill
    public function userSkills()
    {
        return $this->hasMany(UserSkill::class);
    }

    // Request yang dikirim
    public function sentRequests()
    {
        return $this->hasMany(LearningRequest::class, 'sender_id');
    }

    // Request yang diterima
    public function receivedRequests()
    {
        return $this->hasMany(LearningRequest::class, 'receiver_id');
    }

    // Review yang diberikan
    public function reviews()
    {
        return $this->hasMany(Review::class, 'reviewer_id');
    }

    /*
    |--------------------------------------------------------------------------
    | HELPER
    |--------------------------------------------------------------------------
    */

    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    public function isUser()
    {
        return $this->role === 'user';
    }
}
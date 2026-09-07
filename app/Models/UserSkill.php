<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSkill extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'skill_id',
        'type',
    ];

    /**
     * User pemilik skill
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Skill yang dimiliki user
     */
    public function skill()
    {
        return $this->belongsTo(Skill::class);
    }
}
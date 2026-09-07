<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LearningRequest extends Model
{
    protected $fillable = [
        'sender_id',
        'receiver_id',
        'skill_id',
        'message',
        'meeting_date',
        'meeting_time',
        'meeting_link',
        'status',
    ];

    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }

    public function receiver()
    {
        return $this->belongsTo(User::class, 'receiver_id');
    }

    public function skill()
    {
        return $this->belongsTo(Skill::class);
    }
}

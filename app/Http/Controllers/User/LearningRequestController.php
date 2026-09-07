<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\LearningRequest;
use Illuminate\Support\Facades\Auth;

class LearningRequestController extends Controller
{
    public function index()
    {
        $userId = Auth::id();

        $requests = LearningRequest::with(['sender', 'receiver', 'skill'])
            ->where(function ($query) use ($userId) {
                $query->where('sender_id', $userId)
                    ->orWhere('receiver_id', $userId);
            })
            ->latest()
            ->get();

        return view('user.learning-requests.index', compact('requests'));
    }
}

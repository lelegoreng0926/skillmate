<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\LearningRequest;
use App\Models\UserSkill;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $userId = Auth::id();

        return view('user.dashboard', [
            'totalSkills' => UserSkill::where('user_id', $userId)->count(),
            'offeringCount' => UserSkill::where('user_id', $userId)->where('type', 'offering')->count(),
            'learningCount' => UserSkill::where('user_id', $userId)->where('type', 'learning')->count(),
            'learningRequestCount' => LearningRequest::where('sender_id', $userId)
                ->orWhere('receiver_id', $userId)
                ->count(),
        ]);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Skill;
use App\Models\SkillCategory;
use App\Models\LearningRequest;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'totalUsers' => User::count(),
            'totalCategories' => SkillCategory::count(),
            'totalSkills' => Skill::count(),
            'totalRequests' => LearningRequest::count(),
            'latestUsers' => User::where('role', 'user')->latest()->take(5)->get(),
            'latestRequests' => LearningRequest::with(['sender', 'receiver', 'skill'])
                ->latest()
                ->take(5)
                ->get(),
        ]);
    }
}

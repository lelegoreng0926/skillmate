<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Skill;
use App\Models\LearningRequest;

class LandingController extends Controller
{
    public function index()
    {
        return view('welcome', [
            'totalUsers' => User::count(),
            'totalSkills' => Skill::count(),
            'totalPartners' => LearningRequest::count(),
        ]);
    }
}
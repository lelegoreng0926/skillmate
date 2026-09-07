<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use App\Models\UserSkill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserSkillController extends Controller
{
    public function index()
    {
        $userSkills = UserSkill::with('skill.category')
            ->where('user_id', Auth::id())
            ->latest()
            ->get();

        $skills = Skill::with('category')
            ->orderBy('name')
            ->get();

        return view('user.skills.index', compact('userSkills', 'skills'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'skill_id' => 'required|exists:skills,id',
            'type' => 'required|in:offering,learning',
        ]);

        UserSkill::create([
            'user_id' => Auth::id(),
            'skill_id' => $request->skill_id,
            'type' => $request->type,
        ]);

        return redirect()
            ->route('user.skills.index')
            ->with('success', 'Skill berhasil ditambahkan.');
    }

    public function destroy(UserSkill $userSkill)
    {
        abort_unless($userSkill->user_id === Auth::id(), 403);

        $userSkill->delete();

        return redirect()
            ->route('user.skills.index')
            ->with('success', 'Skill berhasil dihapus.');
    }
}
<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use App\Models\User;
use App\Models\UserSkill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PartnerController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'skill' => ['nullable', 'string', 'max:255'],
            'type' => ['nullable', 'in:offering,learning'],
        ]);

        $currentUserId = Auth::id();
        $myOfferings = $this->getMySkillIds('offering');
        $myLearnings = $this->getMySkillIds('learning');

        $query = User::query()
            ->where('id', '!=', $currentUserId)
            ->with([
                'profile',
                'userSkills.skill',
            ]);

        $skillFilter = $request->input('skill');
        $typeFilter = $request->input('type');

        if ($request->filled('skill')) {
            $skill = Skill::where('name', $skillFilter)->first();

            if ($skill) {
                $query->whereHas('userSkills', function ($userSkillQuery) use ($skill, $typeFilter, $request) {
                    $userSkillQuery->where('skill_id', $skill->id);

                    if ($request->filled('type')) {
                        $userSkillQuery->where('type', $typeFilter);
                    }
                });
            } else {
                $query->whereRaw('0 = 1');
            }
        } elseif ($request->filled('type')) {
            $query->whereHas('userSkills', function ($userSkillQuery) use ($typeFilter) {
                $userSkillQuery->where('type', $typeFilter);
            });
        } elseif ($myOfferings->isNotEmpty() || $myLearnings->isNotEmpty()) {
            $query->where(function ($partnerQuery) use ($myOfferings, $myLearnings) {
                if ($myOfferings->isNotEmpty()) {
                    $partnerQuery->orWhereHas('userSkills', function ($userSkillQuery) use ($myOfferings) {
                        $userSkillQuery->where('type', 'learning')
                            ->whereIn('skill_id', $myOfferings);
                    });
                }

                if ($myLearnings->isNotEmpty()) {
                    $partnerQuery->orWhereHas('userSkills', function ($userSkillQuery) use ($myLearnings) {
                        $userSkillQuery->where('type', 'offering')
                            ->whereIn('skill_id', $myLearnings);
                    });
                }
            });
        } else {
            $query->whereHas('userSkills');
        }

        $partners = $query->latest()->get()->map(function (User $partner) use ($myOfferings, $myLearnings) {
            $partner->is_match = $this->isMatch($partner, $myOfferings, $myLearnings);
            $partner->offering_skills = $partner->userSkills->where('type', 'offering');
            $partner->learning_skills = $partner->userSkills->where('type', 'learning');

            return $partner;
        });

        $skills = Skill::orderBy('name')->get();

        return view('user.partners.index', [
            'partners' => $partners,
            'skills' => $skills,
            'selectedSkill' => $skillFilter,
            'selectedType' => $typeFilter,
        ]);
    }

    public function show(User $user)
    {
        if ($user->id === Auth::id()) {
            abort(403, 'Anda tidak dapat melihat profil partner diri sendiri.');
        }

        $user->load([
            'profile',
            'userSkills.skill',
        ]);

        $myOfferings = $this->getMySkillIds('offering');
        $myLearnings = $this->getMySkillIds('learning');

        $offeringSkills = $user->userSkills->where('type', 'offering');
        $learningSkills = $user->userSkills->where('type', 'learning');
        $isMatch = $this->isMatch($user, $myOfferings, $myLearnings);

        return view('user.partners.show', [
            'partner' => $user,
            'offeringSkills' => $offeringSkills,
            'learningSkills' => $learningSkills,
            'isMatch' => $isMatch,
        ]);
    }

    private function getMySkillIds(string $type)
    {
        return UserSkill::where('user_id', Auth::id())
            ->where('type', $type)
            ->pluck('skill_id');
    }

    private function isMatch(User $partner, $myOfferings, $myLearnings): bool
    {
        $partnerOfferings = $partner->userSkills
            ->where('type', 'offering')
            ->pluck('skill_id');

        $partnerLearnings = $partner->userSkills
            ->where('type', 'learning')
            ->pluck('skill_id');

        $iCanTeachThem = $myOfferings->intersect($partnerLearnings)->isNotEmpty();
        $theyCanTeachMe = $partnerOfferings->intersect($myLearnings)->isNotEmpty();

        return $iCanTeachThem && $theyCanTeachMe;
    }
}

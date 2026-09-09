<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\LearningRequest;
use App\Models\User;
use App\Models\UserSkill;
use Illuminate\Http\Request;
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

    public function create(User $user)
    {
        if ($user->id === Auth::id()) {
            abort(403, 'Anda tidak dapat mengajukan learning request ke diri sendiri.');
        }

        $user->load('userSkills.skill');

        $myLearnings = UserSkill::where('user_id', Auth::id())
            ->where('type', 'learning')
            ->pluck('skill_id');

        $partnerOfferings = $user->userSkills->where('type', 'offering');

        $matchedSkills = $partnerOfferings->filter(
            fn ($userSkill) => $myLearnings->contains($userSkill->skill_id)
        )->values();

        $availableSkills = $matchedSkills->isNotEmpty()
            ? $matchedSkills
            : $partnerOfferings->values();

        if ($availableSkills->isEmpty()) {
            return redirect()
                ->route('partners.show', $user)
                ->with('info', 'Partner ini belum memiliki skill yang bisa diajarkan.');
        }

        return view('user.learning-requests.create', [
            'partner' => $user,
            'availableSkills' => $availableSkills,
        ]);
    }

    public function store(Request $request, User $user)
    {
        if ($user->id === Auth::id()) {
            abort(403, 'Anda tidak dapat mengajukan learning request ke diri sendiri.');
        }

        $validated = $request->validate([
            'skill_id' => ['required', 'exists:skills,id'],
            'message' => ['required', 'string', 'max:1000'],
            'meeting_date' => ['nullable', 'date', 'after_or_equal:today'],
            'meeting_time' => ['nullable', 'date_format:H:i'],
            'meeting_link' => ['nullable', 'url', 'max:255'],
        ]);

        $partnerOffersSkill = UserSkill::where('user_id', $user->id)
            ->where('skill_id', $validated['skill_id'])
            ->where('type', 'offering')
            ->exists();

        if (! $partnerOffersSkill) {
            return back()
                ->withErrors(['skill_id' => 'Partner tidak mengajarkan skill ini.'])
                ->withInput();
        }

        $alreadyPending = LearningRequest::where('sender_id', Auth::id())
            ->where('receiver_id', $user->id)
            ->where('skill_id', $validated['skill_id'])
            ->where('status', 'Pending')
            ->exists();

        if ($alreadyPending) {
            return back()
                ->withErrors(['skill_id' => 'Anda sudah memiliki permintaan pending untuk skill ini.'])
                ->withInput();
        }

        LearningRequest::create([
            'sender_id' => Auth::id(),
            'receiver_id' => $user->id,
            'skill_id' => $validated['skill_id'],
            'message' => $validated['message'],
            'meeting_date' => $validated['meeting_date'] ?? null,
            'meeting_time' => $validated['meeting_time'] ?? null,
            'meeting_link' => $validated['meeting_link'] ?? null,
            'status' => 'Pending',
        ]);

        return redirect()
            ->route('learning-requests.index')
            ->with('success', 'Learning request berhasil diajukan ke ' . $user->name . '.');
    }
}

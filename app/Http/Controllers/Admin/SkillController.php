<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use App\Models\SkillCategory;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function index()
    {
        $skills = Skill::with('category')
            ->latest()
            ->paginate(10);

        return view('admin.skills.index', compact('skills'));
    }

    public function create()
    {
        $categories = SkillCategory::orderBy('name')->get();

        return view('admin.skills.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100',
            'category_id' => 'required|exists:skill_categories,id',
        ]);

        Skill::create([
            'name' => $request->name,
            'category_id' => $request->category_id,
        ]);

        return redirect()
            ->route('skills.index')
            ->with('success', 'Skill berhasil ditambahkan.');
    }

    public function show(Skill $skill)
    {
        $skill->load('category');

        return view('admin.skills.show', compact('skill'));
    }

    public function edit(Skill $skill)
    {
        $categories = SkillCategory::orderBy('name')->get();

        return view('admin.skills.edit', compact('skill', 'categories'));
    }

    public function update(Request $request, Skill $skill)
    {
        $request->validate([
            'name' => 'required|max:100',
            'category_id' => 'required|exists:skill_categories,id',
        ]);

        $skill->update([
            'name' => $request->name,
            'category_id' => $request->category_id,
        ]);

        return redirect()
            ->route('skills.index')
            ->with('success', 'Skill berhasil diperbarui.');
    }

    public function destroy(Skill $skill)
    {
        $skill->delete();

        return redirect()
            ->route('skills.index')
            ->with('success', 'Skill berhasil dihapus.');
    }
}
<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SkillCategory;
use Illuminate\Http\Request;

class SkillCategoryController extends Controller
{
    public function index()
    {
        $categories = SkillCategory::latest()->paginate(10);

        return view('admin.skill-categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.skill-categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100',
            'description' => 'nullable',
            'icon' => 'nullable',
        ]);

        SkillCategory::create($request->all());

        return redirect()->route('skill-categories.index')
            ->with('success', 'Kategori berhasil ditambahkan.');
    }

    public function show(SkillCategory $skillCategory)
{
    return view('admin.skill-categories.show', compact('skillCategory'));
}

    public function edit(SkillCategory $skillCategory)
    {
        return view('admin.skill-categories.edit', compact('skillCategory'));
    }

    public function update(Request $request, SkillCategory $skillCategory)
    {
        $request->validate([
            'name' => 'required|max:100',
        ]);

        $skillCategory->update($request->all());

        return redirect()->route('skill-categories.index')
            ->with('success', 'Kategori berhasil diperbarui.');
    }

    public function destroy(SkillCategory $skillCategory)
    {
        $skillCategory->delete();

        return back()->with('success', 'Kategori berhasil dihapus.');
    }
}
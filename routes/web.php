<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\User\DashboardController as UserDashboardController;
use App\Http\Controllers\Admin\SkillCategoryController;
use App\Http\Controllers\Admin\SkillController;
use App\Http\Controllers\User\PartnerController;
use App\Http\Controllers\User\LearningRequestController as UserLearningRequestController;
/*
|--------------------------------------------------------------------------
| Landing Page
|--------------------------------------------------------------------------
*/

use App\Http\Controllers\LandingController;

Route::get('/health', function () {
    return 'SkillMate Laravel is running!';
});

Route::get('/', [LandingController::class, 'index']);


/*
|--------------------------------------------------------------------------
| Dashboard User
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/dashboard', [UserDashboardController::class, 'index'])
        ->name('dashboard');

    Route::get('/my-skills', [\App\Http\Controllers\User\UserSkillController::class, 'index'])
        ->name('user.skills.index');

    Route::post('/my-skills', [\App\Http\Controllers\User\UserSkillController::class, 'store'])
        ->name('user.skills.store');

    Route::delete('/my-skills/{userSkill}', [\App\Http\Controllers\User\UserSkillController::class, 'destroy'])
        ->name('user.skills.destroy');

    Route::get('/partners', [PartnerController::class, 'index'])
        ->name('partners.index');

    Route::get('/partners/{user}', [PartnerController::class, 'show'])
        ->name('partners.show');

    Route::get('/learning-requests', [UserLearningRequestController::class, 'index'])
        ->name('learning-requests.index');

    Route::get('/learning-requests/create/{user}', [UserLearningRequestController::class, 'create'])
        ->name('learning-requests.create');

    Route::post('/learning-requests/{user}', [UserLearningRequestController::class, 'store'])
        ->name('learning-requests.store');

});

/*
|--------------------------------------------------------------------------
| Dashboard Admin
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'admin'])->group(function () {

    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])
        ->name('admin.dashboard');

    Route::resource('/admin/skill-categories', SkillCategoryController::class);

    Route::resource('/admin/skills', SkillController::class)
        ->names('skills');

});

/*
|--------------------------------------------------------------------------
| Profile
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

});

require __DIR__.'/auth.php';

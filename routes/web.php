<?php

use App\Livewire\ChangePassword;
use App\Livewire\Supervisor\ProcessResult;
use App\Livewire\Supervisor\SupervisorDashboard;
use App\Livewire\Supervisor\SupervisorLogin;
use App\Livewire\Supervisor\SupervisorThesisManagement;
use App\Livewire\Supervisor\SupervisorThesisResult;
use App\Livewire\Supervisor\ProcessThesis;
use App\Livewire\Team\TeamDashboard;
use App\Livewire\Team\ThesisStatus;
use App\Livewire\Team\UploadThesis;
use App\Livewire\Team\TeamLogin;
use App\Livewire\Team\CheckResult;
use App\Livewire\Profile;
use Illuminate\Support\Facades\Route;

Route::get('/', TeamLogin::class)->name('teams.login');
Route::get('/supervisor/login', SupervisorLogin::class)->name('supervisors.login');
Route::get('/change-password',ChangePassword::class)->name('change.password');

Route::get('/logout',function(){
    session()->flush();
    return redirect()->route('teams.login');
})->name('logout');

Route::middleware(['users'])->group(function () {

    Route::middleware(['is_supervisor'])->group(function(){
        Route::prefix('supervisor')->group(function () {
            Route::get('/dashboard', SupervisorDashboard::class)->name('supervisor.dashboard');
            Route::get('/manage-thesis', SupervisorThesisManagement::class)->name('supervisor.thesis_manage');
            Route::get('/thesis-results', SupervisorThesisResult::class)->name('supervisor.result_manage');
            Route::get('/process_thesis/{id}', ProcessThesis::class)->name('supervisor.process_thesis');
            Route::get('/process_result/{id}', ProcessResult::class)->name('supervisor.process_result');
        });
    });

    Route::middleware(['is_team'])->group(function(){
        Route::prefix('team')->group(function () {
            Route::get('/dashboard', TeamDashboard::class)->name('team.dashboard');
            Route::get('/upload-thesis', UploadThesis::class)->name('team.thesis_upload');
            Route::get('/thesis/status', ThesisStatus::class)->name('team.thesis_status');
            Route::get('/thesis/result', CheckResult::class)->name('team.check_result');
        });
    });
    
    Route::get('/profile', Profile::class)->name('profile');
});


?>
<?php

use App\Http\Controllers\CandidateController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserVerification;
use App\Http\Controllers\Verification;
use App\Http\Controllers\VoteCandidate;
use \App\Http\Controllers\HasilVote;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Laravel\Jetstream\Http\Controllers\CurrentTeamController;
use Laravel\Jetstream\Http\Controllers\Livewire\ApiTokenController;
use Laravel\Jetstream\Http\Controllers\Livewire\TeamController;
use Laravel\Jetstream\Http\Controllers\Livewire\UserProfileController;
use Laravel\Jetstream\Jetstream;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/dashboard', function () {
    return redirect(route('admin.dashboard'));
});

Route::get('profile/show',function (){return redirect(route('admin.profile.show'));})->name('profile.show');

Route::get('/', function () {
    return redirect(route('admin.dashboard'));
})->name('welcome');
Route::name('admin.')->prefix('admin')->middleware(['auth:sanctum', 'web', 'verified'])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/user', [UserController::class, "index"])->name('user');
    Route::view('/user/new', "pages.user.create")->name('user.new');
    Route::view('/user/edit/{userId}', "pages.user.edit")->name('user.edit');


    Route::group(['middleware' => config('jetstream.middleware', ['web'])], function () {
        Route::group(['middleware' => ['auth', 'verified']], function () {
            // User & Profile...
            Route::get('/user/profile', [UserProfileController::class, 'show'])
                ->name('profile.show');

            // API...
            if (Jetstream::hasApiFeatures()) {
                Route::get('/user/api-tokens', [ApiTokenController::class, 'index'])->name('api-tokens.index');
            }

            // Teams...
            if (Jetstream::hasTeamFeatures()) {
                Route::get('/teams/create', [TeamController::class, 'create'])->name('teams.create');
                Route::get('/teams/{team}', [TeamController::class, 'show'])->name('teams.show');
                Route::put('/current-team', [CurrentTeamController::class, 'update'])->name('current-team.update');
            }
        });
    });

    Route::resource('user-verification', UserVerification::class);
    Route::resource('vote-candidate', VoteCandidate::class);
    Route::resource('verification', Verification::class);
    Route::resource('candidate', CandidateController::class);
    Route::resource('hasil-vote', HasilVote::class);
    Route::view('/candidate/edit/{candidateId}', "pages.candidate.edit")->name('candidate.edit');
});

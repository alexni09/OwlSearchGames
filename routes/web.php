<?php

/* Main Class */
use Illuminate\Support\Facades\Route;

/* Language Support */
use Illuminate\Support\Facades\App;
use App\UserClasses\BaseLanguage;

/* Axios, for changing the locale. */
use App\Http\Controllers\Api\LocaleController;

/* Axios, for setting the idea feeder operation. */
use App\Http\Controllers\Api\IdeaController;

/* Login */
use App\Http\Controllers\Auth\AuthenticatedSessionController;

/* Update the password */
use App\Http\Controllers\Auth\PasswordController;

/* Profile Updates */
use App\Http\Controllers\Auth\ProfileController;

/* User Authentication */
use App\Http\Controllers\Auth\RegisteredUserController;

/* Password Expired */
use App\Http\Controllers\Auth\PasswordExpiredController;

/* Forgot Password */
use App\Http\Controllers\Auth\ForgotPasswordController;

/* The Game */
use App\Http\Controllers\Game\GameController;

/* Admin Functions */
use App\Http\Controllers\AdminFunctions\DirectDbController;
use App\Http\Controllers\AdminFunctions\QueryDbController;

/* e-mail verification */
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\VerifyEmailController;

/* Main Page */
Route::get('/', [GameController::class, 'show'])->middleware('status')->name('home');

/* The Game */
Route::get('/wordgame', [GameController::class, 'reload'])->middleware('status')->name('game.reload');
Route::post('/wordgame', [GameController::class, 'create'])->middleware('status')->name('game.create');
Route::patch('/wordgame', [GameController::class, 'update'])->middleware('status')->name('game.update');

/* Axios for setting the new chosen locale. */
Route::post('/api/locale', [LocaleController::class, 'setLocale']);

/* Axios for marking that an idea has been seen. */
Route::post('/api/idea', [IdeaController::class, 'markIdea']);

/* Login/Logout */
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login')->middleware('guest');
Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('login')->middleware('guest');
Route::get('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout')->middleware('auth');

/* Password Update */
Route::get('/updatePassword', [PasswordController::class, 'create'])->name('updatePassword.create')->middleware('auth','status');
Route::patch('/updatePassword', [PasswordController::class, 'update'])->name('updatePassword.update')->middleware('auth','status');

/* Profile Update */
Route::middleware('auth','status')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/profile', [ProfileController::class, 'predelete'])->name('profile.predelete');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/* User Registration */
Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisteredUserController::class, 'create'])->name('register.create');
    Route::post('/register', [RegisteredUserController::class, 'store'])->name('register.store');
});

/* User Email Verification (Fires: after registration; or after an email profile change; or per user request) */
Route::middleware('auth')->group(function () {
    Route::get('verify-email', EmailVerificationPromptController::class)
                ->name('verification.notice');
    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
                ->middleware(['signed', 'throttle:6,1'])
                ->name('verification.verify');
    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                ->middleware('throttle:6,1')
                ->name('verification.send');
});

/* Password Expired */
Route::get('/password-expired', [PasswordExpiredController::class, 'edit'])->middleware('auth')->name('passwordexpired.edit');
Route::patch('/password-expired', [PasswordExpiredController::class, 'update'])->middleware('auth')->name('passwordexpired.update');
Route::get('/password-hash/{id}/{hash}/{pw}', [PasswordExpiredController::class, 'show'])->middleware('throttle:6,1')->name('password.hash');
Route::post('/token-expired', [PasswordExpiredController::class, 'resend'])->middleware('throttle:6,1')->name('tokenexpired.resend');

/* Forgot Password */
Route::get('/forgot-password', [ForgotPasswordController::class, 'edit'])->middleware('guest')->name('forgotpassword.edit');
Route::post('/forgot-password', [ForgotPasswordController::class, 'update'])->middleware('guest')->name('forgotpassword.update');

/* Direct DB */
Route::get('/directdb', [DirectDbController::class, 'show'])->middleware('auth')->name('directdb.show');
Route::patch('/directdb', [DirectDbController::class, 'execute'])->middleware('auth')->name('directdb.execute');

/* Query DB */
Route::get('/querydb', [QueryDbController::class, 'show'])->middleware('auth')->name('querydb.show');
Route::post('/querydb', [QueryDbController::class, 'display'])->middleware('auth')->name('querydb.display');
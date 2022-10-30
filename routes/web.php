<?php

use App\Http\Controllers\NotificationController;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Support\Facades\Route;

//There is no front-end, feel free to build your own !
Route::redirect('/', 'login');

//All your dashboard's routes going to be here.
Route::group([
    'as'         => 'panel.',
    'middleware' => [
        'verified',
    ],
], static function () {
    Route::view('dashboard', 'pages.panel.dashboard')->name('dashboard');

    Route::controller(NotificationController::class)
        ->prefix('notifications')
        ->name('notifications.')
        ->group(static function () {
            Route::get('/', 'index')->name('index');
            Route::delete('/delete/{id}', 'delete')->name('delete');
            Route::match(['PUT', 'PATCH'], '/markAllReads', 'markAllReads')->name('markAllReads');
            Route::delete('/deleteAll', 'deleteAll')->name('deleteAll');
        });
});

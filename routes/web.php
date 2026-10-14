<?php

use App\Http\Controllers\MahasiswaController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/mahasiswa');

Route::get('/ping', function () {
    return response()->json(['message' => 'pong']);
});

Route::resource('mahasiswa', MahasiswaController::class)->except('show');

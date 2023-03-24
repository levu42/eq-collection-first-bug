<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/bug', function() {
    User::create([
        'name' => 'Hello World',
        'email' => 'foo@bar' . now(),
        'password' => '123',
    ]);

    $emptyEloquentCollection = User::where('name', 'Doesnt exist')->get();

    $allEmails = $emptyEloquentCollection->map->email->push('global@email.com');

    dd($allEmails->contains('global@email.com'));
});
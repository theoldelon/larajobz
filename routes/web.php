<?php

use App\Http\Controllers\ListingController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Route for all listings
Route::get('/', [ListingController::class, 'index']);

// Route for showing the create form for listings
Route::get('/listings/create', [ListingController::class, 'create'])->middleware('auth');

// Route for storing a new listing
Route::post('/listings', [ListingController::class, 'store'])->middleware('auth');

// Route for showing the edit form for a listing
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit'])->middleware('auth');

// Route for updating a listing
Route::put('/listings/{listing}', [ListingController::class, 'update'])->middleware('auth');

// Route for deleting a listing
Route::delete('/listings/{listing}', [ListingController::class, 'destroy'])->middleware('auth');

//manage listings
Route::get('/listings/manage', [ListingController::class, 'manage'])->middleware('auth');

// Route for showing a single listing
Route::get('/listings/{listing}', [ListingController::class, 'show']);

// Route for showing the registration form
Route::get('/register', [UserController::class, 'create'])->middleware('guest');

// Route for create a new user (registration)
Route::post('/users', [UserController::class, 'store']);

// log user out
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

//show login form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

//log in user

Route::post('/users/authenticate', [UserController::class, 'authenticate']);


Route::get('/users/{user}/listings', [UserController::class, 'showListings'])->name('user.listings');
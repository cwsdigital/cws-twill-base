<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\SitemapController;
use Illuminate\Support\Facades\Route;


// Other app routes go first


// Homepage
Route::get('/', [PageController::class, 'home'])->name('home');

//Sitemap
Route::get('sitemap', [SitemapController::class]);

// Nested Pages
Route::get('/{slug}', [PageController::class, 'show'])->where('slug', '.*')
     ->name('page.show');

<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'show'])->name('home');





Route::get('sitemap', 'SitemapController');

Route::get('/{slug}', 'PageController@show')->where('slug', '.*')
     ->name('page.show');

<?php

use Illuminate\Support\Facades\Route;
use Spatie\Honeypot\ProtectAgainstSpam;

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

Route::get('/', 'PageController@home')
     ->name('home');

Route::get('/articles', 'ArticleController@index')
     ->name('article.index');

Route::get('/articles/{slug}', 'ArticleController@show')
     ->name('article.show');

Route::get('/articles/category/{slug}', 'ArticleCategoryController@show')
     ->name('category.show');

Route::post('/enquiries', 'EnquiryController@store')
     ->name('enquiries.create')
     ->middleware(ProtectAgainstSpam::class);

Route::get('sitemap', 'SitemapController');

/*
This *MUST* be the last route.
It is a catch all route and will route any/slug/like/this to the pages controller
*/
Route::get('/{slug}', 'PageController@show')->where('slug', '.*')
     ->name('page.show');

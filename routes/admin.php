<?php

Route::module('homepages');
// Route directly to the edit screen for the homepage entry
Route::name('homepage.overview')->get('homepage/overview', 'HomepageController@edit')->defaults('id', 1);

Route::module('pages');

Route::module('enquiries');

/* If you change the prefix here - ensure to change the route config in twill-navigation.php */
Route::group(['prefix' => 'articles'], function () {
    Route::module('articles');
    Route::module('articleCategories');
});

Route::module('menus');

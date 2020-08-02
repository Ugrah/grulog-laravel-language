<?php 

Route::group(['middleware' => ['web']], function () {
    Route::get('language/{lang}', 'Grulog\Language\Http\Controllers\LanguageController@language')->where('lang', '[A-Za-z_-]+');
});
<?php
Route::get('/', 'Front\Home@index')->name('home');
Route::get('/about', 'Front\Profile@index')->name('profile');
Route::get('/program', 'Front\Program@index')->name('program');
Route::get('/program/detail/{id}', 'Front\Program@detail')->name('program');
Route::get('/gallery', 'Front\Gallery@index')->name('gallery');
Route::get('/news', 'Front\News@index')->name('gallery');


Route::get('/search', 'Front\Home@search');
Route::post('/search', 'Front\Home@search');

Route::get('/contact', 'Front\ContactUs@index');
Route::post('/contact', 'Front\ContactUs@store');
Route::post('/lang', 'Front\Home@lang')->name('lang');

Route::get('refresh-csrf', function(){
    return csrf_token();
});
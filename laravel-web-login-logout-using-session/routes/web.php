<?php
Route::get('/', function (){
   return view('index');
});
Route::get('/login', 'LoginController@showLogin')->name('show.login');
Route::post('/login', 'LoginController@login')->name('user.login');
Route::get('blog','BlogController@showBlog')->name('show.blog');
Route::get('/logout', 'LogoutController@logout')->name('user.logout');
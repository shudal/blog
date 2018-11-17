<?php
use think\facade\Route;
Route::rule('/','index');
//Route::rule('blog/:id','index/blog/read');
Route::rule('blog/index','index/blog/index');
Route::rule('read','index/blog/read');
Route::rule('login','index/blog/login');
Route::rule('register','index/blog/regis');
Route::rule('blog/admin','index/blog/admin');
Route::rule('blog','index/blog/rindex');
Route::rule('search','index/blog/search');
Route::rule('other','index/other/index');
return [

];

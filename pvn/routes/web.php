<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboardAdmin',function(){
    return view('dashboardAdmin');
});

Route::get('/index',function(){
    return view('index');
});

Route::get('/about',function(){
    return view('about');
});

Route::get('/signin',function(){
    return view('signin');
});

Route::get('/ressource',function(){
    return view('ressource');
});

Route::get('/dashboardPsy',function(){
    return view('dashboardPsy');
}); 

Route::get('/AnonymousForm',function(){
    return view('AnonymousForm');
}); 

Route::get('/message',function(){
    return view('message');
}); 

Route::get('/dashboardUser',function(){
    return view('dashboardUser');
}); 

Route::get('/register',function(){
    return view('register');
}); 


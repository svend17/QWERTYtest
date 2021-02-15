<?php

use Illuminate\Support\Facades\Route;
use App\Models\Group;
use App\Models\BookOfUser;

Auth::routes();

Route::get('/users',  function (){
    $groups = Group::select('nameOfGroup')->orderBy('id')->get();
    return view('users',['groups' => $groups]);
})->middleware('auth');

Route::get('/groups',function(){
    $groups = Group::select('nameOfGroup')->orderBy('id')->get();
    return view('createGroup',['groups' => $groups]);
})->middleware('auth');

Route::get('/',function(){
    return view('listUsers',['users' => BookOfUser::all()]);
})->name('list');

Route::post('/userAdds','UserController@addUser')->name('addUs');
Route::post('/groupAdds','GroupController@addGroup')->name('addGr');
Route::put('/groupsAdds','GroupController@updGroup')->name('updGr');
Route::get('/update/{userName}','UserController@slctUser')->name('slctUs')->middleware('auth');
Route::put('/update','UserController@updUs')->name('updUs');
Route::put('/delete','UserController@delUs')->name('delUs');

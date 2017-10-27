<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" mid dleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/ch', function() 
{
	return \App\User::find(5)->add_friend(2);
});



Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/add', function (){

	return \App\User::find(1)->add_friend(3);
});
// Route::get('/accept', function (){

// 	return \App\User::find(3)->accept_friend(1);
// });

// Route::get('/friends', function(){
// 	return \App\User::find(1)->friends();
// });

// Route::get('/pending_friends', function(){
// 	return \App\User::find(3)->pending_friend_requests();
// });

// Route::get('/is', function(){
// 	 return \App\User::find(3)->is_friends_with(1);
// });

Route::group(['middleware' => 'auth'], function(){
	Route::get('/profile/{slug}', [
		'uses' => 'ProfilesController@index',
		'as' => 'profile'
	]);
	Route::get('/profile/edit/profile', [
		'uses' => 'ProfilesController@edit',
		'as' => 'profile.edit'
	]);
	Route::post('/profile/update/profile', [
		'uses' => 'ProfilesController@update',
		'as' => 'profile.update'
	]);


	Route::get('/check_relationship_status/{id}', [
		'uses' => 'FriendshipsController@check',
		'as' => 'check'
	]);

	Route::get('/add_friend/{id}', [
		'uses' => 'FriendshipsController@add_friend',
		'as' => 'add_friend'
	]);

	Route::get('/accept_friend/{id}', [
		'uses' => 'FriendshipsController@accept_friend',
		'as' => 'accept_friend'
	]);

});




Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Route::get('/login/{social}','Auth\LoginController@socialLogin')->where('social','twitter|facebook|linkedin|google|github|bitbucket');

Route::get('/login/{social}/callback','Auth\LoginController@handleProviderCallback')->where('social','twitter|facebook|linkedin|google|github|bitbucket');
 
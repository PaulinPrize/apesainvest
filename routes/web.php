<?php

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
Auth::routes(); 

/* Envoi e-mail de confirmation de compte */
Route::name('auth.resend_confirmation')->get('/register/confirm/resend', 'Auth\RegisterController@resendConfirmation');
Route::name('auth.confirm')->get('/register/confirm/{confirmation_code}', 'Auth\RegisterController@confirm');

/* Route de redirection vers le formulaire de connexion Facebook */
Route::get('login/facebook', 'Auth\LoginController@redirectToFacebook');
Route::get('login/facebook/callback', 'Auth\LoginController@handleFacebookCallback');

/* Route de redirection vers le formulaire de connexion GitHub */
Route::get('login/linkedin', 'Auth\LoginController@redirectToLinkedin');
Route::get('login/linkedin/callback', 'Auth\LoginController@handleLinkedinCallback');

/* Route de redirection vers le formulaire de connexion Google */
Route::get('login/google', 'Auth\LoginController@redirectToGoogle');
Route::get('login/google/callback', 'Auth\LoginController@handleGoogleCallback');

Route::get('/','HomeController@index');

Route::group(['middleware' => 'revalidate'], function(){
	Route::middleware(['auth'])->group(function(){

		// Utilisateurs

		Route::get('user/tableau-de-bord', 'UserController@accueilUser')->name('user.tableau-de-bord')  
		->middleware('permission:user.tableau-de-bord');

		Route::get('user/index','UserController@index')->name('user.index')
		->middleware('permission:user.index');

		Route::get('user/create','UserController@create')->name('user.create')
		->middleware('permission:user.create');

		Route::post('user/store','UserController@store')->name('user.store')
		->middleware('permission:user.create');

		Route::get('user/show/{id}','UserController@show')->name('user.show')
		->middleware('permission:user.show');

		Route::get('user/{id}/edit','UserController@edit')->name('user.edit')
		->middleware('permission:user.edit');

		Route::put('user/update/{id}','UserController@update')->name('user.update')
		->middleware('permission:user.edit');

		Route::delete('user/destroy/{id}','UserController@destroy')->name('user.destroy')
		->middleware('permission:user.destroy');

		Route::get('user/profil', 'UserController@profil')->name('user.profil')
		->middleware('permission:user.profil');  

		Route::POST('user/profil', 'UserController@userUpdateProfil')->name('user.profil')
		->middleware('permission:user.profil');

		Route::post('user/updat', 'UserController@profilUpdate')->name('user.updat')
		->middleware('permission:user.profil');	

		Route::get('user/password','UserController@password')->name('user.password')
		->middleware('permission:user.password');

		Route::post('user/password','UserController@changePassword')->name('user.password')
		->middleware('permission:user.password');

		// Rôles
		Route::get('role/index','RoleController@index')->name('role.index')
		->middleware('permission:role.index');

		Route::get('role/create','RoleController@create')->name('role.create')
		->middleware('permission:role.create');

		Route::post('role/store','RoleController@store')->name('role.store')
		->middleware('permission:role.create');

		Route::get('role/show/{id}','RoleController@show')->name('role.show')
		->middleware('permission:role.show');	

		Route::get('role/{id}/edit','RoleController@edit')->name('role.edit')
		->middleware('permission:role.edit');

		Route::put('role.update/{id}','RoleController@update')->name('role.update')
		->middleware('permission:role.edit');		

		Route::delete('role/destroy/{id}','RoleController@destroy')->name('role.destroy')
		->middleware('permission:role.destroy');	  

		// Projets

		/* Route qui redirige vers les projets d'un utilisateur */
		Route::get('projet/all', 'ProjetController@mesProjets')->name('projet.all')
		->middleware('permission:projet.all');

		Route::get('projet/index','ProjetController@index')->name('projet.index')
		->middleware('permission:projet.index');

		Route::get('projet/create','ProjetController@create')->name('projet.create')
		->middleware('permission:projet.create');

		Route::post('projet/store','ProjetController@store')->name('projet.store')
		->middleware('permission:projet.create');

		// Cette partie doit être supprimée
		Route::get('projet/show/{id}','ProjetController@show')->name('projet.show')
		->middleware('permission:projet.show');	

		Route::get('projet/{id}/edit','ProjetController@edit')->name('projet.edit')
		->middleware('permission:projet.edit');

		Route::put('projet.update/{id}','ProjetController@update')->name('projet.update')
		->middleware('permission:projet.edit');		

		Route::delete('projet/destroy/{id}','ProjetController@destroy')->name('projet.destroy')
		->middleware('permission:projet.destroy');	
	});
});

// Des permissions doivent encore être ajoutée dans cette partie
Route::get('categorie/index','CategorieController@index')->name('categorie.index');
Route::get('categorie/create','CategorieController@create')->name('categorie.create');
Route::post('categorie/store','CategorieController@store')->name('categorie.store');
Route::get('categorie/show/{id}','CategorieController@show')->name('categorie.show');
Route::get('categorie/{id}/edit','CategorieController@edit')->name('categorie.edit');
Route::put('categorie/update/{id}','CategorieController@update')->name('categorie.update');
Route::delete('categorie/destroy/{id}','CategorieController@destroy')->name('categorie.destroy');
Route::get('project/{id}/category','ProjectController@projectCategory')->name('project.category');

/*************************     
          Intervention de l'advisor Laravel
                          ****************************/


Route::get('project/more/{id}','ProjectController@show_project')->name('project.details');
Route::get('project/soutenir/{id}/{name}','ProjectController@soutenir')->name('project.soutenir')->middleware('auth');
Route::get('project/donate/{id}/{name}','ProjectController@donate')->name('project.donate')->middleware('auth');
Route::post('project/subscription','ProjectController@subscription')->name('project.subscription')->middleware('auth');
Route::post('project/donation','ProjectController@donation')->name('project.donation')->middleware('auth');



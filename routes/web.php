<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return redirect('admin/home');
});
Route::get('403_page', function () {
  return view('403-page');
});
Route::group(['prefix' => 'admin','as' => 'admin:'], function () {

Route::get('login', ['as' => 'login', 'uses' => 'AdminAuthController@index']);
Route::post('auth', ['as' => 'login.auth', 'uses' => 'AdminAuthController@login_auth']);

});

Route::group(['prefix' => 'admin','middleware' => ['auth'],'as' => 'admin:'], function () {

  Route::get('/home', ['as' => 'home', 'uses' => 'HomeController@index']);
  Route::any('logout', ['as' => 'logout', 'uses' => 'AdminAuthController@logout']);

  //Profile Routes (Admin)
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);

  //Outlet Routes
  
  Route::get('outlets', ['as' => 'outlets', 'uses' => 'OutletController@index'])->middleware('permission:View Outlet');
  Route::get('restaurant', ['as' => 'owner.restaurant', 'uses' => 'OutletController@show']);
  Route::get('outlets/create', ['as' => 'outlet.create', 'uses' => 'OutletController@create']);
  Route::post('outlets/add', ['as' => 'outlet.add', 'uses' => 'OutletController@store']);
  Route::any('outlets/update/{id}', ['as' => 'outlet.update', 'uses' => 'OutletController@store']);
  Route::get('outlets/edit/{id}', ['as' => 'outlet.edit', 'uses' => 'OutletController@edit']);
  Route::post('outlets/change_status', ['as' => 'outlet.status', 'uses' => 'OutletController@change_status']);
  Route::get('outlets/destroy/{id}', ['as' => 'outlet.destroy', 'uses' => 'OutletController@destroy']);
  Route::get('outlet/session/{id}', ['as' => 'outlet.session', 'uses' => 'OutletController@change_session']);


  //Company Routes
  Route::get('company', ['as' => 'company', 'uses' => 'CompanyController@index'])->middleware('permission:View Company');
  Route::get('company/create', ['as' => 'company.create', 'uses' => 'CompanyController@create']);
  Route::any('company/add', ['as' => 'company.add', 'uses' => 'CompanyController@store']);
  Route::any('company/update/{id}', ['as' => 'company.update', 'uses' => 'CompanyController@store']);
  Route::get('company/edit/{id}', ['as' => 'company.edit', 'uses' => 'CompanyController@edit']);
  Route::post('company/change_status', ['as' => 'company.status', 'uses' => 'CompanyController@change_status']);


  //Users Routes
  Route::get('users', ['as' => 'users', 'uses' => 'UserController@index'])->middleware('permission:View Users');
  Route::get('users/create', ['as' => 'user.create', 'uses' => 'UserController@create']);
  Route::post('users/add', ['as' => 'user.add', 'uses' => 'UserController@store']);
  Route::any('users/update/{id}', ['as' => 'user.update', 'uses' => 'UserController@store']);
  Route::get('users/edit/{id}', ['as' => 'user.edit', 'uses' => 'UserController@edit']);
  Route::post('users/change_status', ['as' => 'user.status', 'uses' => 'UserController@change_status']);
  Route::post('users/delete_image', ['as' => 'user.image.delete', 'uses' => 'UserController@delete_user_image']);


  //Roles and Permissions Management Routes
  Route::get('roles', ['as' => 'roles', 'uses' => 'RolesController@index'])->middleware('permission:View roles and permissions');
  Route::get('roles/create', ['as' => 'role.create', 'uses' => 'RolesController@create']);
  Route::post('roles/add', ['as' => 'role.add', 'uses' => 'RolesController@store']);
  Route::any('roles/update/{id}', ['as' => 'role.update', 'uses' => 'RolesController@store']);
  Route::get('roles/edit/{id}', ['as' => 'role.edit', 'uses' => 'RolesController@edit']);
  Route::post('roles/change_status', ['as' => 'role.status', 'uses' => 'RolesController@change_status']);
  Route::get('roles/permission-modules/{id}', ['as' => 'role.permission-modules', 'uses' => 'RolesController@permission_modules']);
  Route::post('roles/permission-modules/update/{id}', ['as' => 'permissions-modules.update', 'uses' => 'RolesController@permission_modules_update']);


  //Permissions Management
  Route::group(['middleware' => ['role:Developer']], function () {
      Route::get('permission/create', ['as' => 'permission.create', 'uses' => 'PermissionsController@create']);
      Route::get('permissions', ['as' => 'permissions', 'uses' => 'PermissionsController@index']);
      Route::get('permissions/edit/{id}', ['as' => 'permission.edit', 'uses' => 'PermissionsController@edit']);
      Route::post('permissions/add', ['as' => 'permissions.add', 'uses' => 'PermissionsController@store']);
      Route::any('permissions/update/{id}', ['as' => 'permissions.update', 'uses' => 'PermissionsController@store']);
      Route::any('permissions/delete/{id}', ['as' => 'permissions.delete', 'uses' => 'PermissionsController@destroy']);
  });


  //Settings
  Route::get('settings', ['as' => 'settings', 'uses' => 'SettingsController@index']);
  Route::post('settings/add-uploads', ['as' => 'settings.add-uploads', 'uses' => 'SettingsController@store_images']);
  Route::any('settings/update-uploads/{id}', ['as' => 'settings.update-uploads', 'uses' => 'SettingsController@store_images']);


    //Categories
    Route::get('categories', ['as' => 'categories', 'uses' => 'CategoriesController@index']);
    Route::get('categories/create', ['as' => 'categories.create', 'uses' => 'CategoriesController@create']);
    Route::any('categories/add', ['as' => 'categories.add', 'uses' => 'CategoriesController@store']);
    Route::any('categories/update/{id}', ['as' => 'categories.update', 'uses' => 'CategoriesController@store']);
    Route::get('categories/edit/{id}', ['as' => 'categories.edit', 'uses' => 'CategoriesController@edit']);
    Route::post('categories/change_status', ['as' => 'categories.status', 'uses' => 'CategoriesController@change_status']);
    Route::get('categories/destroy/{id}', ['as' => 'categories.destroy', 'uses' => 'CategoriesController@destroy']);
    Route::post('categories/upload_csv', ['as' => 'categories.upload.csv', 'uses' => 'CategoriesController@uploadCSV']);
    Route::post('categories/upload_excel', ['as' => 'categories.upload.excel', 'uses' => 'CategoriesController@uploadexcel']);

    //Menu
    Route::get('menu', ['as' => 'menu', 'uses' => 'MenuController@index']);
    Route::get('menu/create', ['as' => 'menu.create', 'uses' => 'MenuController@create']);
    Route::any('menu/add', ['as' => 'menu.add', 'uses' => 'MenuController@store']);
    Route::any('menu/update/{id}', ['as' => 'menu.update', 'uses' => 'MenuController@store']);
    Route::get('menu/edit/{id}', ['as' => 'menu.edit', 'uses' => 'MenuController@edit']);
    Route::post('menu/change_status', ['as' => 'menu.status', 'uses' => 'MenuController@change_status']);
    Route::get('menu/destroy/{id}', ['as' => 'menu.destroy', 'uses' => 'MenuController@destroy']);
    Route::post('menu/upload_csv', ['as' => 'menu.upload.csv', 'uses' => 'MenuController@uploadCSV']);
    Route::post('menu/upload_excel', ['as' => 'menu.upload.excel', 'uses' => 'MenuController@uploadexcel']);

});

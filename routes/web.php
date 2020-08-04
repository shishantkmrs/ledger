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



Route::get('/',function(){return view('index');});// login page
Auth::routes();
// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'EquationController@index')->name('welcome');

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home', 'EquationController@index_table')->name('home');//main page view
Route::get('/list_table', 'EquationController@list_table')->name('list');//list page view


	//Add Section
	Route::get('/add_table', 'EquationController@add_table')->name('add');// all equation catogories add page
		Route::post('/add_liability', 'EquationController@add_liability')->name('add_liability');//liability
			Route::post('/paid_liability', 'EquationController@paid_liability')->name('/paid_liability'); //paid liability
		Route::post('/add_income', 'EquationController@add_income')->name('add_income');// add income
		Route::post('/add_expenses', 'EquationController@add_expenses')->name('add_expenses');// add expenses



	// Edit Section
	Route::get('/edit_liability/{id}', 'EquationController@edit_liability')->name('/edit_liability');// edit liability
		Route::get('/edit_kista_liability/{id}', 'EquationController@edit_kista_liability')->name('/edit_kista_liability');//edit kista liability
	Route::get('/edit_income/{id}', 'EquationController@edit_income')->name('/edit_income');//edit income
	Route::get('/edit_expenses/{id}', 'EquationController@edit_expenses')->name('/edit_expenses');//edit income



	// Update Section
	Route::post('/update_liability/{id}', 'EquationController@update_liability')->name('/update_liability');// update liability
	Route::post('/update_kista_liability/{id}', 'EquationController@update_kista_liability')->name('/update_kista_liability');//liability update
	Route::post('/update_income/{id}', 'EquationController@update_income')->name('/update_income');// update income
	Route::post('/update_expenses/{id}', 'EquationController@update_expenses')->name('/update_expenses');// update expense

	// Delete Section
	Route::get('/delete_liability/{id}', 'EquationController@delete_liability')->name('/delete_liability');// delete liability	
	Route::get('/delete_paid_liability/{id}', 'EquationController@delete_paid_liability')->name('/delete_paid_liability');// delete paid liability	
	Route::get('/delete_income/{id}', 'EquationController@delete_income')->name('/delete_income');// delete income	
	Route::get('/delete_expenses/{id}', 'EquationController@delete_expenses')->name('/delete_expenses');// delete expenses	
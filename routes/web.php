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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/homeFreelancer', 'HomeFreelancer@index')->name('homeFreelancer');
Route::get('/homeCompany', 'HomeCompany@index')->name('homeCompany');

Route::get('/freelancersLogout', 'FreelancerController@logout')->name('freelancersLogout');
Route::get('/freelancersRegister', 'FreelancerController@showRegisterForm')->name('freelancersRegister');
Route::post('/freelancersRegister', 'FreelancerController@registrarFreelancer');
Route::get('/freelancersLogin', 'FreelancerController@showLoginForm')->name('freelancersLogin');
Route::post('/freelancersLogin', 'FreelancerController@loginFreelancer');

Route::get('/companiesLogout', 'CompanyController@logout')->name('companiesLogout');
Route::get('/companiesRegister', 'CompanyController@showRegisterForm')->name('companiesRegister');
Route::post('/companiesRegister', 'CompanyController@registrarCompany');
Route::get('/companiesLogin', 'CompanyController@showLoginForm')->name('companiesLogin');
Route::post('/companiesLogin', 'CompanyController@loginCompany');

Route::get('/faq', 'FAQController@index')->name('faq');


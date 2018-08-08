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

/*User View Route*/
// Route::get('/','WelcomeController@index');
Route::get('/category/{id}','WelcomeController@category');
Route::get('/manufacturer/{id}','WelcomeController@manufacturer');
Route::get('subcategory/{id}','WelcomeController@subcategory');
Route::get('/product-details/{id}','WelcomeController@productDetails');
Route::get('/contact','WelcomeController@contact');
Route::post('/search-product','WelcomeController@searchProduct');
Route::post('/search-price','WelcomeController@searchPrice');

/*Admin Route login issue*/
Route::get('/','AdminController@index');
Route::post('/admin-login-check','AdminController@adminLoginCheck');
Route::get('/logout','AdminController@logout');


/*Admin After Login*/
Route::get('/dashboard','SuperAdminController@index');


/*Category Route*/

Route::get('/add-doctor','DoctorRefController@createDoctorRef');
Route::post('/save-doctor','DoctorRefController@storeDoctorRef');

Route::get('/view-doctor/{id}','DoctorRefController@showCategory');
Route::get('/edit-doctor/{id}','DoctorRefController@editTheCategory');
Route::post('/update-doctor','DoctorRefController@updateTheCategory');
Route::get('/delete-doctor/{id}','DoctorRefController@deleteTheCategory');

Route::get('/manage-doctor','DoctorRefController@controlCategory');

/*Sub Category Route*/

Route::get('/add-test','TestNameController@createTest');
Route::post('/save-test','TestNameController@storeTestInfo');

Route::get('/view-test/{id}','TestNameController@showSubCategory');
Route::get('/edit-test/{id}','TestNameController@editTheSubCategory');
Route::post('/update-test','TestNameController@updateTestInfo');
Route::get('/delete-test/{id}','TestNameController@deleteTheSubCategory');

Route::get('/manage-test','TestNameController@controlTestName');


Route::get('/add-patient','PatientController@createPatient');
Route::post('/save-patient','PatientController@storePatient');
Route::get('/manage-patient','PatientController@controlPatient');

Route::get('/view-patient/{id}','PatientController@showPatient');
Route::get('/edit-patient/{id}','PatientController@editThePatient');
Route::post('/update-patient','PatientController@updateThePatient');
Route::get('/delete-patient/{id}','PatientController@deleteThePatient');

Route::get('/download-invoice/{id}','PatientController@downloadInvoice');


/*Copyright Route*/
Route::get('/add-Copyright','CopyrightController@createCopyright');
Route::get('/edit-copyright/{id}','CopyrightController@editTheCopyright');
Route::post('/update-copyright','CopyrightController@updateTheCopyright');
Route::post('/save-Copyright','CopyrightController@storeCopyright');
Route::get('/delete-Copyright/{id}','CopyrightController@deleteTheCopyright');
Route::get('/manage-Copyright','CopyrightController@controlCopyright');


/*Order Route*/

Route::get('/manage-order','SuperAdminController@manageOrders');
Route::get('/edit-Order/{id}','SuperAdminController@editOrders');
Route::post('/update-order','SuperAdminController@updateOrder');
Route::get('/delete-order/{id}','SuperAdminController@deleteOrder');

Route::get('/view-order/{id}','SuperAdminController@viewOrders');

Route::post('/login-customer','CheckoutController@loginCustomer');
Route::get('/logout-customer','CheckoutController@logoutCustomer');


/*Mail Controller*/



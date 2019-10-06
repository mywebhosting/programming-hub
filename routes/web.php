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

Route::get('/help', function () {
    return view('welcome');
});

/*****************	User start 	*****************************/
/*Route::get('/',function() {
	return view('UserView/index');
});*/
Route::get('/','User\home@show_home');
Route::get('/language/more','User\home@show_more_lang');
Route::get('/language/{any}','User\home@show_lang_details');
Route::get('/login-registration','User\home@login_reg');
/*****************	User end 	*****************************/

/*****************	Admin start 	*************************/
Route::get('/super-admin', function(){
	if(!empty(session('admin_id')))
	{
		return redirect('/super-admin/dashboard');
	}
	else
		return view('AdminView/login');
});

Route::post('admin_login_ajax', 'Admin\login@login_check');

Route::group(['middleware' => ['session_check']], function() {
	Route::get('/super-admin/dashboard', 'Admin\login@dash');
	Route::get('/super-admin/admin-permission', 'Admin\adminOther@admin_permission');

	Route::get('/super-admin/project', 'Admin\adminOther@show_project');
	Route::get('/super-admin/language', 'Admin\adminOther@show_language');
	Route::get('/super-admin/language/add-language', 'Admin\adminOther@add_language');
	// Route::get('/super-admin/language/add-language/{any}', 'Admin\adminOther@add_language_details');
	Route::get('/super-admin/language/{any}', 'Admin\language_chapter@add_language_details');
	Route::post('/super-admin/language/{any}/creating', 'Admin\language_chapter@add_chapter_details');
	Route::post('super-admin/language_status','Admin\adminOther@chng_status');
	Route::post('super-admin/language_sl_no','Admin\adminOther@chng_sl_no');

	Route::post('super-admin/language/chapter-edit-name','Admin\language_chapter@edit_chapter_name');
	Route::post('super-admin/language/chapter-edit-slno','Admin\language_chapter@edit_chapter_slno');
	Route::post('super-admin/language/chapter-edit-defination','Admin\language_chapter@edit_chapter_defination');

	Route::get('super-admin/management/website-settings','Admin\WebsiteManage@basic_settings');
	Route::post('super-admin/management/website-settings/basic-settings','Admin\WebsiteManage@basic_settings_update');
	Route::post('super-admin/management/website-settings/social-settings','Admin\WebsiteManage@social_settings_update');
	Route::post('super-admin/management/website-settings/contact-settings','Admin\WebsiteManage@contact_settings_update');
	// Route::get('Customer/Balance/{CustomerID?}', 'CustomerController@createBalance');

	Route::get('super-admin/management/website-extra-page','Admin\WebsiteManage@extra_page');
	Route::post('super-admin/management/check_extra_page_name','Admin\WebsiteManage@extra_page_name_check');
	Route::get('super-admin/management/website-extra-page/{any}','Admin\WebsiteManage@extra_page_details');
	Route::post('super-admin/management/website-extra-page/{any}/update','Admin\WebsiteManage@extra_page_details_update');
	/*Route::post('super-admin/management/website-extra-page/basic-settings','Admin\WebsiteManage@basic_settings_update');
	Route::post('super-admin/management/website-extra-page/social-settings','Admin\WebsiteManage@social_settings_update');
	Route::post('super-admin/management/website-extra-page/contact-settings','Admin\WebsiteManage@contact_settings_update');*/
});

/*****************	Admin stop 	****************************/
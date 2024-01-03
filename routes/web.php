<?php
Route::group(['prefix' => 'admin'], function ()
{
	Auth::routes();
	Route::get('/generate/menu', 'Admin\Generate@menu')->name('generate.menu');
});

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'AuthRole']], function ()
{
	/**
	* HOME START
	*/
	Route::get('/access-denied', 'Admin\Home@accessDenied')->name('accessDenied');
	Route::get('/', 'Admin\Home@index')->name('adminHome');

	/**
	* USER START
	*/
	## USER/ADMIN
	Route::get('/user/add/manual', 'Admin\User@addUser')->name('user.add');
	Route::post('/user/order', 'Admin\User@order')->name('user.add');
    Route::post('/user/list', 'Admin\User@listData')->name('user.list');
	Route::resource('/user', 'Admin\User');

	## ROLE
	Route::post('/role/order', 'Admin\Role@order')->name('role.order');
    Route::post('/role/list', 'Admin\Role@listData')->name('role.list');
	Route::resource('/role', 'Admin\Role');
	/**
	* USER END
	*/

	## META
	// Route::resource('/sitename', 'Admin\SiteName');
	// Route::resource('/metakey', 'Admin\MetaKey');
	// Route::resource('/metadesc', 'Admin\MetaDesc');
	// Route::resource('/analytic', 'Admin\Analytic');
	Route::get('/homecontent', 'Admin\Home@content')->name('homecontent.index');
	Route::post('/homecontent', 'Admin\Home@store')->name('homecontent.update');

	## TOP BANNER
	Route::get('/sitename', 'Admin\SiteName@index')->name('sitename.index');
	Route::post('/sitename', 'Admin\SiteName@store')->name('sitename.update');
	
	Route::get('/metakey', 'Admin\MetaKey@index')->name('metakey.index');
	Route::post('/metakey', 'Admin\MetaKey@store')->name('metakey.update');

	Route::get('/metadesc', 'Admin\MetaDesc@index')->name('metadesc.index');
	Route::post('/metadesc', 'Admin\MetaDesc@store')->name('metadesc.update');

	Route::get('/analytic', 'Admin\Analytic@index')->name('analytic.index');
	Route::post('/analytic', 'Admin\Analytic@store')->name('analytic.update');

	Route::get('/changepassword', 'Admin\User@changePassword')->name('changepassword.edit');
	Route::post('/changepassword/store', 'Admin\User@changePasswordStore')->name('changepassword.update');
	/**
	* HOME END
	*/

	## PROFILE
	Route::get('/profile', 'Admin\Profile@index')->name('profile.index');
	Route::post('/profile', 'Admin\Profile@store')->name('profile.update');

	## ABOUT
	Route::get('/about', 'Admin\About@index')->name('about.index');
	Route::post('/about', 'Admin\About@store')->name('about.update');

	## VISIMISI
	Route::get('/visimisi', 'Admin\VisiMisi@index')->name('visimisi.index');
	Route::post('/visimisi', 'Admin\VisiMisi@store')->name('visimisi.update');

	## TRACK RECORD
	Route::post('/trackrecordmain', 'Admin\TrackRecord@storeMain')->name('trackrecord.update');
	Route::get('/trackrecord/delete/{id}', 'Admin\TrackRecord@destroy')->name('trackrecord.delete');
	Route::post('/trackrecord/order', 'Admin\TrackRecord@order')->name('trackrecord.order');
	Route::post('/trackrecord/list', 'Admin\TrackRecord@listData')->name('trackrecord.list');
	Route::resource('/trackrecord', 'Admin\TrackRecord');

	## PROGRAM
	Route::post('/programmain', 'Admin\Program@storeMain')->name('program.update');
	Route::get('/program/delete/{id}', 'Admin\Program@destroy')->name('program.delete');
	Route::post('/program/order', 'Admin\Program@order')->name('program.order');
	Route::post('/program/list', 'Admin\Program@listData')->name('program.list');
	Route::resource('/program', 'Admin\Program');
	
	## GALLERY
	Route::post('/gallerymain', 'Admin\Gallery@storeMain')->name('gallery.update');
	Route::get('/gallery/delete/{id}', 'Admin\Gallery@destroy')->name('gallery.delete');
	Route::post('/gallery/order', 'Admin\Gallery@order')->name('gallery.order');
	Route::post('/gallery/list', 'Admin\Gallery@listData')->name('gallery.list');
	Route::resource('/gallery', 'Admin\Gallery');
	
	## news
	Route::post('/newsmain', 'Admin\News@storeMain')->name('news.update');
	Route::get('/news/delete/{id}', 'Admin\News@destroy')->name('news.delete');
	Route::post('/news/order', 'Admin\News@order')->name('news.order');
	Route::post('/news/list', 'Admin\News@listData')->name('news.list');
	Route::resource('/news', 'Admin\News');

	## CONTACT
	Route::get('/contact', 'Admin\Contact@index')->name('contact.list');
	Route::resource('/address', 'Admin\Address');
	Route::resource('/emails', 'Admin\Email');

	## TEMPLATE
	// Route::get('/template/delete/{id}', 'Admin\Template@destroy')->name('template.delete');
	// Route::post('/template/order', 'Admin\Template@order')->name('template.order');
	// Route::resource('/template', 'Admin\Template');
});
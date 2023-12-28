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

	## OVERVIEW
	Route::get('/visimisi', 'Admin\VisiMisi@index')->name('visimisi.index');
	Route::post('/visimisi', 'Admin\VisiMisi@store')->name('visimisi.update');

	## WHY
	Route::post('/whymain', 'Admin\Why@storeMain')->name('why.update');
	Route::get('/why/delete/{id}', 'Admin\Why@destroy')->name('why.delete');
	Route::post('/why/order', 'Admin\Why@order')->name('why.order');
	Route::post('/why/list', 'Admin\Why@listData')->name('why.list');
	Route::resource('/why', 'Admin\Why');

	## group-structure
	Route::get('/groupstructure', 'Admin\GroupStructure@index')->name('groupstructure.index');
	Route::post('/groupstructure', 'Admin\GroupStructure@store')->name('groupstructure.update');

	## OrganizationChart
	Route::get('/organizationchart', 'Admin\OrganizationChart@index')->name('organizationchart.index');
	Route::post('/organizationchart', 'Admin\OrganizationChart@store')->name('organizationchart.update');

	## management
	Route::post('/managementmain', 'Admin\Management@storeMain')->name('management.update');
	Route::get('/management/delete/{id}', 'Admin\Management@destroy')->name('management.delete');
	Route::post('/management/order', 'Admin\Management@order')->name('management.order');
	Route::post('/management/list', 'Admin\Management@listData')->name('management.list');
	Route::resource('/management', 'Admin\Management');

	## milestone
	Route::post('/milestonemain', 'Admin\Milestone@storeMain')->name('milestone.update');
	Route::get('/milestone/delete/{id}', 'Admin\Milestone@destroy')->name('milestone.delete');
	Route::post('/milestone/order', 'Admin\Milestone@order')->name('milestone.order');
	Route::post('/milestone/list', 'Admin\Milestone@listData')->name('milestone.list');
	Route::resource('/milestone', 'Admin\Milestone');

	## humancapital
	Route::post('/humancapitalmain', 'Admin\HumanCapital@storeMain')->name('humancapital.update');
	Route::get('/humancapital/delete/{id}', 'Admin\HumanCapital@destroy')->name('humancapital.delete');
	Route::post('/humancapital/order', 'Admin\HumanCapital@order')->name('humancapital.order');
	Route::post('/humancapital/list', 'Admin\HumanCapital@listData')->name('humancapital.list');
	Route::resource('/humancapital', 'Admin\HumanCapital');

	## financialservices
	Route::get('/financialservices', 'Admin\FinancialServices@index')->name('financialservices.index');
	Route::post('/financialservices', 'Admin\FinancialServices@store')->name('financialservices.update');

	## brokerage
	Route::get('/brokerage', 'Admin\Brokerage@index')->name('brokerage.index');
	Route::post('/brokerage', 'Admin\Brokerage@store')->name('brokerage.update');

	## underwriting
	Route::get('/underwriting', 'Admin\Underwriting@index')->name('underwriting.index');
	Route::post('/underwriting', 'Admin\Underwriting@store')->name('underwriting.update');

	## corporategovernance
	Route::get('/corporategovernance', 'Admin\CorporateGovernance@index')->name('corporategovernance.index');
	Route::post('/corporategovernance', 'Admin\CorporateGovernance@store')->name('corporategovernance.update');

	## corporategovernancefile
	Route::get('/corporategovernance/{corporatecharterId}/corporategovernancefile/delete/{id}', 'Admin\CorporateGovernanceFile@destroy');
	Route::post('/corporategovernance/{corporatecharterId}/corporategovernancefile/order', 'Admin\CorporateGovernanceFile@order');
	Route::resource('/corporategovernance/{corporatecharterId}/corporategovernancefile', 'Admin\CorporateGovernanceFile');
	// Route::get('/corporategovernancefile', 'Admin\CorporateGovernance@index')->name('corporategovernance.index');
	// Route::post('/corporategovernancefile', 'Admin\CorporateGovernance@store')->name('corporategovernance.update');


	## ccc
	Route::post('/cccmain', 'Admin\CharterCommittee@storeMain')->name('ccc.update');
	Route::get('/ccc/delete/{id}', 'Admin\CharterCommittee@destroy')->name('ccc.delete');
	Route::post('/ccc/order', 'Admin\CharterCommittee@order')->name('ccc.order');
	Route::post('/ccc/list', 'Admin\CharterCommittee@listData')->name('ccc.list');
	Route::resource('/ccc', 'Admin\CharterCommittee');

	## coc
	Route::post('/cocmain', 'Admin\CodeOfConduct@storeMain')->name('coc.update');
	Route::get('/coc/delete/{id}', 'Admin\CodeOfConduct@destroy')->name('coc.delete');
	Route::post('/coc/order', 'Admin\CodeOfConduct@order')->name('coc.order');
	Route::post('/coc/list', 'Admin\CodeOfConduct@listData')->name('coc.list');
	Route::resource('/coc', 'Admin\CodeOfConduct');

	## sustainabilityreport
	Route::post('/sustainabilityreportmain', 'Admin\SustainabilityReport@storeMain')->name('sustainabilityreport.update');
	Route::get('/sustainabilityreport/delete/{id}', 'Admin\SustainabilityReport@destroy')->name('sustainabilityreport.delete');
	Route::post('/sustainabilityreport/order', 'Admin\SustainabilityReport@order')->name('sustainabilityreport.order');
	Route::post('/sustainabilityreport/list', 'Admin\SustainabilityReport@listData')->name('sustainabilityreport.list');
	Route::resource('/sustainabilityreport', 'Admin\SustainabilityReport');

	## csractivities
	Route::post('/csractivitiesmain', 'Admin\CsrActivities@storeMain')->name('csractivities.update');
	Route::get('/csractivities/delete/{id}', 'Admin\CsrActivities@destroy')->name('csractivities.delete');
	Route::post('/csractivities/order', 'Admin\CsrActivities@order')->name('csractivities.order');
	Route::post('/csractivities/list', 'Admin\CsrActivities@listData')->name('csractivities.list');
	Route::resource('/csractivities', 'Admin\CsrActivities');

	## license
	Route::post('/licensemain', 'Admin\License@storeMain')->name('license.update');
	Route::get('/license/delete/{id}', 'Admin\License@destroy')->name('license.delete');
	Route::post('/license/order', 'Admin\License@order')->name('license.order');
	Route::post('/license/list', 'Admin\License@listData')->name('license.list');
	Route::resource('/license', 'Admin\License');

	## investorrelations
	Route::get('/investorrelations', 'Admin\InvestorRelations@index')->name('investorrelations.index');
	Route::post('/investorrelations', 'Admin\InvestorRelations@store')->name('investorrelations.update');

	## informationdisclosure
	Route::get('/informationdisclosure/delete/{id}', 'Admin\InformationDisclosure@destroy')->name('informationdisclosure.delete');
	Route::post('/informationdisclosure/order', 'Admin\InformationDisclosure@order')->name('informationdisclosure.order');
	Route::post('/informationdisclosure/list', 'Admin\InformationDisclosure@listData')->name('informationdisclosure.list');
	Route::resource('/informationdisclosure', 'Admin\InformationDisclosure');

	## annualreports
	Route::get('/annualreports/delete/{id}', 'Admin\AnnualReports@destroy')->name('annualreports.delete');
	Route::post('/annualreports/order', 'Admin\AnnualReports@order')->name('annualreports.order');
	Route::post('/annualreports/list', 'Admin\AnnualReports@listData')->name('annualreports.list');
	Route::resource('/annualreports', 'Admin\AnnualReports');

	## financialstatement
	Route::get('/financialstatement/delete/{id}', 'Admin\FinancialStatement@destroy')->name('financialstatement.delete');
	Route::post('/financialstatement/order', 'Admin\FinancialStatement@order')->name('financialstatement.order');
	Route::post('/financialstatement/list', 'Admin\FinancialStatement@listData')->name('financialstatement.list');
	Route::resource('/financialstatement', 'Admin\FinancialStatement');

	## meetingshareholders
	Route::get('/meetingshareholders/delete/{id}', 'Admin\MeetingShareholders@destroy')->name('meetingshareholders.delete');
	Route::post('/meetingshareholders/order', 'Admin\MeetingShareholders@order')->name('meetingshareholders.order');
	Route::post('/meetingshareholders/list', 'Admin\MeetingShareholders@listData')->name('meetingshareholders.list');
	Route::resource('/meetingshareholders', 'Admin\MeetingShareholders');

	## supportinginstitutions
	Route::get('/supportinginstitutions/delete/{id}', 'Admin\SupportingInstitutions@destroy')->name('supportinginstitutions.delete');
	Route::post('/supportinginstitutions/order', 'Admin\SupportingInstitutions@order')->name('supportinginstitutions.order');
	Route::post('/supportinginstitutions/list', 'Admin\SupportingInstitutions@listData')->name('supportinginstitutions.list');
	Route::resource('/supportinginstitutions', 'Admin\SupportingInstitutions');

	## stockinformation
	Route::get('/stockinformation', 'Admin\StockInformation@index')->name('stockinformation.index');
	Route::post('/stockinformation', 'Admin\StockInformation@store')->name('stockinformation.update');

	## stockhistory
	Route::get('/stockhistory/delete/{id}', 'Admin\StockHistory@destroy')->name('stockhistory.delete');
	Route::post('/stockhistory/order', 'Admin\StockHistory@order')->name('stockhistory.order');
	Route::post('/stockhistory/list', 'Admin\StockHistory@listData')->name('stockhistory.list');
	Route::resource('/stockhistory', 'Admin\StockHistory');

	## researchandnews
	Route::get('/researchandnews', 'Admin\ResearchAndNews@index')->name('researchandnews.index');
	Route::post('/researchandnews', 'Admin\ResearchAndNews@store')->name('researchandnews.update');

	## dailyreports
	Route::get('/dailyreports/delete/{id}', 'Admin\DailyReports@destroy')->name('dailyreports.delete');
	Route::post('/dailyreports/order', 'Admin\DailyReports@order')->name('dailyreports.order');
	Route::post('/dailyreports/list', 'Admin\DailyReports@listData')->name('dailyreports.list');
	Route::resource('/dailyreports', 'Admin\DailyReports');

	## fullreports
	Route::get('/fullreports/delete/{id}', 'Admin\FullReports@destroy')->name('fullreports.delete');
	Route::post('/fullreports/order', 'Admin\FullReports@order')->name('fullreports.order');
	Route::post('/fullreports/list', 'Admin\FullReports@listData')->name('fullreports.list');
	Route::resource('/fullreports', 'Admin\FullReports');

	## news
	Route::get('/news/delete/{id}', 'Admin\News@destroy')->name('news.delete');
	Route::post('/news/order', 'Admin\News@order')->name('news.order');
	Route::post('/news/list', 'Admin\News@listData')->name('news.list');
	Route::resource('/news', 'Admin\News');

	## faq
	Route::post('/faqmain', 'Admin\Faq@storeMain')->name('why.update');
	Route::get('/faq/delete/{id}', 'Admin\Faq@destroy')->name('faq.delete');
	Route::post('/faq/order', 'Admin\Faq@order')->name('faq.order');
	Route::post('/faq/list', 'Admin\Faq@listData')->name('faq.list');
	Route::resource('/faq', 'Admin\Faq');

	## partner
	Route::get('/partner/delete/{id}', 'Admin\Partner@destroy')->name('partner.delete');
	Route::post('/partner/order', 'Admin\Partner@order')->name('partner.order');
	Route::post('/partner/list', 'Admin\Partner@listData')->name('partner.list');
	Route::resource('/partner', 'Admin\Partner');

	## platform
	Route::get('/platform/delete/{id}', 'Admin\Platform@destroy')->name('platform.delete');
	Route::post('/platform/order', 'Admin\Platform@order')->name('platform.order');
	Route::post('/platform/list', 'Admin\Platform@listData')->name('platform.list');
	Route::resource('/platform', 'Admin\Platform');

	## accountopening
	Route::get('/accountopening/delete/{id}', 'Admin\AccountOpening@destroy')->name('accountopening.delete');
	Route::post('/accountopening/order', 'Admin\AccountOpening@order')->name('accountopening.order');
	Route::post('/accountopening/list', 'Admin\AccountOpening@listData')->name('accountopening.list');
	Route::resource('/accountopening', 'Admin\AccountOpening');

	## CONTACT
	Route::get('/contact', 'Admin\Contact@index')->name('contact.list');
	Route::resource('/address', 'Admin\Address');
	Route::resource('/emails', 'Admin\Email');

	## TEMPLATE
	// Route::get('/template/delete/{id}', 'Admin\Template@destroy')->name('template.delete');
	// Route::post('/template/order', 'Admin\Template@order')->name('template.order');
	// Route::resource('/template', 'Admin\Template');
});
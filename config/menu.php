<?php

/**
 * FOR ROLE EVERY PAGE
 * ALL/SUP/ADM
 * ALL Without Login 
 * Then Config to Route
 */
$role = [
];


/**
 * FOR CREATE SIDE BAR MENU 
 */
$icon_gallery = 'icon_gallery';
$icon_edit = 'icon_edit';
$icon_password = 'icon_password';
$icon_list_bullets = 'icon_list_bullets';
$icon_contact = 'icon_contact';

$menu = [
	[
		'text'  => 'Home',
		'menu' => [
			[
				'text'  => 'Home',
				'type'  => 'menu',
				'url'   => 'admin',
				'icon'  => 'fas fa-fire',
				'mainPage'	=> 'home',
				'page'	=> 'home',
				'route'	=> 'home-list',
				'type'	=> 'menu'
			]

		],
	],

	[
		'text'  => 'User Management',
		'menu' => [
			[
				'text'  => 'User',
				'type'  => 'menu',
				'url'   => 'admin/user',
				'icon'  => 'far fa-user',
				'mainPage'	=> 'user',
				'page'	=> 'user',
				'route'	=> 'user-list',
				'type'	=> 'menu'
			],
			[
				'text'  => 'Role',
				'type'  => 'menu',
				'url'   => 'admin/role',
				'icon'  => 'fas fa-th-large',
				'mainPage'	=> 'role',
				'page'	=> 'role',
				'route'	=> 'role-list',
			],

		],
	],

	[
		'text'  => 'Setting Management',
		'menu' => [
			'setting' => [
				'text'  => 'Setting',
				'mainPage'	=> 'sitename',
				'icon'  => 'fas fa-cogs',
				'type'	=> 'accordion',
				'submenu' => [
					[
						'text'  => 'Website Name',
						'type'  => 'menu',
						'url'   => 'admin/sitename',
						'icon'  => 'sitename',
						'mainPage'	=> 'sitename',
						'page'	=> 'sitename',
						'route'	=> 'sitename-edit',
					],
					[
						'text'  => 'Keyword',
						'type'  => 'menu',
						'url'   => 'admin/metakey',
						'icon'  => 'setting',
						'mainPage'	=> 'sitename',
						'page'	=> 'metakey',
						'route'	=> 'metakey-edit',
					],
					[
						'text'  => 'Description',
						'type'  => 'menu',
						'url'   => 'admin/metadesc',
						'icon'  => 'setting',
						'mainPage'	=> 'sitename',
						'page'	=> 'metadesc',
						'route'	=> 'metadesc-edit',
					],
					[
						'text'  => 'Google Analytic',
						'type'  => 'menu',
						'url'   => 'admin/analytic',
						'icon'  => 'setting',
						'mainPage'	=> 'sitename',
						'page'	=> 'analytic',
						'route'	=> 'analytic-edit',
					],
				]
			],


		],
	],

];

$mappingMenu = [
	"homecontent" => "Home",
	"homebanner" => "Home Banner",
	"partner" => "Partner",
	"platform" => "Platform",
	"accountopening" => "Account Opening",

	"sitename" => "Website Name",
	"metakey" => "Keyword",
	"metadesc" => "Description",
	"analytic" => "Google Analytic",

	"changepassword" => "Change Password",

	"profile" => "Profile",
	"overview" => "Overview",
	"why" => "Why Minna Padi",
	"groupstructure" => "Group Structure",
	"organizationchart" => "Organization Chart",
	"management" => "Management",
	"milestone" => "Milestone",
	"humancapital" => "Human Capital",

	"financialservices" => "Financial Services",
	"brokerage" => "Brokerage",
	"underwriting" => "Underwriting",

	"corporategovernance" => "Good Corporate Governance",
	"corporategovernancefile" => "Good Corporate Governance File",
	"ccc" => "Corporate Charter",
	"coc" => "Code of Conduct",
	"sustainabilityreport" => "Sustainability Report",
	"csractivities" => "CSR Activities",
	"license" => "License",

	"investorrelations" => "Investor Relations",
	"informationdisclosure" => "Information Disclosure",
	"annualreports" => "Annual Reports",
	"financialstatement" => "Financial Statement",
	"meetingshareholders" => "General Meeting Shareholders",
	"supportinginstitutions" => "Supporting Institutions",
	"stockinformation" => "Stock Information",
	"stockhistory" => "Padi Stock History",

	"researchandnews" => "Research And News",
	"dailyreports" => "Daily Reports",
	"fullreports" => "Full Reports",
	"news" => "News",

	"faq" => "FAQ",

	"user" => "User",
	"role" => "Role",

	"contact" => "Contact",
	"address" => "Address",
	"emails" => "Emails",
	"setting" => "Setting",
];
$whiteList = ["home-list", "adminHome", 'login', 'logout', 'register', 'password.request', 'password.email', 'password.reset', 'generate.menu', 'accessDenied', 'reportPDF', 'reportExcel', 'emailReport', 'reportGrowth', 'slidershowcase-list', 'slidershowcase-delete', 'slidershowcase-index'];

return ['menu' => $menu, 'role' => $role, 'mappingMenu' => $mappingMenu, 'whiteList' => $whiteList];
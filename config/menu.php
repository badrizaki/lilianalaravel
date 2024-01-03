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
				'route'	=> 'home-list'
			],
			'profile' => [
				'text'  => 'Profil',
				'mainPage'	=> 'about',
				'icon'  => 'fas fa-user',
				'type'	=> 'accordion',
				'submenu' => [
					[
						'text'  => 'Tentang',
						'type'  => 'menu',
						'url'   => 'admin/about',
						'icon'  => 'fas fa-user',
						'mainPage'	=> 'about',
						'page'	=> 'about',
						'route'	=> 'about-edit',
					],
					[
						'text'  => 'Visi & Misi',
						'type'  => 'menu',
						'url'   => 'admin/visimisi',
						'icon'  => 'setting',
						'mainPage'	=> 'about',
						'page'	=> 'visimisi',
						'route'	=> 'visimisi-list',
					],
					[
						'text'  => 'Rekam Jejak',
						'type'  => 'menu',
						'url'   => 'admin/trackrecord',
						'icon'  => 'setting',
						'mainPage'	=> 'about',
						'page'	=> 'trackrecord',
						'route'	=> 'trackrecord-edit',
					]
				]
			],
			[
				'text'  => 'Program',
				'type'  => 'menu',
				'url'   => 'admin/program',
				'icon'  => 'fas fa-th',
				'mainPage'	=> 'program',
				'page'	=> 'program',
				'route'	=> 'program-list'
			],
			[
				'text'  => 'Galeri',
				'type'  => 'menu',
				'url'   => 'admin/gallery',
				'icon'  => 'fas fa-th',
				'mainPage'	=> 'gallery',
				'page'	=> 'gallery',
				'route'	=> 'gallery-list'
			],
			[
				'text'  => 'Berita',
				'type'  => 'menu',
				'url'   => 'admin/news',
				'icon'  => 'fas fa-th',
				'mainPage'	=> 'news',
				'page'	=> 'news',
				'route'	=> 'news-list'
			],
		],
	],

	[
		'text'  => 'User Management',
		'menu' => [
			[
				'text'  => 'User',
				'type'  => 'menu',
				'url'   => 'admin/user',
				'icon'  => 'fas fa-users',
				'mainPage'	=> 'user',
				'page'	=> 'user',
				'route'	=> 'user-list'
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
					[
						'text'  => 'Kontak',
						'type'  => 'menu',
						'url'   => 'admin/contact',
						'icon'  => 'setting',
						'mainPage'	=> 'sitename',
						'page'	=> 'contact',
						'route'	=> 'contact-edit',
					],
				]
			],


		],
	],

];

$mappingMenu = [
	"homecontent" => "Home",
	"about" => "Tentang",
	"visimisi" => "Visi Misi",
	"trackrecord" => "Rekam Jejak",
	
	"program" => "Program",
	"gallery" => "Galeri",
	"news" => "Berita",

	"sitename" => "Website Name",
	"metakey" => "Keyword",
	"metadesc" => "Description",
	"analytic" => "Google Analytic",

	"changepassword" => "Change Password",

	"profile" => "Profile",
	
	"user" => "User",
	"role" => "Role",

	"contact" => "Kontak",
	// "address" => "Address",
	// "emails" => "Emails",
	"setting" => "Setting",
];
$whiteList = ["home-list", "adminHome", 'login', 'logout', 'register', 'password.request', 'password.email', 'password.reset', 'generate.menu', 'accessDenied', 'reportPDF', 'reportExcel', 'emailReport', 'reportGrowth', 'slidershowcase-list', 'slidershowcase-delete', 'slidershowcase-index'];

return ['menu' => $menu, 'role' => $role, 'mappingMenu' => $mappingMenu, 'whiteList' => $whiteList];
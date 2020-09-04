<?php
	return array(
		// просмотр школы
		'school/([0-9]+)'=>'school/view/$1',
		//каталог
		'catalog'=>'catalog/index',
		//категории
		'category/([0-9]+)/page-([0-9]+)'=>'catalog/category/$1/$2',
		'category/([0-9]+)' => 'catalog/category/$1', 
		
		//Пользователь
		'user/register'=>'user/register',
		'user/login'=>'user/login',
		'user/logout' => 'user/logout',
		'cabinet/edit' => 'cabinet/edit',
		'cabinet'=>'cabinet/index',
		//Управление 
		// Управление школами:    
		'admin/school/create' => 'adminSchool/create',
		'admin/school/update/([0-9]+)' => 'adminSchool/update/$1',
		'admin/school/delete/([0-9]+)' => 'adminSchool/delete/$1',
		'admin/school' => 'adminSchool/index',
		
		// Управление школьниками:    
		'admin/student/create' => 'adminStudent/create',
		'admin/student/update/([0-9]+)' => 'adminStudent/update/$1',
		'admin/student/delete/([0-9]+)' => 'adminStudent/delete/$1',
		'admin/student' => 'adminStudent/index',
    
		
		//Админпанель
		'admin'=>'admin/index',
		
		//О магазине
		'contacts'=>'site/contacts',
		'about'=>'site/about',
		//адрес на главную
		''=>'site/index'
	);
<?php
	

	class CatalogController
	{
		public function actionIndex()
		{
			$categories = array();
			$categories = Category::getCategoriesList();
			
			$schoolList = array();
			$schoolList = School::getLatestSchoolList(12);
			
			require_once(ROOT.'/views/catalog/index.php');
			
			return true;
		}
		
		public function actionCategory($categoryID, $page = 1)
		{
			
			$categories = array();
			$categories = Category::getCategoriesList();
			
			$schools = array();
			$schools = School::getSchoolsListByCategory($categoryID, $page);
			
			$students = array();
			$students = Student::getStudentsList();
			
			$total = School::getTotalSchoolsInCategory($categoryID);
			
			$pagination = new Pagination($total, $page, School::SHOW_BY_DEFAULT, 'page-');
			
			require_once(ROOT.'/views/catalog/category.php');
			
			return true;
		}
	}
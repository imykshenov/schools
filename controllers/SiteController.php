<?php
	

	
	class SiteController
	{
		public function actionIndex()
		{
			$categories = array();
			$categories = Category::getCategoriesList();
			
			$schoolList = array();
			$schoolList = School::getLatestSchoolList(6);
			
			require_once(ROOT.'/views/site/index.php');
			
			return true;
		}
	}
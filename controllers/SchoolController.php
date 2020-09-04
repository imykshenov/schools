<?php
	

	class SchoolController
	{
			
		public function actionView($id) 
		{
			
				$categories = array(); // создаем переменную
				$categories = Category::getCategoriesList(); // передаем переменной метод(функцию) из класса categorylist

				$schools = School::GetSchoolById($id);// это присваивание нужно для того чтобы 
				//вывести страницу отдельно, в данном случаем массив не нужен, т.к. запись одна
				
				
				$students = array();
				$students = Student::getStudentsList($id);

				require_once(ROOT . '/views/school/view.php');


			return true;
		}
	}
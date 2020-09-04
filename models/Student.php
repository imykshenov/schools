<?php

	/**
 	* Класс Student - модель для работы со школьниками
 	*/

	class Student
	{


		// Возвращает список школьников
		// Используется во view'e, в котором просматривается подробная информация о школе 
		// SchoolController
		public static function getStudentsList($categoryID = false)
		{
			if($categoryID)
			{
				$db= Db::getConnection();
			
				$studentsList = array();
			
				$result = $db->query("SELECT * FROM students " 
									. "WHERE id_school='$categoryID' "
									. "ORDER BY id ASC ");
			
				$i=0;
				while($row = $result->fetch())
				{
					$studentsList[$i]['id'] = $row['id'];
					$studentsList[$i]['fio'] = $row['fio'];
					$studentsList[$i]['birthday'] = $row['birthday'];
					$studentsList[$i]['class'] = $row['class'];
					$studentsList[$i]['exams'] = $row['exams'];
					$studentsList[$i]['university'] = $row['university'];
					$studentsList[$i]['number'] = $row['number'];
					$studentsList[$i]['parents'] = $row['parents'];
					$studentsList[$i]['parents_number'] = $row['parents_number'];
					$studentsList[$i]['email'] = $row['email'];
					//$studentsList[$i]['fio_math'] = $row['fio_math'];
					//$studentsList[$i]['fio_inf'] = $row['fio_inf'];
					$i++;

				}
			
				return $studentsList;
			}
		}



		/**
		 * Возвращает список школ, будем использовать этот метод в AdminStudentController
		 * @return array <p>Массив с школьниками</p>
		 */
		//вроде как работает, можно уже не трогать
		public static function getStudentList()
		{
			// Соединение с БД
			$db= Db::getConnection();
			
			
			//Текст запроса к БД
			$result = $db->query('SELECT * FROM students ORDER BY id ASC');

			$studentsList = array();					
			$i=0;
			// Получение и возврат результатов
			while($row = $result->fetch())
			{
				$studentsList[$i]['id'] = $row['id'];
				$studentsList[$i]['fio'] = $row['fio'];
				$studentsList[$i]['birthday'] = $row['birthday'];
				$studentsList[$i]['class'] = $row['class'];
				$studentsList[$i]['exams'] = $row['exams'];
				$studentsList[$i]['university'] = $row['university'];
				$studentsList[$i]['number'] = $row['number'];
				$studentsList[$i]['parents'] = $row['parents'];
				$studentsList[$i]['parents_number'] = $row['parents_number'];
				$studentsList[$i]['email'] = $row['email'];
				$studentsList[$i]['id_school'] = $row['id_school'];
				//$studentsList[$i]['fio_math'] = $row['fio_math'];
				//$studentsList[$i]['fio_inf'] = $row['fio_inf'];
				$i++;

			}
		
			return $studentsList;
			
		}


			/**
			 * Возвращает ученика с указанным id
			 * @param integer $id <p>id ученика</p>
			 * @return array <p>Массив с информацией о ученика</p>
			 */
			public static function GetStudentById($id)
			{
				
				
				// Соединение с БД
				$db = Db::getConnection();// связь с бд
				  // Текст запроса к БД
				$sql = 	'SELECT * FROM students WHERE id=:id';		

				// Используется подготовленный запрос
				$result = $db->prepare($sql);
				$result->bindParam(':id', $id, PDO::PARAM_INT);

				 // Указываем, что хотим получить данные в виде массива
				$result->setFetchMode(PDO::FETCH_ASSOC);
				
				// Выполнение коменды
				$result->execute();
					
				return $result->fetch();
				
			}
		

		/**
		 * Добавляет школьника в БД
		 * @param array $options <p>Массив с информацией о школьнике</p>
		 * @return integer <p>id добавленной в таблицу записи</p>
		 */
		public static function createStudent($options)
		{

			// Соединение с БД
			$db = Db::getConnection();

			// Текст запроса к БД
			$sql = 'INSERT INTO students '
					. '(fio, birthday, class, exams, university, number, parents, parents_number, email, id_school)'
					. 'VALUES '
					. '(:fio, :birthday, :class, :exams, :university, :number, :parents, :parents_number, :email, :id_school)';

			// Получение и возврат результатов. Используется подготовленный запрос
			$result = $db->prepare($sql);
			$result->bindParam(':fio', $options['fio'], PDO::PARAM_STR);
			$result->bindParam(':birthday', $options['birthday'], PDO::PARAM_STR);
			$result->bindParam(':class', $options['class'], PDO::PARAM_STR);
			$result->bindParam(':exams', $options['exams'], PDO::PARAM_STR);
			$result->bindParam(':university', $options['university'], PDO::PARAM_STR);
			$result->bindParam(':number', $options['number'], PDO::PARAM_STR);
			$result->bindParam(':parents', $options['parents'], PDO::PARAM_STR);
			$result->bindParam(':parents_number', $options['parents_number'], PDO::PARAM_STR);
			$result->bindParam(':email', $options['email'], PDO::PARAM_STR);
			$result->bindParam(':id_school', $options['id_school'], PDO::PARAM_STR);

			return $result->execute();

			if ($result->execute()) {
				// Если запрос выполенен успешно, возвращаем id добавленной записи
				return $db->lastInsertId();
			}
			// Иначе возвращаем 0
			return 0;

		}


		/**
		 * Редактирует школьника с заданным id
		 * @param integer $id <p>id школьника</p>
		 * @param array $options <p>Массив с информацей о школе</p>
		 * @return boolean <p>Результат выполнения метода</p>
		 */
		public static function updateStudentById($id, $options)
		{
		
			// Соединение с БД
			$db = Db::getConnection();

			// Текст запроса к БД
			$sql = "UPDATE students
				SET 
					fio = :fio, 
					birthday = :birthday, 
					class = :class, 
					exams = :exams,
					university = :university, 
					number = :number, 
					parents = :parents, 
					parents_number = :parents_number,
					email = :email,
					id_school = :id_school
				WHERE id = :id";
				
				
			// Получение и возврат результатов. Используется подготовленный запрос
			$result = $db->prepare($sql);
			$result->bindParam(':id', $id, PDO::PARAM_INT);
			$result->bindParam(':fio', $options['fio'], PDO::PARAM_STR);
			$result->bindParam(':birthday', $options['birthday'], PDO::PARAM_STR);
			$result->bindParam(':class', $options['class'], PDO::PARAM_STR);
			$result->bindParam(':exams', $options['exams'], PDO::PARAM_STR);
			$result->bindParam(':university', $options['university'], PDO::PARAM_STR);
			$result->bindParam(':number', $options['number'], PDO::PARAM_STR);
			$result->bindParam(':parents', $options['parents'], PDO::PARAM_STR);
			$result->bindParam(':parents_number', $options['parents_number'], PDO::PARAM_STR);
			$result->bindParam(':email', $options['email'], PDO::PARAM_STR);
			$result->bindParam(':id_school', $options['id_school'], PDO::PARAM_INT);
			
			return $result->execute();

			

		}	

		 /**
		* Удаляет информацию о школьнике с указанным id
		* @param integer $id <p>id школьника</p>
		* @return boolean <p>Результат выполнения метода</p>
		*/
		public static function deleteStudentById($id)
		{
			// Соединение с БД
			$db = Db::getConnection();

			// Текст запроса к БД
			$sql = 'DELETE FROM students WHERE id = :id';

			// Получение и возврат результатов. Используется подготовленный запрос
			$result = $db->prepare($sql);
			$result->bindParam(':id', $id, PDO::PARAM_INT);
			return $result->execute();
		}


	

		
	}
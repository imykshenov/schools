<?php	

/**
 * Класс School - модель для работы со школами
 */
	
	class School
	{
		// Количество отображаемых школ по умолчанию
		const SHOW_BY_DEFAULT = 6;
		
		/**
		* Возвращает массив последних школ
		* @param type $count [optional] <p>Количество</p>
		* @param type $page [optional] <p>Номер текущей страницы</p>
		* @return array <p>Массив со школами</p>
		*/
		
		public static function getLatestSchoolList($count = self::SHOW_BY_DEFAULT)
		{
			// Соединение с БД
			$db = Db::getConnection();
			
			
			 // Текст запроса к БД
			$sql = 'SELECT school_id, school_name, school_place, school_contact, school_site, school_director '
									. 'FROM schools_tb '
									. 'ORDER BY school_id DESC '
									. 'LIMIT 10 ';
									
			// Используется подготовленный запрос
			$result = $db->prepare($sql);
			$result->bindParam(':count', $count, PDO::PARAM_INT);
			
			// Указываем, что хотим получить данные в виде массива
			$result->setFetchMode(PDO::PARAM_INT);
			
			 // Выполнение коменды
			$result->execute();
			
			$i=0;
			
			$schoolList = array();
			
			// Получение и возврат результатов
			while($row = $result->fetch()){
				$schoolList[$i]['school_id'] = $row['school_id'];
				$schoolList[$i]['school_name'] = $row['school_name'];
				$schoolList[$i]['school_place'] = $row['school_place'];
				$schoolList[$i]['school_contact'] = $row['school_contact'];
				$schoolList[$i]['school_site'] = $row['school_site'];
				$schoolList[$i]['school_director'] = $row['school_director'];
				$i++;
			}
			
			return $schoolList;
		}
		
		
		/**
		* Возвращает список школ в указанной категории(районе)
		* @param type $categoryId <p>id категории</p>
		* @param type $page [optional] <p>Номер страницы</p>
		* @return type <p>Массив со школами</p>
		*/
		public static function getSchoolsListByCategory($categoryID = false, $page = 1)
		{
			
				$limit = School::SHOW_BY_DEFAULT;
				// Смещение (для запроса)
				$offset = ($page - 1) * self::SHOW_BY_DEFAULT;
				
				
				$db = Db::getConnection();// связь с бд
			
				// Текст запроса к БД
				$sql = 'SELECT school_id, school_name, school_place, school_contact, school_site, school_director '
									. 'FROM schools_tb '
									. 'WHERE school_district = :school_district ' 
									. 'ORDER BY school_id ASC '
									. 'LIMIT :limit '
									. 'OFFSET :offset';
				
				// Используется подготовленный запрос
				$result = $db->prepare($sql);
				$result-> bindParam(':school_district', $categoryID, PDO::PARAM_INT);
				$result-> bindParam(':limit', $limit, PDO::PARAM_INT);
				$result-> bindParam(':offset', $offset, PDO::PARAM_INT);
				
				
				// Выполнение коменды
				$result->execute();
				
				$i=0;
				
				$schools = array();
				
				
				 // Получение и возврат результатов
				while($row = $result->fetch())
				{
					$schools[$i]['school_id'] = $row['school_id'];
					$schools[$i]['school_name'] = $row['school_name'];
					$schools[$i]['school_place'] = $row['school_place'];
					$schools[$i]['school_contact'] = $row['school_contact'];
					$schools[$i]['school_site'] = $row['school_site'];
					$schools[$i]['school_director'] = $row['school_director'];
					$i++;
				}
			
				return $schools;
			
		}
		
		
		/**
		 * Возвращает список школ с указанными индентификторами
		 * @param array $idsArray <p>Массив с идентификаторами</p>
		 * @return array <p>Массив со списком школ</p>
		 */
		public static function getSchoolsByIds($idsArray)
		{
			// Соединение с БД
			$db = Db::getConnection();

			// Превращаем массив в строку для формирования условия в запросе
			$idsString = implode(',', $idsArray);

			// Текст запроса к БД
			$sql = "SELECT * FROM schools_tb WHERE _school_id IN ($idsString)";

			$result = $db->query($sql);

			// Указываем, что хотим получить данные в виде массива
			$result->setFetchMode(PDO::FETCH_ASSOC);

			// Получение и возврат результатов
			$i = 0;
			$products = array();
			while ($row = $result->fetch()) {
				$products[$i]['school_id'] = $row['school_id'];
				$products[$i]['school_name'] = $row['school_name'];
				$products[$i]['school_place'] = $row['school_place'];
				$products[$i]['school_contact'] = $row['school_contact'];
				
				$i++;
			}
			return $products;
		}
			/**
			 * Возвращает школу с указанным id
			 * @param integer $id <p>id школы</p>
			 * @return array <p>Массив с информацией о школе</p>
			 */
			public static function GetSchoolById($id)
			{
				
				
				
				// Соединение с БД
				$db = Db::getConnection();// связь с бд
				  // Текст запроса к БД
				$sql = 	'SELECT * FROM schools_tb WHERE school_id=:id';		

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
			* Возвращаем количество школ в указанной категории
			* @param integer $categoryId
			* @return integer
			*/			
			public static function getTotalSchoolsInCategory($categoryID)
			{
				 // Соединение с БД
				$db = Db::getConnection();
				
				// Текст запроса к БД
				$sql = 'SELECT count(school_id) AS count FROM schools_tb WHERE school_district =:school_district';
				
				// Используется подготовленный запрос
				$result = $db->prepare($sql);
				$result->bindParam(':school_district', $categoryID, PDO::PARAM_INT);

				// Выполнение коменды
				$result->execute();

				// Возвращаем значение count - количество
				$row = $result->fetch();
				return $row['count'];
				
			}
			
			/**
			 * Возвращает список школ
			 * Данный метод используется в админпанели
			 * @return array <p>Массив с товарами</p>
			 */		
			public static function getSchoolList()
		{
			// Соединение с БД
			$db = Db::getConnection();
			
			
			
			// Текст запроса к БД
			$result = $db->query('SELECT * FROM schools_tb ORDER BY school_id ASC ');
			$schoolList = array();
			$i=0;
			// Получение и возврат результатов
				while($row = $result->fetch()){
					$schoolList[$i]['school_id'] = $row['school_id'];
					$schoolList[$i]['school_name'] = $row['school_name'];
					$schoolList[$i]['school_place'] = $row['school_place'];
					$schoolList[$i]['school_contact'] = $row['school_contact'];
					$schoolList[$i]['school_site'] = $row['school_site'];
					$schoolList[$i]['school_email'] = $row['school_email'];
					$schoolList[$i]['school_director'] = $row['school_director'];
					
					$schoolList[$i]['school_fio_math'] = $row['school_fio_math'];
					$schoolList[$i]['school_fio_math_number'] = $row['school_fio_math_number'];
					$schoolList[$i]['school_fio_inf'] = $row['school_fio_inf'];
					$schoolList[$i]['school_fio_inf_number'] = $row['school_fio_inf_number'];
					$schoolList[$i]['school_fio_phys'] = $row['school_fio_phys'];
					$schoolList[$i]['school_fio_phys_number'] = $row['school_fio_phys_number'];
					$i++;
				}
			return $schoolList;
		}


		/**
		 * Добавляет новую школу
		 * @param array $options <p>Массив с информацией о школке</p>
		 * @return integer <p>id добавленной в таблицу записи</p>
		 */
		public static function createSchool($options)
		{
			// Соединение с БД
			$db = Db::getConnection();

			// Текст запроса к БД
			$sql = 'INSERT INTO schools_tb '
					. '(school_name, school_district, school_place, school_contact, school_site, school_email, school_director, school_fio_math, school_fio_math_number, school_fio_inf, school_fio_inf_number, school_fio_phys, school_fio_phys_number)'
					. 'VALUES '
					. '(:school_name, :school_district, :school_place, :school_contact, :school_site, :school_email, :school_director, :school_fio_math, :school_fio_math_number, :school_fio_inf, :school_fio_inf_number, :school_fio_phys, :school_fio_phys_number)';

			// Получение и возврат результатов. Используется подготовленный запрос
			$result = $db->prepare($sql);
			$result->bindParam(':school_name', $options['school_name'], PDO::PARAM_STR);
			$result->bindParam(':school_district', $options['school_district'], PDO::PARAM_STR);
			$result->bindParam(':school_place', $options['school_place'], PDO::PARAM_STR);
			$result->bindParam(':school_contact', $options['school_contact'], PDO::PARAM_STR);
			$result->bindParam(':school_site', $options['school_site'], PDO::PARAM_INT);
			$result->bindParam(':school_email', $options['school_email'], PDO::PARAM_INT);
			$result->bindParam(':school_director', $options['school_director'], PDO::PARAM_INT);
			
			$result->bindParam(':school_fio_math', $options['school_fio_math'], PDO::PARAM_STR);
			$result->bindParam(':school_fio_math_number', $options['school_fio_math_number'], PDO::PARAM_STR);
			$result->bindParam(':school_fio_inf', $options['school_fio_inf'], PDO::PARAM_STR);
			$result->bindParam(':school_fio_inf_number', $options['school_fio_inf_number'], PDO::PARAM_STR);
			$result->bindParam(':school_fio_phys', $options['school_fio_phys'], PDO::PARAM_STR);
			$result->bindParam(':school_fio_phys_number', $options['school_fio_phys_number'], PDO::PARAM_INT);
			return $result->execute();
			if ($result->execute()) {
				// Если запрос выполенен успешно, возвращаем id добавленной записи
				return $db->lastInsertId();
			}
			// Иначе возвращаем 0
			return 0;
		}



		/**
		 * Редактирует школу с заданным id
		 * @param integer $id <p>id товара</p>
		 * @param array $options <p>Массив с информацей о школе</p>
		 * @return boolean <p>Результат выполнения метода</p>
		 */
		public static function updateSchoolById($id, $options)
		{
			// Соединение с БД
			$db = Db::getConnection();

			// Текст запроса к БД
			$sql = "UPDATE schools_tb
				SET 
					school_name = :school_name, 
					school_district = :school_district, 
					school_place = :school_place, 
					school_contact = :school_contact,
					school_site = :school_site,
					school_email = :school_email,
					school_director = :school_director,
					
					school_fio_math = :school_fio_math, 
					school_fio_math_number = :school_fio_math_number, 
					school_fio_inf = :school_fio_inf, 
					school_fio_inf_number = :school_fio_inf_number,
					school_fio_phys = :school_fio_phys,
					school_fio_phys_number = :school_fio_phys_number
				WHERE school_id = :school_id";

			// Получение и возврат результатов. Используется подготовленный запрос
			$result = $db->prepare($sql);
			$result->bindParam(':school_id', $id, PDO::PARAM_INT);
			$result->bindParam(':school_name', $options['school_name'], PDO::PARAM_STR);
			$result->bindParam(':school_district', $options['school_district'], PDO::PARAM_STR);
			$result->bindParam(':school_place', $options['school_place'], PDO::PARAM_STR);
			$result->bindParam(':school_contact', $options['school_contact'], PDO::PARAM_STR);
			$result->bindParam(':school_site', $options['school_site'], PDO::PARAM_INT);
			$result->bindParam(':school_email', $options['school_email'], PDO::PARAM_INT);
			$result->bindParam(':school_director', $options['school_director'], PDO::PARAM_INT);
			
			$result->bindParam(':school_fio_math', $options['school_fio_math'], PDO::PARAM_STR);
			$result->bindParam(':school_fio_math_number', $options['school_fio_math_number'], PDO::PARAM_STR);
			$result->bindParam(':school_fio_inf', $options['school_fio_inf'], PDO::PARAM_STR);
			$result->bindParam(':school_fio_inf_number', $options['school_fio_inf_number'], PDO::PARAM_STR);
			$result->bindParam(':school_fio_phys', $options['school_fio_phys'], PDO::PARAM_STR);
			$result->bindParam(':school_fio_phys_number', $options['school_fio_phys_number'], PDO::PARAM_INT);

			return $result->execute();
			
		}



			
		/**
		* Удаляет товар с указанным id
		* @param integer $id <p>id товара</p>
		* @return boolean <p>Результат выполнения метода</p>
		*/
			public static function deleteSchoolById($id)
		{
			// Соединение с БД
			$db = Db::getConnection();

			// Текст запроса к БД
			$sql = 'DELETE FROM schools_tb WHERE school_id = :id';

			// Получение и возврат результатов. Используется подготовленный запрос
			$result = $db->prepare($sql);
			$result->bindParam(':id', $id, PDO::PARAM_INT);
			return $result->execute();
		}




			
			
			
	}
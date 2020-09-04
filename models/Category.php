<?php
/**
 * Класс Category - модель для работы с категориями(районами) школ
 */
	class Category
	{
		/**
     * Возвращает массив категорий для списка на сайте
     * @return array <p>Массив с категориями</p>
     */
		public static function getCategoriesList()
		{
			$db= Db::getConnection();// Соединение с БД
			
			$categoryList = array();
			
			$result = $db->query('SELECT * FROM district ORDER BY district_id ASC');// Запрос к БД
			
			$i=0;
			while($row = $result->fetch())// Получение и возврат результатов
			{
				$categoryList[$i]['district_id'] = $row['district_id'];
				$categoryList[$i]['district_name'] = $row['district_name'];
				
					$i++;

				}
			
					return $categoryList;
		}
		
				/**
			* Возвращает массив категорий для списка в админпанели <br/>
			* (при этом в результат попадают и включенные и выключенные категории)
			* @return array <p>Массив категорий</p>
			*/
		
				public static function getCategoriesListAdmin()
			{
				// Соединение с БД
				$db = Db::getConnection();

				// Запрос к БД
				$result = $db->query('SELECT district_id, district_name FROM district ORDER BY district_id ASC');

				// Получение и возврат результатов
				$categoryList = array();
				$i = 0;
				while ($row = $result->fetch()) {
					$categoryList[$i]['district_id'] = $row['district_id'];
					$categoryList[$i]['district_name'] = $row['district_name'];
				
					$i++;
				}
				return $categoryList;
			}
		
			
		
	
			
			
			 public static function getCategoryById($id)
			{
				// Соединение с БД
				$db = Db::getConnection();

				// Текст запроса к БД
				$sql = 'SELECT * FROM district WHERE district_id = :id';

				// Используется подготовленный запрос
				$result = $db->prepare($sql);
				$result->bindParam(':id', $id, PDO::PARAM_INT);

				// Указываем, что хотим получить данные в виде массива
				$result->setFetchMode(PDO::FETCH_ASSOC);

				// Выполняем запрос
				$result->execute();

				// Возвращаем данные
				return $result->fetch();
			}
			
			/**
			* Возвращает текстое пояснение статуса для категории :<br/>
			* <i>0 - Скрыта, 1 - Отображается</i>
			* @param integer $status <p>Статус</p>
			* @return string <p>Текстовое пояснение</p>
			*/
				
				public static function getStatusText($status)
			{
				switch ($status) {
					case '1':
						return 'Отображается';
						break;
					case '0':
						return 'Скрыта';
						break;
				}
			}
			
			/**
     * Добавляет новую категорию (на самом деле ненужная функция, т.к. районы статичны, но по стандарту CRUD должно быть)
     * @param string $name <p>Название района</p>
     * @return boolean <p>Результат добавления записи в таблицу</p>
     */
			public static function createCategory($name)
			{
				// Соединение с БД
				$db = Db::getConnection();

				// Текст запроса к БД
				$sql = 'INSERT INTO district (district_name) '
                . 'VALUES (:name)';

				// Получение и возврат результатов. Используется подготовленный запрос
				$result = $db->prepare($sql);
				$result->bindParam(':name', $name, PDO::PARAM_STR);
				return $result->execute();
			}
			
			/**
			* Удаляет категорию с заданным id
			* @param integer $id
			* @return boolean <p>Результат выполнения метода</p>
			*/
		
			public static function deleteCategoryById($id)
			{
				// Соединение с БД
				$db = Db::getConnection();

				// Текст запроса к БД
				$sql = 'DELETE FROM district WHERE district_id = :id';

				// Получение и возврат результатов. Используется подготовленный запрос
				$result = $db->prepare($sql);
				$result->bindParam(':id', $id, PDO::PARAM_INT);
				return $result->execute();
			}
			
			/**
			* Редактирование категории с заданным id
			* @param integer $id <p>id категории</p>
			* @param string $name <p>Название</p>
			* @return boolean <p>Результат выполнения метода</p>
			*/
			public static function updateCategoryById($id, $name)
			{
				// Соединение с БД
				$db = Db::getConnection();

				// Текст запроса к БД
				$sql = "UPDATE district
					SET 
						district_name = :name, 
						
					WHERE district_id = :id";

				// Получение и возврат результатов. Используется подготовленный запрос
				$result = $db->prepare($sql);
				$result->bindParam(':id', $id, PDO::PARAM_INT);
				$result->bindParam(':name', $name, PDO::PARAM_STR);
				return $result->execute();
			}
	}
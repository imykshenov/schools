<?php

/**
 * Контроллер AdminSchoolController
 * Управление товарами в админпанели
 */
class AdminSchoolController extends AdminBase
{

    /**
     * Action для страницы "Управление школами"
     */
    public function actionIndex()
    {
        // Проверка доступа
        self::checkAdmin();

        // Получаем список школ
        $schoolList = School::getSchoolList();

        // Подключаем вид
        require_once(ROOT . '/views/admin_school/index.php');
        return true;
    }

    /**
     * Action для страницы "Добавить школу"
     */
    public function actionCreate()
    {
        // Проверка доступа
        self::checkAdmin();

        // Получаем список районов для выпадающего списка
        $categoriesList = Category::getCategoriesListAdmin();

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Получаем данные из формы

            $options['school_name'] = $_POST['school_name'];
			$options['school_district'] = $_POST['school_district'];
            $options['school_place'] = $_POST['school_place'];
            $options['school_contact'] = $_POST['school_contact'];
            $options['school_site'] = $_POST['school_site'];
			$options['school_email'] = $_POST['school_email'];
            $options['school_director'] = $_POST['school_director'];	
			$options['school_fio_math'] = $_POST['school_fio_math'];
			$options['school_fio_math_number'] = $_POST['school_fio_math_number'];
			$options['school_fio_inf'] = $_POST['school_fio_inf'];
			$options['school_fio_inf_number'] = $_POST['school_fio_inf_number'];
			$options['school_fio_phys'] = $_POST['school_fio_phys'];
			$options['school_fio_phys_number'] = $_POST['school_fio_phys_number'];


            // Флаг ошибок в форме
            $errors = false;

            // При необходимости можно валидировать значения нужным образом
            if (!isset($options['school_name']) || empty($options['school_name'])) {
                $errors[] = 'Заполните поля';
            }

            if ($errors == false) {
                // Если ошибок нет
                // Добавляем новую школу
                $id = School::createSchool($options);

               

                // Перенаправляем пользователя на страницу управлениями школами
                header("Location: /admin/school");
            }
        }

        // Подключаем вид
        require_once(ROOT . '/views/admin_school/create.php');
        return true;
    }

    /**
     * Action для страницы "Редактировать школу"
     */
    public function actionUpdate($id)
    {
        // Проверка доступа
        self::checkAdmin();

        // Получаем список районов для выпадающего списка
        $categoriesList = Category::getCategoriesListAdmin();

        // Получаем данные о конкретной школе
        $school = School::getSchoolById($id);

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Получаем данные из формы редактирования. При необходимости можно валидировать значения
			
            $options['school_name'] = $_POST['school_name'];
			$options['school_district'] = $_POST['school_district'];
            $options['school_place'] = $_POST['school_place'];
            $options['school_contact'] = $_POST['school_contact'];
            $options['school_site'] = $_POST['school_site'];
			$options['school_email'] = $_POST['school_email'];
            $options['school_director'] = $_POST['school_director'];	
			$options['school_fio_math'] = $_POST['school_fio_math'];
			$options['school_fio_math_number'] = $_POST['school_fio_math_number'];
			$options['school_fio_inf'] = $_POST['school_fio_inf'];
			$options['school_fio_inf_number'] = $_POST['school_fio_inf_number'];
			$options['school_fio_phys'] = $_POST['school_fio_phys'];
			$options['school_fio_phys_number'] = $_POST['school_fio_phys_number'];

            // Сохраняем изменения
            if (School::updateSchoolById($id, $options)) {


                // Если запись сохранена
                // Проверим, загружалось ли через форму изображение
               
            }

            // Перенаправляем пользователя на страницу управлениями школами
            header("Location: /admin/school");
        }

        // Подключаем вид
        require_once(ROOT . '/views/admin_school/update.php');
        return true;
    }

    /**
     * Action для страницы "Удалить школу"
     */
    public function actionDelete($id)
    {
        // Проверка доступа
        self::checkAdmin();

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Удаляем школу
            School::deleteSchoolById($id);

            // Перенаправляем пользователя на страницу управлениями товарами
            header("Location: /admin/school");
        }

        // Подключаем вид
        require_once(ROOT . '/views/admin_school/delete.php');
        return true;
    }

}

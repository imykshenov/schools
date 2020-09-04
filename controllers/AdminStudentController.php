<?php

/**
 * Контроллер AdminSstudentController
 * Управление школьниками в админпанели
 */
class AdminStudentController extends AdminBase
{

    /**
     * Action для страницы "Управление школьниками"
     */
    public function actionIndex()
    {
        // Проверка доступа
        self::checkAdmin();

        // Получаем список школьников
        $studentList = Student::getStudentList();

        // Подключаем вид
        require_once(ROOT . '/views/admin_student/index.php');
        return true;
    }

    /**
     * Action для страницы "Добавить школьника"
     */
    public function actionCreate()
    {
        // Проверка доступа
        self::checkAdmin();
		

        // Получаем список школ для выпадающего списка
         $schoolList = School::getSchoolList();

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Получаем данные из формы

            $options['fio'] = $_POST['fio'];
            $options['birthday'] = $_POST['birthday'];
            $options['exams'] = $_POST['exams'];
            $options['class'] = $_POST['class'];
            $options['university'] = $_POST['university'];
            $options['number'] = $_POST['number'];
			$options['parents'] = $_POST['parents'];
            $options['parents_number'] = $_POST['parents_number'];
            $options['email'] = $_POST['email'];
            $options['id_school'] = $_POST['id_school'];


            // Флаг ошибок в форме
            $errors = false;

            // При необходимости можно валидировать значения нужным образом
            if (!isset($options['fio']) || empty($options['fio'])) {
                $errors[] = 'Заполните поля';
            }

            if ($errors == false) {
                // Если ошибок нет
                // Добавляем новую школу
                $id = Student::createStudent($options);

                // Перенаправляем пользователя на страницу управлениями товарами
                header("Location: /admin/student");
            }
        }

        // Подключаем вид
        require_once(ROOT . '/views/admin_student/create.php');
        return true;
    }

    /**
     * Action для страницы "Редактировать информацию о школьнике"
     */
    public function actionUpdate($id)
    {
        // Проверка доступа
        self::checkAdmin();

        // Получаем список школ для выпадающего списка
        $schoolList = School::getSchoolList();

        // Получаем данные о конкретном школьнике
        $student = Student::GetStudentById($id);

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Получаем данные из формы редактирования. При необходимости можно валидировать значения
			
            $options['fio'] = $_POST['fio'];
            $options['birthday'] = $_POST['birthday'];
            $options['class'] = $_POST['class'];
			$options['exams'] = $_POST['exams'];
            $options['university'] = $_POST['university'];
            $options['number'] = $_POST['number'];
			$options['parents'] = $_POST['parents'];
            $options['parents_number'] = $_POST['parents_number'];
            $options['email'] = $_POST['email'];
            $options['id_school'] = $_POST['id_school'];

            // Сохраняем изменения
            if (Student::updateStudentById($id, $options)) {
                // Если запись сохранена
                // Проверим, загружалось ли через форму изображение
               
            }
    
            // Перенаправляем пользователя на страницу управлениями
            header("Location: /admin/student");
        }

        // Подключаем вид
        require_once(ROOT . '/views/admin_student/update.php');
        return true;
    }

    /**
     * Action для страницы "Удалить школьника из БД"
     */
    public function actionDelete($id)
    {
        // Проверка доступа
        self::checkAdmin();

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Удаляем информацию о школьнике
            Student::deleteStudentById($id);

            // Перенаправляем пользователя на страницу управлениями товарами
            header("Location: /admin/student");
        }

        // Подключаем вид
        require_once(ROOT . '/views/admin_student/delete.php');
        return true;
    }

}

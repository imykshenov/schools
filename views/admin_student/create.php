<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li><a href="/admin/student">Управление учениками</a></li>
                    <li class="active">Редактировать ученика</li>
                </ol>
            </div>


            <h4>Добавить нового ученика</h4>

            <br/>

            <?php if (isset($errors) && is_array($errors)): ?>
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li> - <?php echo $error; ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>

            <div class="col-lg-4">
                <div class="login-form">
                    <form action="#" method="post" enctype="multipart/form-data">

                        <p>ФИО</p>
                        <input type="text" name="fio" placeholder="" value="">

                        <p>День рождения</p>
                        <input type="text" name="birthday" placeholder="" value="">

                        <p>Класс</p>
                        <input type="text" name="class" placeholder="" value="">

                        <p>Экзамены</p>
                        <input type="text" name="exams" placeholder="" value="">
						
						<p>Вузы(в порядке приоритета)</p>
                        <input type="text" name="university" placeholder="" value="">

                        <p>Номер телефона</p>
                        <input type="text" name="number" placeholder="" value="">

                        <p>Родители</p>
                        <input type="text" name="parents" placeholder="" value="">

                        <p>Телефон родителей</p>
                        <input type="text" name="parents_number" placeholder="" value="">
						
						<p>email</p>
                        <input type="text" name="email" placeholder="" value="">
						
						<p>Школа</p>
                        <select name="id_school">
                            <?php if (is_array($schoolList)): ?>
                                <?php foreach ($schoolList as $school): ?>
                                    <option value="<?php echo $school['school_id']; ?>">
                                        <?php echo $school['school_name']; ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>



                        <br/><br/>

                        <input type="submit" name="submit" class="btn btn-default" value="Сохранить">

                        <br/><br/>

                    </form>
                </div>
            </div>

        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>


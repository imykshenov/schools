<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li><a href="/admin/student">Управление учениками</a></li>
                    <li class="active">Редактировать информацию о ученике</li>
                </ol>
            </div>


            <h4>Редактировать информацию о ученике #<?php echo $id; ?></h4>

            <br/>

            <div class="col-lg-4">
                <div class="login-form">
                    <form action="#" method="post" enctype="multipart/form-data">

                        <p>ФИО</p>
                        <input type="text" name="fio" placeholder="" value="<?php echo $student['fio']; ?>">

                        <p>День рождения</p>
                        <input type="text" name="birthday" placeholder="" value="<?php echo $student['birthday']; ?>">

                        <p>Класс</p>
                        <input type="text" name="class" placeholder="" value="<?php echo $student['class']; ?>">
						
						<p>Экзамены</p>
                        <input type="text" name="exams" placeholder="" value="<?php echo $student['exams']; ?>">
						
						<p>Вузы</p>
                        <input type="text" name="university" placeholder="" value="<?php echo $student['university']; ?>">
						
						<p>Номер телефона</p>
                        <input type="text" name="number" placeholder="" value="<?php echo $student['number']; ?>">
						
						<p>Родители</p>
                        <input type="text" name="parents" placeholder="" value="<?php echo $student['parents']; ?>">
						
						<p>Телефон родителей</p>
                        <input type="text" name="parents_number" placeholder="" value="<?php echo $student['parents_number']; ?>">
						
						<p>email</p>
                        <input type="text" name="email" placeholder="" value="<?php echo $student['email']; ?>">
						
						<p>Школа</p>
						<select name="id_school">
                            <?php if (is_array($schoolList)): ?>
                                <?php foreach ($schoolList as $schoolitem): ?>
                                    <option value="<?php echo $schoolitem['school_id']; ?>" 
                                        <?php if ($student['id_school'] == $schoolitem['school_id']) echo ' selected="selected"'; ?>>
                                        <?php echo $schoolitem['school_name']; ?>
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


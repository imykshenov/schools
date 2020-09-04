<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li><a href="/admin/product">Управление школами</a></li>
                    <li class="active">Редактировать школу</li>
                </ol>
            </div>


            <h4>Редактировать информацию о школе #<?php echo $id; ?></h4>

            <br/>

            <div class="col-lg-4">
                <div class="login-form">
                    <form action="#" method="post" enctype="multipart/form-data">

                        <p>Название школы</p>
                        <input type="text" name="school_name" placeholder="" value="<?php echo $school['school_name']; ?>">
						
						<p>Район</p>
                        <select name="school_district">
                            <?php if (is_array($categoriesList)): ?>
                                <?php foreach ($categoriesList as $category): ?>
                                    <option value="<?php echo $category['district_id']; ?>" 
                                        <?php if ($school['school_district'] == $category['district_id']) echo ' selected="selected"'; ?>>
                                        <?php echo $category['district_name']; ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>

                        <p>Полный адрес</p>
                        <input type="text" name="school_place" placeholder="" value="<?php echo $school['school_place']; ?>">

                        <p>Контакты</p>
                        <input type="text" name="school_contact" placeholder="" value="<?php echo $school['school_contact']; ?>">

                        <p>Сайт школы(если есть)</p>
                        <input type="text" name="school_site" placeholder="" value="<?php echo $school['school_site']; ?>">
						
						<p>email</p>
                        <input type="text" name="school_email" placeholder="" value="<?php echo $school['school_email']; ?>">
                       
                        <p>Директор</p>
                        <input type="text" name="school_director" placeholder="" value="<?php echo $school['school_director']; ?>">
						
						<p>ФИО учителя математики</p>
                        <input type="text" name="school_fio_math" placeholder="" value="<?php echo $school['school_fio_math']; ?>">
						
						<p>Телефон учителя математики</p>
                        <input type="text" name="school_fio_math_number" placeholder="" value="<?php echo $school['school_fio_math_number']; ?>">
						
						<p>ФИО учителя информатики</p>
                        <input type="text" name="school_fio_inf" placeholder="" value="<?php echo $school['school_fio_inf']; ?>">
						
						<p>Телефон учителя информатики</p>
                        <input type="text" name="school_fio_inf_number" placeholder="" value="<?php echo $school['school_fio_inf_number']; ?>">
						
						<p>ФИО учителя физики</p>
                        <input type="text" name="school_fio_phys" placeholder="" value="<?php echo $school['school_fio_phys']; ?>">
						
						<p>Телефон учителя физики</p>
                        <input type="text" name="school_fio_phys_number" placeholder="" value="<?php echo $school['school_fio_phys_number']; ?>">
						

                        
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


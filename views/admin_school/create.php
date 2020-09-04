<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li><a href="/admin/school">Управление школами</a></li>
                    <li class="active">Редактировать школу</li>
                </ol>
            </div>


            <h4>Добавить новую школу</h4>

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

                        <p>Название школы</p>
                        <input type="text" name="school_name" placeholder="" value="">
						
						<p>Район</p>
                        <select name="school_district">
                            <?php if (is_array($categoriesList)): ?>
                                <?php foreach ($categoriesList as $category): ?>
                                    <option value="<?php echo $category['district_id']; ?>">
                                        <?php echo $category['district_name']; ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>

                        <p>Полный адрес(индекс, регион, район, нас пункт, улица, номер дома)</p>
                        <input type="text" name="school_place" placeholder="" value="">

                        <p>Контакты</p>
                        <input type="text" name="school_contact" placeholder="" value="">


                        <p>Сайт школы(если есть)</p>
                        <input type="text" name="school_site" placeholder="" value="">
						
						<p>email</p>
                        <input type="text" name="school_email" placeholder="" value="">  

                        <p>Директор</p>
						<input type="text" name="school_director" placeholder="" value="">
						
						
                        <p>ФИО учителя математики</p>
                        <input type="text" name="school_fio_math" placeholder="" value="">
						
						<p>Номер телефона учителя математики</p>
                        <input type="text" name="school_fio_math_number" placeholder="" value="">

                        <p>ФИО учителя информатики</p>
                        <input type="text" name="school_fio_inf" placeholder="" value="">
						
						<p>Номер телефона учителя информатики</p>
                        <input type="text" name="school_fio_inf_number" placeholder="" value="">

                        <p>ФИО учителя физики</p>
                        <input type="text" name="school_fio_phys" placeholder="" value="">
						
						<p>Номер телефона учителя физики</p>
                        <input type="text" name="school_fio_phys_number" placeholder="" value="">


						

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


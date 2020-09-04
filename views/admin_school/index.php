<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li class="active">Управление школами</li>
                </ol>
            </div>

            <a href="/admin/school/create" class="btn btn-default back"><i class="fa fa-plus"></i> Добавить школу</a>
            
            <h4>Список школ</h4>

            <br/>

            <table class="table-bordered table-striped table">
                <tr>
                    <th>ID школы</th>
                    <th>Название</th>
                    <th>Местоположение</th>
					<th>Контакты</th>
                    <th>Сайт</th>
					<th>Электронный адрес школы</th>
                    <th>Директор</th>
					<th>Фио учителя математики </th>
					<th>Номер телефона</th>
					<th>Фио учителя информатики</th>
					<th>Номер телефона</th>
					<th>Фио учителя физики</th>
					<th>Номер телефона</th>
                    <th></th>
                    <th></th>
                </tr>
                <?php foreach ($schoolList as $school): ?>
                    <tr>
                        <td><?php echo $school['school_id']; ?></td>
                        <td><?php echo $school['school_name']; ?></td>
                        <td><?php echo $school['school_place']; ?></td>  
						<td><?php echo $school['school_contact']; ?></td>
						<td><?php echo $school['school_site']; ?></td>
						<td><?php echo $school['school_email']; ?></td>
						<td><?php echo $school['school_director']; ?></td>
						
						<td><?php echo $school['school_fio_math']; ?></td>
                        <td><?php echo $school['school_fio_math_number']; ?></td>
                        <td><?php echo $school['school_fio_inf']; ?></td>  
						<td><?php echo $school['school_fio_inf_number']; ?></td>
						<td><?php echo $school['school_fio_phys']; ?></td>
						<td><?php echo $school['school_fio_phys_number']; ?></td>
                        <td><a href="/admin/school/update/<?php echo $school['school_id']; ?>" title="Редактировать"><i class="fa fa-pencil-square-o"></i></a></td>
                        <td><a href="/admin/school/delete/<?php echo $school['school_id']; ?>" title="Удалить"><i class="fa fa-times"></i></a></td>
                    </tr>
                <?php endforeach; ?>
            </table>

        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>


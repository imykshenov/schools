<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li class="active">Управление школьниками</li>
                </ol>
            </div>

            <a href="/admin/student/create" class="btn btn-default back"><i class="fa fa-plus"></i> Добавить ученика</a>
            
            <h4>Список учеников</h4>

            <br/>

            <table class="table-bordered table-striped table">
                <tr>
                    <th>№</th> <!--столбец 1-->       
					<th>ФИО</th> <!--столбец 2-->   
					<th>Дата рождения</th> <!--столбец 3-->
					<th>Класс</th> <!--столбец 4-->
					<th>Экзамены</th> <!--столбец 5-->
					<th>Вузы(в порядке приоритета)</th> <!--столбец 6-->       
					<th>Номер телефона</th> <!--столбец 7-->   
					<th>Родители</th> <!--столбец 8-->
					<th>Телефон родителей</th> <!--столбец 9-->
					<th>email</th> <!--столбец 10-->
					<th>id школы</th> <!--столбец 10-->						
                    <th></th>
                    <th></th>
                </tr>
                <?php foreach ($studentList as $student): ?>
                    <tr>
                        <td><?php echo $student['id']; ?></td>
                        <td><?php echo $student['fio']; ?></td>
                        <td><?php echo $student['birthday']; ?></td>  
						<td><?php echo $student['exams']; ?></td>
						<td><?php echo $student['class']; ?></td>
						<td><?php echo $student['university']; ?></td>
                        <td><?php echo $student['number']; ?></td>
                        <td><?php echo $student['parents']; ?></td>  
						<td><?php echo $student['parents_number']; ?></td>
						<td><?php echo $student['email']; ?></td>
						<td><?php echo $student['id_school']; ?></td>
                        <td><a href="/admin/student/update/<?php echo $student['id']; ?>" title="Редактировать"><i class="fa fa-pencil-square-o"></i></a></td>
                        <td><a href="/admin/student/delete/<?php echo $student['id']; ?>" title="Удалить"><i class="fa fa-times"></i></a></td>
                    </tr>
                <?php endforeach; ?>
            </table>

        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>


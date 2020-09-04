<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li><a href="/admin/student">Управление учениками</a></li>
                    <li class="active">Удалить ученика</li>
                </ol>
            </div>


            <h4>Удалить ученика #<?php echo $id; ?></h4>


            <p>Вы действительно хотите удалить этого ученика из БД?</p>

            <form method="post">
                <input type="submit" name="submit" value="Удалить" />
            </form>

            <br></br>

        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>


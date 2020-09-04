<?php include ROOT . '/views/layouts/header.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <div class="col-sm-4 col-sm-offset-4 padding-right">
                
                <?php if ($result): ?>
                    <p>Вы зарегистрированы!</p>
                <?php else: ?>
                    <?php if (isset($errors) && is_array($errors)): ?>
                        <ul>
                            <?php foreach ($errors as $error): ?>
                                <li> - <?php echo $error; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>

                    <div class="signup-form"><!--sign up form-->
                        <h2>Регистрация на сайте</h2>
                        <form action="#" method="post">
                            <input type="text" name="name" placeholder="Имя" value="<?php echo $name; ?>"/>
                            <input type="email" name="email" placeholder="E-mail" value="<?php echo $email; ?>"/>
                            <input type="password" name="password" placeholder="Пароль" value="<?php echo $password; ?>"/>
							
                            <input type="submit" name="submit" class="btn btn-default" disabled="" value="Регистрация" />
							
							
							<input type="checkbox" id="politics" name="checkbox" onclick="check();" value="" autocomplete="off"/>
							Нажимая на кнопку "Регистрация", я даю свое согласие на обработку персональных данных.
                        </form>
						<script>
							function check() {
								var submit = document.getElementsByName('submit')[0];
								if (document.getElementById('politics').checked)
									submit.disabled = '';
								else
									submit.disabled = 'disabled';
							}
						</script>
						
                    </div><!--/sign up form-->
                
                <?php endif; ?>
                <br/>
                <br/>
            </div>
        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>
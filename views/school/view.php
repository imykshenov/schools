<? include ROOT.('/views/layouts/header.php');?>


        <section>
            <div class="container">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="left-sidebar">
                            <h2>Районы</h2>
                            <div class="panel-group category-products">
                                
								<? foreach ($categories as $categoryItem): ?>
								
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
										<a href="/category/<?echo $categoryItem['district_id']?>">
											<?echo $categoryItem['district_name']?>
										</a></h4>
                                    </div>
                                </div>
								
								<?endforeach;?>
								
                               
                            </div>

                        </div>
                    </div>

                    <div class="col-sm-9 padding-right">
                        <div class="product-details"><!--product-details-->
                            <div class="row">

                                <div class="col-sm-7">
                                    <div class="product-information"><!--/product-information-->
                                     
                                        <h2><?php echo $schools['school_name'];?></h2>
                                        <p><?echo $schools['school_site']; ?></p>
                                        

                                    </div><!--/гавно---->
                                </div>
                            </div>
                            <div class="row">                                
                                <div class="col-sm-12">
                                    <h5>Описание</h5>
									<p>Директор: <? echo $schools['school_director'];?></p>
                                    <p>Контакты: <? echo $schools['school_contact'];?></p>


                                </div>
                            </div>
							
							<!--Отображение учителей школы -->
							<div class="row">                                
                                <div class="col-sm-12">
									<?php if (isset($_SESSION['user'])) {?> <!--проверяет авторизован пользователь или нет -->
                                    <h5>Учителя</h5>								
                                    <table class="bordered">
										<thead>
										<tr>
											<th>Учитель информатики</th> <!--столбец 1-->       
											<th>Номер телефона</th> <!--столбец 2-->   
											<th>Учитель математики</th> <!--столбец 3-->
											<th>Номер телефона</th> <!--столбец 4-->
											<th>Учитель физики</th> <!--столбец 5-->
											<th>Номер телефона</th> <!--столбец 6-->       									
										</tr>
										</thead>
										<tr>
											<th><? echo $schools['school_fio_math'];?></th> <!--столбец 1-->       
											<th><? echo $schools['school_fio_math_number'];?></th> <!--столбец 2-->   
											<th><? echo $schools['school_fio_inf'];?></th> <!--столбец 3-->
											<th><? echo $schools['school_fio_inf_number'];?></th> <!--столбец 4-->
											<th><? echo $schools['school_fio_phys'];?></th> <!--столбец 5-->
											<th><? echo $schools['school_fio_phys_number'];?></th> <!--столбец 6-->       
										</tr>  
									</table>
									<?} else { ?> <h5>Информация о учителях доступна только зарегестрированным пользователям</h5> <?}?>
					
                                </div>	
                            </div>
							
							
							<!--Отображение данных о школьниках -->
							<div class="row">                                
                                <div class="col-sm-12">
									<?php if (isset($_SESSION['user'])) {?> <!--проверяет авторизован пользователь или нет -->
                                    <h5>Школьники</h5>								
                                    <table class="bordered">
										<thead>
										<tr>
											<th>№</th> <!--столбец 1-->       
											<th>ФИО</th> <!--столбец 2-->   
											<th>Дата рождения</th> <!--столбец 3-->
											<th>Класс</th> <!--столбец 4-->
											<th>Экзамены</th> <!--столбец 5-->
											<th>Вузы(в порядке приоритета)</th> <!--столбец 1-->       
											<th>Номер телефона</th> <!--столбец 2-->   
											<th>Родители</th> <!--столбец 3-->
											<th>Телефон родителей</th> <!--столбец 4-->
											<th>email</th> <!--столбец 5-->											
										</tr>
										</thead>
										<?php foreach($students as $studentsList):?>
										<tr>
											<th><? echo $studentsList['id'];?></th> <!--столбец 1-->       
											<th><? echo $studentsList['fio'];?></th> <!--столбец 2-->   
											<th><? echo $studentsList['birthday'];?></th> <!--столбец 3-->
											<th><? echo $studentsList['class'];?></th> <!--столбец 4-->
											<th><? echo $studentsList['exams'];?></th> <!--столбец 5-->
											<th><? echo $studentsList['university'];?></th> <!--столбец 1-->       
											<th><? echo $studentsList['number'];?></th> <!--столбец 2-->   
											<th><? echo $studentsList['parents'];?></th> <!--столбец 3-->
											<th><? echo $studentsList['parents_number'];?></th> <!--столбец 4-->
											<th><? echo $studentsList['email'];?></th> <!--столбец 5-->
										</tr>  
										<?endforeach;?>
									</table>
									<?} else { ?> <h5>Информация об учащихся доступна только зарегестрированным пользователям</h5> <?}?>
					
                                </div>	
                            </div>
							
							
                        </div><!--/product-details-->

                    </div>
                </div>
            </div>
        </section>
        

        <br/>
        <br/>
		
		
	<? include ROOT.('/views/layouts/footer.php');?>
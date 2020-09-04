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
                        <div class="features_items"><!--features_items-->
                            <h2 class="title text-center">Школы</h2>
							
							<?php foreach($schoolList as $school):?>
							
                            <div class="col-sm-4">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="<? echo $school['preview'];?>" alt="" />
                                            <!-- <p><?echo $school['school_name']?></p> -->
                                            <p>
                                            <a href="/school/<?echo $school['school_id']?>"</a>
												<?echo $school['school_name']?>
											</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
							<?endforeach;?>

                        </div><!--features_items-->

                        
                    </div>
                </div>
            </div>
        </section>



	<? include ROOT.('/views/layouts/footer.php');?>
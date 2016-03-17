					<div id ="slider_space" class="hidden-xs">
						<div id="carousel-example-generic" class="carousel slide" data-ride="carousel" data-pause="hover">
						  <!-- Indicators -->
							<ol class="carousel-indicators">
						<!--	<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
							<li data-target="#carousel-example-generic" data-slide-to="1"></li>
							<li data-target="#carousel-example-generic" data-slide-to="2"></li>
						  -->
						 <?php
						 $no =0;
						 //ini buat indikator (yang bulet2 d slider, males buat model baru, jadi pake ini aja)
							foreach($data_slider as $slider){
								if($no==0){
									echo 
									'<li data-target="#carousel-example-generic" data-slide-to='.$no.' class=active></li>';
								}
								else{
									echo 
									'<li data-target="#carousel-example-generic" data-slide-to='.$no.'></li>';
								}
							$no++;
							}
						 ?>
							</ol>
						  <!-- Wrapper for slides -->
						  <div class="carousel-inner">
						  <?php
							$no=1;//buat indikator slider pertama aja, karena klas harus active
							foreach ($data_slider as $slider){
								//untuk item pertama
								if($no==1){
									echo 
									'<div class="item active">
										<img src='.base_url().'assets/images/slider/'.$slider['nama_media'].' alt="..." ></img>
										<div class="carousel-caption">
											<h3>'.$slider['label'].'</h3>
										</div>
									</div>';
								}
								//kalau bukan yang pertama sldernya
								else{
									echo 
									'<div class="item">
										<img src='.base_url().'assets/images/slider/'.$slider['nama_media'].' alt="..." ></img>
										<div class="carousel-caption">
											<h3>'.$slider['label'].'</h3>
										</div>
									</div>';
								}
								$no = 2;
							}
						  
						  ?>
						  
						  </div>
						 
						  <!-- Controls -->
						  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
							<span class="glyphicon glyphicon-chevron-left"></span>
						  </a>
						  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
							<span class="glyphicon glyphicon-chevron-right"></span>
						  </a>
						</div> <!-- Carousel -->
					</div><!--end of slider-->
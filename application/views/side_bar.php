
							<div id="content_right" class="col-md-3 col-xs-12">
								<div class="sub_content_right">
									<div class="title_right_content">
										<span>Kategori</span>
									</div>
									<ul>
									<?php
										foreach ($data_kategori as $kategori){
											echo '<li><a href='.site_url('artikel_kategori/'.$kategori['id_kategori'].'').'>'.$kategori['nama_kategori'].'</a></li>';						
										}
									?>
									</ul>
								</div><!--end of kategori-->
								<div class="sub_content_right">
									<div class="title_right_content">
										<span>Tautan</span>
									</div>
									<ul>
									<?php
										
										foreach ($data_tautan as $tautan){
											echo '<li><a href='.$tautan['link_tautan'].'>'.$tautan['nama_tautan'].'</a></li>';						
										}
									?>
									</ul>
								</div><!--end of tautan-->
								<div class="sub_content_right">
									<div class="title_right_content">
										<span>Download</span>
									</div>
									<ul>
									<?php									
										foreach ($data_file as $file){
											echo '<li><a target=_blank href='.site_url('download_file/'.$file['nama_file'].'').'>'.$file['judul_file'].'</a></li>';						
										}
									?>
									</ul>
								</div><!--end of Download area-->
							</div><!--end of content right-->
				<div id="header_content">
					<table>
						<tr>
							<td>
								<img src="<?php echo base_url();?>assets/admin/images/media.png"></img>
							</td>
							<td>
								<h1>Slider Manager</h1>
							</td>
						</tr>
					</table>
				</div>
				<div id="isi_content">
					<span><a href="c_add_slider"><img src="<?php echo base_url();?>assets/admin/images/add.png">Tambah</a></span>
					<table class="table table-bordered table-hover">
						<tr>
							<th>No</th>
							<th>Label Media</th>
							<th>Tampil</th>
							<th>Prioritas</th>
							<th>Aksi</th>
						</tr>
						<?php
						$no=1;
				
						foreach($data_slider as $slider){
							$nama_slider = $slider['nama_media'];
							$url = site_url('admin/c_slider/c_delete_slider');
							if($slider['tampil_media'] == 1){
								$tampil = 'Ya';
							}else{
								$tampil = 'Tidak';
							}
							
							echo 
							'<tr>
								<td>'.$no.'</td>
								<td><a target=_blank href='.site_url('assets/images/slider/'.$nama_slider.'').'>'.$slider['label'].'</a></td>
								<td>'.$tampil.'</td>
								<td>'.$slider['prioritas'].'</td>					
								<td class=aksi><!--<a href='.site_url('admin/c_slider/c_edit_slider/'.$slider['id_media'].'').'><img src='.base_url().'assets/admin/images/edit.png></a>-->
									<a href=# onclick="return delete_data(\''.$nama_slider.'\',\''.$url.'\')"> <img src='.base_url().'assets/admin/images/delete.png></a></td>
							
							</tr>';
							$no++;
						}
						
						
						?>
						
					</table>
					
				</div>
				<div id="footer_content">
					<ul class="pagination">
						<!--<'?php/*
							foreach($links as $link){
								echo '<li>'.$link.'</li>';
							}
						*/?>-->
					</ul>
				</div>
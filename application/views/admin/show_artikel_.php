				<div id="header_content">
					<table>
						<tr>
							<td>
								<img src="<?php echo base_url();?>assets/admin/images/article_manager.png"></img>
							</td>
							<td>
								<h1>Artikel Manager</h1>
							</td>
						</tr>
					</table>
				</div>
				<div id="isi_content">
					<span><a href="c_add_artikel"><img src="<?php echo base_url();?>assets/admin/images/add.png">Tambah</a></span>
					<table class="table table-bordered table-hover">
						<tr>
							<th>No</th>
							<th>Judul</th>
							<th>Kategori</th>
							<th>Pembuat</th>
							<th>Tampil</th>
							<th>Hits</th>
							<th>Tgl Insert</th>
							<th>Tgl Update</th>
							<th>Aksi</th>
						</tr>
						<?php
						$no=1;
				
						foreach($data_artikel as $artikel){
							$id = $artikel['id_artikel'];
							$url = site_url('admin/c_artikel/c_delete_artikel');
							if($artikel['tampil_artikel'] == 1){
								$tampil = 'Ya';
							}else{
								$tampil = 'Tidak';
							}
							
							echo 
							'<tr>
								<td>'.$no.'</td>
								<td>'.$artikel['judul_artikel'].'</td>
								<td>'.$artikel['nama_kategori'].'</td>
								<td>'.$artikel['nama_admin'].'</td>
								<td>'.$tampil.'</td>
								<td>'.$artikel['hits'].'</td>
								<td>'.$artikel['tgl_insert_artikel'].'</td>
								<td>'.$artikel['tgl_update_artikel'].'</td>					
								<td class=aksi><a href='.site_url('admin/c_artikel/c_edit_artikel/'.$artikel['id_artikel'].'').'><img src='.base_url().'assets/admin/images/edit.png></a>
									<a href=# onclick="return delete_data('.$id.',\''.$url.'\')"> <img src='.base_url().'assets/admin/images/delete.png></a></td>
							
							</tr>';
							$no++;
						}
						
						
						?>
						
					</table>
					
				</div>
				<div id="footer_content">
					<ul class="pagination">
						<?php
							foreach($links as $link){
								echo '<li>'.$link.'</li>';
							}
						?>
					</ul>
				</div>
				<div id="header_content">
					<table>
						<tr>
							<td>
								<img src="<?php echo base_url();?>assets/admin/images/link_manager.png"></img>
							</td>
							<td>
								<h1>Tautan Manager</h1>
							</td>
						</tr>
					</table>
				</div>
				<div id="isi_content">
					<span><a href="c_add_tautan"><img src="<?php echo base_url();?>assets/admin/images/add.png">Tambah</a></span>
					<table class="table table-hover table-bordered">
						<tr>
							<th>No</th>
							<th>Nama</th>
							<th>Link</th>
							<th>Prioritas</th>
							<th>Tampil</th>
							<th>Aksi</th>
						</tr>
						<?php
						$no=1;
						
						foreach($data_tautan as $tautan){
							$id = $tautan['id_tautan'];
							$url = site_url('admin/c_tautan/c_delete_tautan');
							if($tautan['tampil_tautan'] == 1){
								$tampil = 'Ya';
							}else{
								$tampil = 'Tidak';
							}
							
							echo 
							'<tr>
								<td>'.$no.'</td>
								<td>'.$tautan['nama_tautan'].'</td>
								<td>'.$tautan['link_tautan'].'</td>
								<td>'.$tautan['prioritas'].'</td>
								<td>'.$tampil.'</td>
								<td class=aksi><a href='.site_url('admin/c_tautan/c_edit_tautan/'.$tautan['id_tautan'].'').'><img src='.base_url().'assets/admin/images/edit.png></a>
									<a href=# onclick="return delete_data('.$id.',\''.$url.'\')"> <img src='.base_url().'assets/admin/images/delete.png></a></td>
							
							</tr>';
							$no++;
						}
						
						
						?>
					</table>
				</div>
				<div id="footer_content">
				
				</div>
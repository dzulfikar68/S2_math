				<div id="header_content">
					<table>
						<tr>
							<td>
								<img src="<?php echo base_url();?>assets/admin/images/user_manager.png"></img>
							</td>
							<td>
								<h1>Admin Manager</h1>
							</td>
						</tr>
					</table>
				</div>
				<div id="isi_content">
					<span><a href="c_add_admin"><img src="<?php echo base_url();?>assets/admin/images/add.png">Tambah</a></span>
					<table class="table table-hover table-bordered">
						<tr>
							<th>No</th>
							<th>Nama</th>
							<th>Username</th>
							<th>Login Terakhir</th>
							<th>Aksi</th>
						</tr>
						<?php
						$no=1;
						
						foreach($data_admin as $admin){
							$id = $admin['id_admin'];
							$url = site_url('admin/c_admin/c_delete_admin');
							echo 
							'<tr>
								<td>'.$no.'</td>
								<td>'.$admin['nama_admin'].'</td>
								<td>'.$admin['username'].'</td>
								<td>'.$admin['tgl_last_visit'].'</td>
								<td class=aksi><a href='.site_url('admin/c_admin/c_edit_admin/'.$admin['id_admin'].'').'><img src='.base_url().'assets/admin/images/edit.png></a>
									<a href=# onclick="return delete_data('.$id.',\''.$url.'\')"> <img src='.base_url().'assets/admin/images/delete.png></a></td>
							
							</tr>';
							$no++;
						}
						
						
						?>
					</table>
				</div>
				<div id="footer_content">
				
				</div>
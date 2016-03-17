				<div id="header_content">
					<table>
						<tr>
							<td>
								<img src="<?php echo base_url();?>assets/admin/images/upload.png"></img>
							</td>
							<td>
								<h1>File Manager</h1>
							</td>
						</tr>
					</table>
				</div>
				<div id="isi_content">
					<span><a href="c_add_file"><img src="<?php echo base_url();?>assets/admin/images/add.png">Tambah</a></span>
					<table class="table table-bordered table-hover">
						<tr>
							<th>No</th>
							<th>Nama File</th>
							<th>Tampil</th>
							<th>Prioritas</th>
							<th>Hits</th>
							<th>Tgl Insert</th>
							<th>Tgl Update</th>
							<th>Aksi</th>
						</tr>
						<?php
						$no=1;
				
						foreach($data_file as $file){
							$nama_file = $file['nama_file'];
							$url = site_url('admin/c_upload/c_delete_file');
							if($file['tampil_file'] == 1){
								$tampil = 'Ya';
							}else{
								$tampil = 'Tidak';
							}
							
							echo 
							'<tr>
								<td>'.$no.'</td>
								<td><a target=_blank href='.site_url('assets/uploads/'.$nama_file.'').'>'.$file['judul_file'].'</a></td>
								<td>'.$tampil.'</td>
								<td>'.$file['prioritas'].'</td>
								<td>'.$file['hits'].'</td>
								<td>'.$file['tgl_insert_file'].'</td>
								<td>'.$file['tgl_update_file'].'</td>					
								<td class=aksi><a href='.site_url('admin/c_upload/c_edit_file/'.$file['id_file'].'').'><img src='.base_url().'assets/admin/images/edit.png></a>
									<a href=# onclick="return delete_data(\''.$nama_file.'\',\''.$url.'\')"> <img src='.base_url().'assets/admin/images/delete.png></a></td>
							
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
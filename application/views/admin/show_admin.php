						<div id="page_title" class="col-md-12">
							<h1>Manajer Admin</h1>
						</div> 
						<div id="button" class=col-md-12>
								<a class="btn btn-primary" href="c_add_admin" role="button">Tambah Admin</a>
						</div>
						<div class=col-md-12>
						<?php if($message!=''){
							echo '<div class="alert alert-success">'.$message.'</div>';
						}?>
						</div>
						<div id="page_content" class="container-fluid">	
							<table class="table table-bordered table-hover">
								<thead>
									<th>No</th>
									<th>Nama Admin</th>
									<th>Username</th>
									<th>Login Terakhir</th>
								</thead>
								<?php
								$no=1;

								foreach($data_admin as $admin){
									$id = $admin['id_admin'];
									$url = site_url('admin/c_admin/c_delete_admin');
									echo 
									'<tr>
										<td>'.$no.'</td>
										<td><div class="item">'.$admin['nama_admin'].'</div><span class="action">											
											<a href='.site_url('admin/c_admin/c_edit_admin/'.$admin['id_admin'].'').'>Ubah </a>';
											
											if(($admin['id_admin']!=24) AND ($admin['id_admin']!=$this->session->userdata('id_admin'))){
												echo '|<a href=# onclick="return delete_data('.$id.',\''.$url.'\')" class="delete"> Hapus</a></span>';
											}
											
										echo '	
										</td>
										<td>'.$admin['username'].'</td>
										<td>'.$admin['tgl_last_visit'].'</td>
									</tr>';
									$no++;
								}


								?>

							</table>
							<?php
								if($data_admin==null){
									echo '<p  align="center">Data kosong<p>';
								}
							?>

						</div>
						<div id="footer_content">
							
						</div>
						
			


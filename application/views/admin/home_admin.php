				<div id="content_left">
					<div id="cpanel">
						<table>
							<tr>
								<td>
									<div class="icon">
										<a href="<?php echo site_url('admin/c_artikel/c_add_artikel');?>">
											<img src="<?php echo base_url();?>assets/admin/images/add_article.png"></img>
											<span>Tambah Artikel</span>
										</a>
									</div>
								</td>
								<td>
									<div class="icon">
										<a href="<?php echo site_url('admin/c_artikel/show_artikel');?>">
											<img src="<?php echo base_url();?>assets/admin/images/article_manager.png"></img>
											<span>Artikel Manager</span>
										</a>
									</div>
								</td>
								<td>
									<div class="icon">
										<a href="<?php echo site_url('admin/c_admin/show_admin');?>">
											<img src="<?php echo base_url();?>assets/admin/images/user_manager.png"></img>
											<span>Admin Manager</span>
										</a>
									</div>
								</td>	
								<td>
									<div class="icon">
										<a href="<?php echo site_url('admin/c_upload/show_file');?>">
											<img src="<?php echo base_url();?>assets/admin/images/upload.png"></img>
											<span>Upload File</span>
										</a>
									</div>
								</td>						
							</tr>
							<tr>							
								<td>
									<div class="icon">
										<a href="<?php echo site_url('admin/c_tautan/show_tautan');?>">
											<img src="<?php echo base_url();?>assets/admin/images/link_manager.png"></img>
											<span>Tautan Manager</span>
										</a>
									</div>
								</td>
								<td>
									<div class="icon">
										<a href="<?php echo site_url('admin/c_slider/show_slider');?>">
											<img src="<?php echo base_url();?>assets/admin/images/media.png"></img>
											<span>Slider Manager</span>
										</a>
									</div>
								</td>
							</tr>
						</table>
					</div>
				</div>
				<div id="content_right">
					<div id="log_panel">
						<table class="table table-bordered table-hover">
							<tr>
								<th>Username</th>
								<th>Last Visit</th>
							</tr>
							<?php
								foreach($data_admin as $admin){
									echo 
									'<tr>
										<td>'.$admin['username'].'</td>
										<td>'.$admin['tgl_last_visit'].'</td>
									</tr>';
								}
							?>
						</table>
					</div>
				</div>
			
								<?php
									foreach ($data_artikel as $artikel){
										$text = substr((strip_tags($artikel['isi_artikel'])),0,500);
										$format_date = date('d F Y', strtotime($artikel['tgl_insert_artikel']));
										echo '<div class=news>';
										echo '<h3><a href='.site_url('artikel/'.$artikel['id_artikel'].'/'.$artikel['slug'].'').'>'.$artikel['judul_artikel'].'</a></h3>';
										echo '<div class=news_date><span>oleh '.$artikel['nama_admin'].', '.$format_date.' ('.$artikel['nama_kategori'].')</span></div>';
										echo '<div class=text>'.$text;
										if(strlen($artikel['isi_artikel'])>500){
											echo '<a href='.site_url('artikel/'.$artikel['id_artikel'].'/'.$artikel['slug'].'').'> Read more...</a>';
											
										}
										echo'	
										</div>
										</div>';
									
									}
								?>
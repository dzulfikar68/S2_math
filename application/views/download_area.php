		<div class="_wrapper">
			<h3 class="_title">Download Area</h3><hr>
			<div></br>
				<ul style="list-style-type: none;">
				<?php
					foreach ($data_file_all as $file){
						echo '<li><img src='.site_url('assets/images/file.png').'><a target=_blank href='.site_url('download_file/'.$file['nama_file'].'').'>'.$file['judul_file'].'</a></li><br>';																
					}						
				?>
				</ul>
			</div>
		</div>
<?php
	
		$format_date = date('d F Y', strtotime($data_artikel['tgl_insert_artikel']));
	
		echo '<div class=article_wrapper>';
		echo '<h3 class=article_title>'.$data_artikel['judul_artikel'].'</h3><hr>';
		echo '<div class=news_date><span>oleh '.$data_artikel['nama_admin'].', '.$format_date.' ('.$data_artikel['nama_kategori'].')</span></div>';
		echo '<div class=article></br>';
		echo $data_artikel['isi_artikel'];
		echo '</div></div>';
					
							
?>
						
						
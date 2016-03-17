<div id="page_title" class="col-md-12">
	<h1>Preview Artikel</h1>
</div>
<div id="page_content" class="container-fluid">	
	<div class="row">
		<div id="article_title" class="col-md-12">
			<h3><?php echo $data_artikel['judul_artikel']; ?></h3>
		</div>
		<?php $format_date = date('d F Y', strtotime($data_artikel['tgl_insert_artikel']));?>
		<div class="news_date" ><span class="col-md-12">oleh <?php echo $data_artikel['nama_admin'].' ,'.$format_date.'  '.$data_artikel['nama_kategori'];?></span></div>
		<div class="article col-md-10"></br>
			<?php echo $data_artikel['isi_artikel'];?>
		</div>
	</div>
	<div id="button" class=col-md-12>
		<a class="btn btn-primary" href="<?php echo site_url().'admin/c_artikel/c_edit_artikel/'.$data_artikel['id_artikel']?>" role="button">Ubah Artikel</a>
		<button type="button" class="btn btn-primary" onclick="back()">Kembali</button></td>
	</div>
		<script>
			function back(){
				 document.location.href ="<?php echo site_url('admin/c_artikel/show_artikel')?>";
			}
		</script>
</div>


<div id="page_title" class="col-md-12">
	<h1>Manajer  Artikel</h1>
</div>
<div id="button" class=col-md-12>
		<a class="btn btn-primary" href="c_add_artikel" role="button">Tambah Artikel</a>
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
			<th>Judul Artikel</th>
			<th>Kategori</th>
			<th>Pembuat</th>
			<th>Tampil</th>
			<th>Hits</th>
			<th>Tgl Insert</th>
			<th>Tgl Update</th>
		</thead>
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
				
				<td><div class="item">'.$artikel['judul_artikel'].'</div><span class="action"><a href='.site_url('admin/c_artikel/c_preview_artikel/'.$id.'').'>Pratinjau</a> | <a href='.site_url('admin/c_artikel/c_edit_artikel/'.$id.'').'>Ubah</a> | <a href=# onclick="return delete_data('.$id.',\''.$url.'\')" class="delete">Hapus</a></span></td>
				<td>'.$artikel['nama_kategori'].'</td>
				<td>'.$artikel['nama_admin'].'</td>
				<td>'.$tampil.'</td>
				<td>'.$artikel['hits'].'</td>
				<td>'.$artikel['tgl_insert_artikel'].'</td>
				<td>'.$artikel['tgl_update_artikel'].'</td>					
			</tr>';
			$no++;
		}


		?>

	</table>
	<?php
		if($data_artikel==null){
			echo '<p  align="center">Data kosong<p>';
		}
	?>

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




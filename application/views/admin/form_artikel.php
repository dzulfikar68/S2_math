<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/CLEditor1_4_5/jquery.cleditor.css" />
<script type="text/javascript" src="<?php echo base_url();?>assets/CLEditor1_4_5/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/CLEditor1_4_5/jquery.cleditor.min.js"></script>
<script type="text/javascript">
	$(document).ready(function () { $("#input").cleditor(); });
</script>
<?php if(!isset($data_artikel)){
		$action='c_add_artikel';
		$title = 'Tambah Artikel';
	}else{
		$action='c_edit_artikel/'.$data_artikel['id_artikel'];
		$title = 'Ubah Artikel';
	} 
?>
<div id="page_title" class="col-md-12">
	<h1><?php echo $title;?></h1>
</div>

<div id="page_content" class="container-fluid">	
	<?php $attributes=array('class'=>'form-horizontal');echo form_open('admin/c_artikel/'.$action.'',$attributes); ?>
		<div id="form" class="row">
			<div class="form-group">
				<label for="judul" class="col-sm-2 control-label">Judul Artikel*</label>
				<div class="col-sm-4">
					<input type="text" class="form-control" id="judul" name="judul" placeholder="maks 100 karaker" value="<?php if(isset($data_artikel)){echo $data_artikel['judul_artikel'];} ?>" required /><?php echo form_error('judul'); ?>
				</div>
			</div>
			
			<div class="form-group">
				<label for="tampil_artikel" class="col-sm-2 control-label">Tampilkan</label>
				<div class="col-sm-4">
					<label class="radio-inline">
					  <input type="radio" name="tampil_artikel" id="tampil_artikel" value="0" <?php if(isset($data_artikel)){if($data_artikel['tampil_artikel']==0) echo 'checked';}?>> Tidak
					</label>
					<label class="radio-inline">
					  <input type="radio" name="tampil_artikel" id="tampil_artikel" value="1" <?php if(isset($data_artikel)){if($data_artikel['tampil_artikel']==1) echo 'checked';}else{echo 'checked';}?>> Ya
					</label>
				</div>
			</div>
			
			<div class="form-group">
				<label for="judul" class="col-sm-2 control-label">Kategori</label>
				<div class="col-sm-4">
					<select class="form-control" name="kategori" id="kategori">
						<option value="1" <?php if(isset($data_artikel)){if($data_artikel['id_kategori']==1) echo 'selected';}else{echo 'selected';}?>>Akademik</option>
						<option value="2" <?php if(isset($data_artikel)){if($data_artikel['id_kategori']==2) echo 'selected';}?>>Non Akademik</option>
					</select>
				</div>
			</div>
			
			
			<div class="form-group">
				<label for="judul" class="col-sm-2 control-label">Artikel*</label>
				<div class="col-sm-8">
					<textarea id="input" name="isi_artikel"><?php if(isset($data_artikel)){echo $data_artikel['isi_artikel'];} ?></textarea>
				<?php echo form_error('isi_artikel'); ?>
				</div>
			</div>
			
		
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-4">
					<button type="submit" class="btn btn-primary"><?php if(isset($data_artikel)){echo 'Simpan';}else{echo 'Tambah';} ?></button>
					<button type="button" class="btn btn-primary" onclick="back()">Kembali</button></td>
				</div>
			</div>
		</div>
	<?php echo form_close(); ?>
		<script>
			function back(){
				 document.location.href ="<?php echo site_url('admin/c_artikel/show_artikel')?>";
			}
		</script>
</div>


function delete_data(id,url){
	// tampilkan dialog konfirmasi
	var vid		= id;
	var vurl	= url;
	var answer  = confirm("Apakah anda ingin menghapus data ini?");
	// ketika ditekan tombol cancel
	if (answer==false){
		return false;
	} 
	$.ajax({
		type:"POST",
		url : vurl, 
		data :{id: vid} ,
		success :function(data) {
			if (data=="oke"){
				alert('Data Berhasil dihapus');
				location.reload();
				
			}else{
				alert('Gagal!');
			}
		
		}});
	
	return false;
}
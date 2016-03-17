						<div id="page_title" class="col-md-12">
							<h1>Dashboard</h1>
						</div>
						<div id="page_content" class="container-fluid">	
							<div class="row">
								<div id="article" class="col-md-4">
									<h4>Jumlah Artikel 50 artikel</h4>
									<div class="row"> 
										<div id="academic" class="col-md-5">
											<div class="title">
												<h5>
													Artikel Akademik
												</h5>
											</div>
											<div id="chart-academic">
												<canvas id="myChart-academic" width="200" height="100"></canvas>
											</div>
										</div>
										<div id="non_academic" class="col-md-5">
											<div class="title">
												<h5>
													Artikel Non-Akademik
												</h5>
											</div>
											<div id="chart-non-academic">
												<canvas id="myChart-non-academic" width="200" height="100"></canvas>
											</div>
										</div>
									</div>
									<div id="dasboard_add_article">
										<a class="btn btn-primary pull-right" href="<?php echo site_url().'admin/c_artikel/c_add_artikel';?>" role="button">Tambah Artikel</a>
										
									</div>
								</div>
								<div id="user" class="col-md-4 pull-right">
									<h4>Login history admin</h4>
									<table class="table table-bordered table-hover">
										<tr>
											<th>Username</th>
											<th>Last Visit</th>
										</tr>
										<tr>
											<td>Fajar</td>
											<td>12 Januari 2014</td>
										</tr>
										<tr>
											<td>Fajar</td>
											<td>12 Januari 2014</td>
										</tr>
									</table>
									<button class="btn btn-primary pull-right" type="submit">Kelola</button>
								</div>
							</div>
						
						</div>

<script>
				var ctx = document.getElementById("myChart-academic").getContext("2d");
				var data = [
					{
							value: 300,
							color:"#F7464A",
							highlight: "#FF5A5E",
							label: "Red"
					},
					{
							value: 50,
							color: "#46BFBD",
							highlight: "#5AD3D1",
							label: "Green"
					},
					{
							value: 100,
							color: "#FDB45C",
							highlight: "#FFC870",
							label: "Yellow"
					}
			];
			var myPieChart = new Chart(ctx).Pie(data);
				
			var ctx2 = document.getElementById("myChart-non-academic").getContext("2d");
			var data2 = [
				{
							value: 300,
							color:"#F7464A",
							highlight: "#FF5A5E",
							label: "Red"
				},
				{
							value: 50,
							color: "#46BFBD",
							highlight: "#5AD3D1",
							label: "Green"
				},
				{
							value: 100,
							color: "#FDB45C",
							highlight: "#FFC870",
							label: "Yellow"
				}
			];
			var myPieChart = new Chart(ctx2).Pie(data2);	
			</script>
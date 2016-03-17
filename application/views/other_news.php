								<div class="other_news">
									Berita terbaru lain :
									<ul>
									<?php
										foreach($data_artikel_terbaru as $artikel_terbaru)
										echo '<li><a href='.site_url('artikel/'.$artikel_terbaru['id_artikel'].'/'.$artikel_terbaru['slug'].'').'>'.$artikel_terbaru['judul_artikel'].'</a></li>';
									?>			
									</ul>
								</div>

		<!-- CONTAIN -->
		<div class="row-fluid" id="contain">
			<?php
			if(!empty($p)): include "frontend/page.php";
			elseif(!empty($sl)): include "frontend/slide.php";
			else:
			?>
				<div class="span12" id="containt">			
					<div class="row-fluid" id="content">
						<ul class="postings">
							<?php
							$sqlnews="select id_page,tgl,judul,deskripsi from page where parent='8' and status='Publish'";
							if(!empty($key)): $sqlnews.=" and judul like '%$key%' or parent='8' and status='Publish' and isi like '%$key%' order by id_page desc";
							else: $sqlnews.=" order by id_page desc limit 2";
							endif;
											
							$qnews=mysqli_query($db,$sqlnews);
							echo mysqli_error($db);
							while(list($idn,$tgln,$jdln,$deskn)=mysqli_fetch_row($qnews)):
							?>
							<li class="span6 posting" style="padding: 5px; min-height: 220px; max-height: 160px; display: block; overflow: auto;">
								<code><?php echo $tgln; ?></code><br>
								<h4><a href="homeuser.php?p=<?php echo $idn; ?>"><?php echo $jdln; ?></a></h4>
								<?php echo $deskn; ?>
								<p><a href="homeuser.php?p=<?php echo $idn; ?>" class="btn btn-inverse">Readmore &raquo;</a></p>
													<a href="app/lainnya/berita.php">Berita Lainnya...</a>
							</li>
							<?php endwhile; ?>
							
						</ul>
										
					</div>
				</div>
				<?php endif; ?>
		</div>
		<!-- END OF CONTAIN -->
        
		
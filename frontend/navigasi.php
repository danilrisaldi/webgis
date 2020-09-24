
									
					
                    
					<?php 
					if($_SESSION['sesirole']=="admin"):
					?>
                    <li><a href="aplikasi.php?p=oopwnohfowjfw">Topomini</a></li>
                    <li><a href="aplikasi.php?p=xbntt09i9i9jcchh">Peta</a></li>
					<li><a href="aplikasi.php?p=shp">Input Data</a></li>               
                    
                    <?php 
					elseif($_SESSION['sesirole']=="user"):
					header("location: homeuser.php");
					?>
                    
                    <?php
					    /*$cek_mhs=mysqli_query($db,"select MhswID from responden where MhswID='$_SESSION[username]'");
						list($MhswID_Responden)=mysqli_fetch_array($cek_mhs);
						echo mysqli_error($db);
						
						if(mysqli_num_rows($cek_mhs)>0):*/
					?>
                    
                 
                    
                    
					<?php
					else:
						echo "Anda Belum Login Secara Resmi";
					endif; 
					//Untuk Seluruh Kondisi
					?>
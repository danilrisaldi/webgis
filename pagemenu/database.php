<div class="span12" id="containt">
<div class="row-fluid" id="bottom-content">

&nbsp;&nbsp;&nbsp;<a class="btn btn-primary" href="?p=jifneinineingoefiee"><i class="fa fa-road"></i> Database Jalan</a>
&nbsp;&nbsp;&nbsp;<a class="btn btn-primary" href="?p=jifneinijhbvfuywfdw"><i class="fa fa-archway"></i> Database Jembatan</a>
<hr>

<table class="table table-striped table-hover">
    <tbody>
        <tr>
            <td width="30%">
            <button type="button" class="btn btn-success" id="btn_jalanKc" style="width: 100%;height: 50px;"><i class="fa fa-road"></i> Peta Jaringan Jalan</button>
            </td>
            <td width="70%">
                <div class="list-group" id="jalanKc" style="display: none; ">
                <?php
					$qpage=mysqli_query($db,"select * from kecamatan where tipe='jalan' ");
					while($row=mysqli_fetch_row($qpage)){
                        // print_r($row);
                        echo '<a href="'.$row['3'].'&nmkcjln='.$row['2'].'" class="list-group-item">'.$row['2'].'</a>';
                    }
				?>
                </div>
            </td>
            <script>
                $('#btn_jalanKc').on('click', function () {
                    $( "#jalanKc" ).toggle();
                });
            </script>
        </tr>
        <tr>
            <td>
            <button type="button" class="btn btn-success" id="btn_jalanJembatan" style="width: 100%;height: 50px;"><i class="fa fa-archway"></i> Peta Jaringan Jembatan</button>
            </td>
            <td>
                <div class="list-group" id="jalanJembatan" style="display: none;">
                <?php
					$qpage=mysqli_query($db,"select * from kecamatan where tipe='jembatan' ");
					while($row=mysqli_fetch_row($qpage)){
                        // print_r($row);
                        echo '<a href="'.$row['3'].'&nmkcjb='.$row['2'].'" class="list-group-item">'.$row['2'].'</a>';
                    }
				?>
                </div>
            </td>
            <script>
                $('#btn_jalanJembatan').on('click', function () {
                    $( "#jalanJembatan" ).toggle();
                });
            </script>
        </tr>
        
    </tbody>
</table>


</div>
</div>
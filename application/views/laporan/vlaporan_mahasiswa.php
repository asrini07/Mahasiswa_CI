<script>
	var mywindow;
    function openCenteredWindow(url,width,height) {
        var left = parseInt((screen.availWidth/2) - (width/2));
        var top = parseInt((screen.availHeight/2) - (height/2));
        var windowFeatures = "width=" + width + ",height=" + height +
                             ",status,resizable=no,left=" + left + ",top=" + top +
                             ",screenX=" + left + ",screenY=" + top + ",scrollbars";
        mywindow = window.open(url, "subWind", windowFeatures);
    }
	$(document).ready(function() {
		$(".excel").click(function(){
            window.location = "<?php echo site_url('laporan/export_laporanmahasiswa');?>";
        });
        $(".pdf").click(function(){
			openCenteredWindow("<?php echo site_url('laporan/cetakpdf_laporanmahasiswa');?>",800,400);
			return false;
		});
        
	});
</script>
<div class="row">
	<section class="invoice">
		<div class="row">
            <div class="col-xs-9">
				<h2 class="page-header">
					<i class="fa fa-file-pdf-o"></i> LAPORAN IDENTITAS MAHASISWA
              	</h2>
            </div>
            <div class="col-xs-3">
            	<button class="excel btn btn-success"><i class="fa fa-file-excel-o"></i>&nbsp;&nbsp;Export Excel</button> 
            	<button class="pdf btn btn-danger"><i class="fa fa-file-pdf-o"></i>&nbsp;&nbsp;PDF</button>
            </div>
		</div>
		<div class="table-responsive">
			<table id="myTable" class="table table-bordered table-striped">
				<thead>
					<tr class="bg-gray">
						<th>No</th>	
						<th>NIM</th>
						<th>NAMA</th>
						<th>JK</th>	
						<th>TTL</th>
						<th>Alamat</th>	
						<th>Jurusan</th>
						<th>Email</th>	
					</tr>
					
				</thead>
				<tbody>
					<?php
						$i=0;
						foreach ($row->result() as $data) {
							$i++;
							echo "
								<tr>
									<td>".$i."</td>
									<td>".$data->nim."</td>
									<td>".$data->nama."</td>
									<td>".$data->jk."</td>
									<td>".$data->tempat_lahir.", ".date("d-m-Y",strtotime($data->tanggal_lahir))."</td>
									<td>".$data->alamat."</td>
									<td>".$data->jurusan."</td>
									<td>".$data->email."</td>
								</tr>
							";
						}
					?>					
				</tbody>
			</table>
		</div>
		
	</section>
</div>
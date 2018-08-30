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
		$("select[name='semester']").change(function(){
            var semester = $(this).val();
            var thn_akademik=$("select[name='thn_akademik']").val();
			var kode_mk=$("select[name='kode_mk']").val();
            window.location = "<?php echo site_url('laporan/laporannilai')?>/"+semester+"/"+thn_akademik+"/"+kode_mk;
            return false;
        });
        $("select[name='thn_akademik']").change(function(){
            var thn_akademik = $(this).val();
            var semester=$("select[name='semester']").val();
			var kode_mk=$("select[name='kode_mk']").val();
            window.location = "<?php echo site_url('laporan/laporannilai')?>/"+semester+"/"+thn_akademik+"/"+kode_mk;
            return false;
        });
        $("select[name='kode_mk']").change(function(){
            var kode_mk = $(this).val();
            var thn_akademik=$("select[name='thn_akademik']").val();
			var semester=$("select[name='semester']").val();
            window.location = "<?php echo site_url('laporan/laporannilai')?>/"+semester+"/"+thn_akademik+"/"+kode_mk;
            return false;
        });
		$(".excel").click(function(){
			var semester=$("select[name='semester']").val();
			var thn_akademik=$("select[name='thn_akademik']").val();
			var kode_mk=$("select[name='kode_mk']").val();
            window.location = "<?php echo site_url('laporan/export_laporannilai');?>/"+semester+"/"+thn_akademik+"/"+kode_mk;
        });
        $(".pdf").click(function(){
        	var semester=$("select[name='semester']").val();
			var thn_akademik=$("select[name='thn_akademik']").val();
			var kode_mk=$("select[name='kode_mk']").val();
			openCenteredWindow("<?php echo site_url('laporan/cetakpdf_laporannilai');?>/"+semester+"/"+thn_akademik+"/"+kode_mk,800,400);
			return false;
		});
	});
</script>
<div class="row">
	<section class="invoice">
		<div class="row">
			<div class="col-sm-6">
				<div class="form-horizontal">
					<div class="form-group">
						<label class="col-sm-2 control-label">Semester</label>
						<div class="col-sm-10">
							<select name="semester" class="form-control">
								<option value="all">----All----</option>
								<?php
			                        for ($i=1; $i <=17 ; $i++) { 
			                        	echo "<option value='".$i."' ".($semester==$i ? "selected" : "").">".$i."</option>";
			                        }
			                    ?>
							</select>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="form-horizontal">
					<div class="form-group">
						<label class="col-sm-2 control-label">Tahun Akademik</label>
						<div class="col-sm-10">
							<select name="thn_akademik" class="form-control">
								<option value="all">----All----</option>
								<?php
			                        for ($i=2014; $i <=2020 ; $i++) { 
			                        	echo "<option value='".$i."' ".($thn_akademik==$i ? "selected" : "").">".$i."</option>";
			                        }
			                    ?>
							</select>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="form-horizontal">
					<div class="form-group">
						<label class="col-sm-2 control-label">Matakuliah</label>
						<div class="col-sm-10">
							<select name="kode_mk" class="form-control">
								<option value="all">----All----</option>
								<?php
			                        foreach ($row->result() as $row) {
			                        	echo "<option value='".$row->kode_mk."' ".($kode_mk==$row->kode_mk ? "selected" : "").">".$row->nama_mk."</option>";
			                        }
			                    ?>
							</select>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-6">
				<button class="excel btn btn-success"><i class="fa fa-file-excel-o"></i>&nbsp;&nbsp;Export Excel</button>
				<button class="pdf btn btn-danger"><i class="fa fa-file-pdf-o"></i>&nbsp;&nbsp;PDF</button>
			</div>
		</div>
	</section>
	<section class="invoice">
		<div class="row">
            <div class="col-xs-12">
				<h2 class="page-header">
					<i class="fa fa-file-pdf-o"></i> LAPORAN NILAI
              	</h2>
            </div>
		</div>
		<div class="table-responsive">
			<table id="myTable" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>NO</th>
						<th>NIM</th>
						<th>NAMA</th>
						<th>MATAKULIAH</th>
						<th>SEMESTER</th>
						<th>TAHUN AKADEMIK</th>
						<th>NILAI</th>
					</tr>
                    
				</thead>
				<tbody>
					<?php
						$i=0;
						foreach ($row1->result() as $data) {
							$i++;
							echo "<tr>
								<td>".$i."</td>
								<td>".$data->nim."</td>
								<td>".$data->nama."</td>
								<td>".$data->nama_mk."</td>
								<td>".$data->semester."</td>
								<td>".$data->thn_akademik."</td>
								<td>".$data->nilai."</td>
							</tr>";
						}
					?>
				</tbody>
			</table>
		</div>
	</section>
</div>
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
		$('#myTable').fixedHeaderTable({ height: '450', altClass: 'odd', footer: true});
        $("table tr#data:first").addClass("bg-gray");
        $("table tr#data ").click(function(){
            $("table tr#data ").removeClass("bg-gray");
            $(this).addClass("bg-gray");
        });
		$(".simpan").click(function(){
			var id= $(".bg-gray").attr("href");
			window.location="<?php echo site_url('nilai/formnilai');?>/"+id;
			return false;
		});
		$(".cetak").click(function(){
			var id= $(".bg-gray").attr("href");
			openCenteredWindow("<?php echo site_url('nilai/cetakkhs');?>/"+id,800,400);
			//window.location="<?php echo site_url('nilai/cetakkhs');?>/"+id;
			return false;
		});
		$("#myTable tr").dblclick(function(){
			$(".ubah").click();
			return false;
		});
		$(".hapus").click(function(){
			$(".modal").show();
		});
		$(".tidak").click(function(){
			$(".modal").hide();
		});
		$(".ya").click(function(){
			var id=$(".bg-gray").attr("href");
			window.location="<?php echo site_url('nilai/hapusnilai');?>/"+id;
		});
		$(".reset").click(function(){
			window.location="<?php echo site_url('nilai');?>";
		});
	});
</script>
<?php
	if($this->session->flashdata('message')){
		$pesan=explode('-', $this->session->flashdata('message'));
		echo "<div class='alert alert-".$pesan[0]."' alert-dismissable>
		<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
		<b>".$pesan[1]."</b>
		</div>";
	}
?>
<div class='modal'>
	<div class='modal-dialog'>
		<div class='modal-content'>
			<div class="modal-header bg-orange"><h4 class='modal-title'><i class="icon fa fa-warning"></i>&nbsp;&nbsp;NOTIFICATION</h4></div>
			<div class='modal-body'>Yakin akan menghapus data ?</div>
			<div class='modal-footer'>
				<button class="ya btn btn-sm btn-danger">Ya</button>
				<button class="tidak btn btn-sm btn-success">Tidak</button>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="box box-primary">
			<?php echo form_open('nilai',array("id"=>"formsubmit"));?>
			<div class="box-header with-border">
				<div class="input-group">
                    <div class="input-group-addon">
                        Cari
                    </div>
					<input name="cari" type="text" value='<?php echo $cari;?>' class="form-control">
			
					<span class="input-group-btn">
						<button type="button" class="reset btn btn-md btn-info">Reset</button>
					</span>
				</div>
			</div>
			<?php echo form_close(); ?>
			<div class="box-body">
				<table id="myTable" class="table table-bordered table-hover">
					<thead>
						<tr class="bg-navy">
	                        <th width='15px'>No</th>
	                        <th width='250px'>NIM</th>
	                        <th>Nama Mahasiswa</th>
	                        <th width='250px'>Jenis Kelamin</th>
	                        <th width='250px'>Jurusan</th>
	                    </tr>
					</thead>
					<tbody>
						<?php
							$i = 0;
		                    foreach ($row->result() as $row){
		                        $i++;
		                        echo "<tr id='data' href='".$row->nim."'>
		        						 <td class='text-right'>".$i."</td>
		                                 <td>".$row->nim."</td>
		                                 <td>".$row->nama."</td>
		                                 <td>".$row->jk."</td>
		                                 <td>".$row->jurusan."</td>
		                        </tr>";
		                    }
		                    for ($n=0;$n<=(30-$i);$i++){
		                    	echo 
		                    		"<tr>
		                    			<td>&nbsp;</td>
		                    			<td>&nbsp;</td>
		                    			<td>&nbsp;</td>
		                    			<td>&nbsp;</td>
		                    			<td>&nbsp;</td>
		                    		</tr>";
		                    }
						?>
					</tbody>
				</table>
			</div>
			<div class="box-footer">
				<div class="btn-group pull-right">
                    <button class="simpan btn btn-primary"><i class="fa  fa-plus"></i> Tambah Nilai</button>
                    <button class="cetak btn btn-success"><i class="fa fa-print"></i> Cetak KHS</button>
                    <!-- <button class="hapus btn btn-danger" ><i class="fa  fa-times"></i></button> -->
				</div>
			</div>
		</div>
	</div>
</div>


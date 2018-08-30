<script>
	$(document).ready(function() {
		$('#myTable').fixedHeaderTable({ height: '450', altClass: 'odd', footer: true});
        $("table tr#data:first").addClass("bg-gray");
        $("table tr#data ").click(function(){
            $("table tr#data ").removeClass("bg-gray");
            $(this).addClass("bg-gray");
        });
		$(".simpan").click(function(){
			window.location="<?php echo site_url('matakuliah/formmatakuliah');?>";
			return false;
		});
		$(".ubah").click(function(){
			var id= $(".bg-gray").attr("href");
			window.location="<?php echo site_url('matakuliah/formmatakuliah');?>/"+id;
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
			window.location="<?php echo site_url('matakuliah/hapusmatakuliah');?>/"+id;
		});
		$(".reset").click(function(){
			window.location="<?php echo site_url('matakuliah');?>";
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
			<?php echo form_open('matakuliah',array("id"=>"formsubmit"));?>
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
	                        <th width='250px'>Kode Matakuliah</th>
	                        <th>Nama Matakuliah</th>
	                        <th width='250px'>SKS</th>
	                    </tr>
					</thead>
					<tbody>
						<?php
							$i = 0;
		                    foreach ($row->result() as $row){
		                        $i++;
		                        echo "<tr id='data' href='".$row->kode_mk."'>
		        						 <td class='text-right'>".$i."</td>
		                                 <td>".$row->kode_mk."</td>
		                                 <td>".$row->nama_mk."</td>
		                                 <td>".$row->sks."</td>
		                                 
		                              </tr>";
		                    }
		                    for ($n=0;$n<=(30-$i);$i++){
		                    	echo 
		                    		"<tr>
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
                    <button class="simpan btn btn-primary"><i class="fa  fa-plus"></i></button>
                    <button class="ubah btn btn-warning"><i class="fa fa-pencil"></i></button>
                    <button class="hapus btn btn-danger" ><i class="fa  fa-times"></i></button>
				</div>
			</div>
		</div>
	</div>
</div>


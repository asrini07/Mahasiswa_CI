<?php 
	if ($row){
        $nim = $row->nim;
        $nama = $row->nama;
        $readonly		= "readonly";
        $action 		= "ubah";
    } else {
        $nim = 
        $nama = 
        $readonly = "";
        $action = "simpan";
    }
?>
<script>
    $(document).ready(function(){
        $(".batal").click(function(){
            window.location = "<?php echo site_url('nilai');?>";
            return false;
        });
        $(".simpan_nilai").click(function(){
            $("#formsubmit_nilai").trigger("submit");
            return false;
        });
        $(".hapus_nilai").click(function(){
            var id=$(this).attr("href");
			window.location="<?php echo site_url('nilai/hapus_nilai');?>/"+id;
        });
        $(":input.kd_mk").typeahead({
            source: function(query, process) {
                objects = [];
                map = {};
                var data = <?php echo json_encode($row1); ?>// Or get your JSON dynamically and load it into this variable
                $.each(data, function(i, object) {
                    map[object.kode_mk] = object;
                    objects.push(object.kode_mk+" | "+object.nama_mk);
                });
                process(objects);
            },
            updater: function(kode_mk) {
            	var n = kode_mk.split(" | ");
                item = n[0];
                $("input[name='kode_matakuliah']").val(map[item].kode_mk);
                $("input[name='sks']").val(map[item].sks);
                
                $("input.kd_mk").val(map[item].nama_mk);
                return map[item].kode_mk+" | "+map[item].nama_mk;
            }  
        });
    });
</script>

<div class="row">
	<div class="col-xs-12">
		<div class="box box-success">
			<div class="box-header with-border"></div>
			<?php echo form_open('nilai/simpannilaiii/'.$action,array("id"=>"formsubmit"));?>
			<input type="hidden" name="idlama" value="<?php echo $id; ?>" />
			<div class="box-body">
				<div class="form-horizontal">
					<div class="form-group">
						<label class="col-sm-2 control-label">NIM</label>
						<div class="col-sm-10">
							<input class="form-control" type="text" required name="nim" value="<?php echo $nim; ?>" <?php echo $readonly; ?>/>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Nama</label>
						<div class="col-sm-10">
							<input class="form-control" type="text" required name="nama" value="<?php echo $nama; ?>" readonly />
						</div>
					</div>
				</div>
			</div>
			<div class="box-footer">
			</div>
			<?php 
				echo form_close();
			?>
		</div>
		<div class="box box-success">
			<div class="box-header with-border">
				<h3 class="box-title">Nilai Mahasiswa</h3>
			</div>
			<div class="box-body">
				<table id="myTable" class="table table-bordered table-hover">
					<thead>
						<tr class="bg-navy">
							<th width="5%">#</th>
	                        <th width="30%">Nama Matakuliah</th>
	                        <th width="10%">SKS</th>
	                        <th width="15%">Semester</th>
	                        <th width="20%">Tahun Akademik</th>
	                        <th width="15%">Nilai</th>
	                        <th width="5%">#</th>
	                    </tr>
					</thead>
					<tbody>
						<?php
							if ($id!=""){
							echo form_open('nilai/simpan_nilai/'.$id,array("id"=>"formsubmit_nilai"));
							echo "<input type='hidden' name='kode_matakuliah'>";
							echo "<input type='hidden' name='nim' value='".$nim."'>";
							echo "<tr>";
							echo "<td></td>";
							echo "<td><input type='text' required autocomplete='off' class='form-control kd_mk' name='kd_mk'></td>";
							echo "<td><input type='text' required readonly autocomplete='off' class='form-control' name='sks'></td>";
							echo "<td><input type='text' required autocomplete='off' class='form-control' name='semester'></td>";
							echo "<td><input type='text' required autocomplete='off' class='form-control' name='thn_akademik'></td>";
							echo "<td><input type='text' required autocomplete='off' class='form-control' name='nilai'></td>";
							echo "<td></td>";
							echo "</tr>";
							echo "<input type='submit' class='hidden'>";
							echo form_close();
						}
					
						if ($row2->num_rows()>0) {
							$i = 0;
							foreach ($row2->result() as $data) {
								$i++;
								echo "<tr id='data' href=''>
										<td>".$i."</td>
		        						<td>".$data->kode_mk." | ".$data->nama_mk."</td>
		        						<td align='center'>".$data->sks."</td>
		        						<td align='center'>".$data->semester."</td>
		        						<td align='center'>".$data->thn_akademik."</td>
		        						<td align='center'>".$data->nilai."</td>
		        						<td>
		                                 	<button href='".$id."/".$data->kode_mk."' type ='button' class='hapus_nilai btn btn-danger'>
														<i class='fa fa-trash'></i>
											</button>
		                                </td>
		                              </tr>";
		                              
							}
						} 
		                    
						?>
					</tbody>
				</table>
			</div>
			<div class="box-footer">
				<div class='col-md-12'>
					<div class="pull-right">
					    <div class="btn-group">
					    	<button class="simpan_nilai btn btn-primary btn-md" title="Add">
					    		<i class="fa fa-save"></i>
					    	</button>
					    	<button type="button" class="batal btn btn-warning btn-md">
					    		<i class="fa fa-remove"></i>
					    	</button>
					    </div>
					</div>
				</div>
			</div>
		</div>
	<div>
</div>
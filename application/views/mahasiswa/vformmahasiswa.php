<?php 
	if ($row){
        $nim = $row->nim;
        $nama = $row->nama;
        $jk = $row->jk;
        $jk1=($row->jk=="L") ? "selected" : "";
        $jk2=($row->jk=="P") ? "selected" : "";
        $alamat = $row->alamat;
        $tempat_lahir = $row->tempat_lahir;
        $tanggal_lahir = date("d-m-Y",strtotime($row->tanggal_lahir));
        $jurusan = $row->jurusan;
        $jurusan1=($row->jurusan=="Teknik Informatika") ? "selected" : "";
        $jurusan2=($row->jurusan=="Teknik Industri") ? "selected" : "";
        $jurusan3=($row->jurusan=="Matematika") ? "selected" : "";
        $jurusan4=($row->jurusan=="PGSD") ? "selected" : "";
        $jurusan5=($row->jurusan=="PG PAUD") ? "selected" : "";
        $jurusan6=($row->jurusan=="Hukum") ? "selected" : "";
        $jurusan7=($row->jurusan=="Akuntansi") ? "selected" : "";
        $email = $row->email;
        $foto = $row->foto;
        $readonly		= "readonly";
        $action 		= "ubah";
    } else {
        $nim = 
        $nama = 
        $jk = 
        $jk1 = $jk2 = 
        $alamat = 
        $tempat_lahir = 
        $tanggal_lahir = 
        $jurusan = 
        $jurusan1=
        $jurusan2=
        $jurusan3=
        $jurusan4=
        $jurusan5=
        $jurusan6=
        $jurusan7=
        $email = 
        $foto = 
        $readonly = "";
        $action = "simpan";
    }
?>
<script>
    $(document).ready(function(){
    	$('.btn-file :file').on('fileselect', function(event, numFiles, label) {
            var input = $(this).parents('.input-group').find(':text'),
                log = numFiles > 1 ? numFiles + ' files selected' : label; 
            if( input.length ) {
                input.val(log);
            } else {
                if( log ) alert(log);
            }
            
        });
        $(".batal").click(function(){
            window.location = "<?php echo site_url('mahasiswa');?>";
            return false;
        });
        var formattgl = "dd-mm-yy";
        $("input[name='tanggal_lahir']").datepicker({
        	changeMonth: true,
		    changeYear: true,
            dateFormat : formattgl
        });
    });
    $(document).on('change', '.btn-file :file', function() {
      var input = $(this),
          numFiles = input.get(0).files ? input.get(0).files.length : 1,
          label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
      input.trigger('fileselect', [numFiles, label]);
    });
</script>

<div class="row">
	<div class="col-xs-12">
		<div class="box box-success">
			<div class="box-header with-border" ></div>
			<?php echo form_open_multipart('mahasiswa/simpanmahasiswa/'.$action,array("id"=>"formsubmit"));?>
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
							<input class="form-control" type="text" required name="nama" value="<?php echo $nama; ?>" />
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Jenis Kelamin</label>
						<div class="col-sm-10">
							<select name="jk" class="form-control">
								<option value='L' <?php echo $jk1;?>>Laki-laki</option>
								<option value='P' <?php echo $jk2?>>Perempuan</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Tempat Lahir</label>
						<div class="col-sm-10">
							<input class="form-control" type="text" required name="tempat_lahir" value="<?php echo $tempat_lahir; ?>" />
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Tanggal Lahir</label>
						<div class="col-sm-10">
							<input class="form-control" type="text" required name="tanggal_lahir" value="<?php echo $tanggal_lahir; ?>" />
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Alamat</label>
						<div class="col-sm-10">
							<textarea class="form-control" name="alamat"><?php echo $alamat;?></textarea>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Jurusan</label>
						<div class="col-sm-10">
							<select name="jurusan" class="form-control">
								<option value='Teknik Informatika' <?php echo $jurusan1;?>>Teknik Informatika</option>
								<option value='Teknik Industri' <?php echo $jurusan2?>>Teknik Industri</option>
								<option value='Matematika' <?php echo $jurusan3;?>>Matematika</option>
								<option value='PGSD' <?php echo $jurusan4?>>PGSD</option>
								<option value='PG PAUD' <?php echo $jurusan5?>>PG PAUD</option>
								<option value='Hukum' <?php echo $jurusan6;?>>Hukum</option>
								<option value='Akuntansi' <?php echo $jurusan7?>>Akuntansi</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Email</label>
						<div class="col-sm-10">
							<input class="form-control" type="email" required name="email" value="<?php echo $email; ?>" />
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Foto</label>
						<div class="col-sm-6">
							<div class="input-group">         
							    <input type="text" class="form-control" readonly>        
							    <span class="input-group-btn">
							        <span class="btn btn-warning btn-file"><i class="fa fa-folder-open"></i>&nbsp;&nbsp;Browse<input type="file" name="foto" class="form-control"></span>
							    </span>
							</div> 

							<!-- <input class="form-control" type="text" required name="foto" value="<?php echo $foto; ?>" /> -->
						</div>
						<div class="col-sm-4">
							<div class="image">
                	    	    <?php
                	    	    if (empty($foto)){
                	    	    	echo img(array("src"=>"img/avatar5.png","width"=>"150","class"=>"img-thumbnail"));
                	    	    } else {
                	    	    	echo img(array("src"=>"img/foto/mahasiswa/".$foto,"width"=>"150","class"=>"img-thumbnail"));
                	    	    }
                	    	    ?>
                	    	    </div>
						</div>
					</div>
				</div>
			</div>
			<div class="box-footer">
				<div class="pull-right">
	                <div class="btn-group">
	                   <button type=submit class="simpan btn btn-primary btn-md" title="Add"><i class="fa fa-save"></i></button>
	                   <button class="batal btn btn-danger btn-md" title="Batal"><i class="fa fa-times-circle"></i></button>
	                </div>
	            </div>
			</div>
			<?php echo form_close(); ?>
		</div>
	<div>
</div>
<?php 
	if ($row){
        $username = $row->username;
        $nama_user = $row->nama_user;
        $password = $row->password;
        $foto = $row->foto;
        $readonly		= "readonly";
        $action 		= "ubah";
    } else {
        $username = 
        $nama_user = 
        $password = 
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
			<?php echo form_open_multipart('profil/simpanprofil/'.$action,array("id"=>"formsubmit"));?>
			<input type="hidden" name="idlama" value="<?php echo $username; ?>" />
			<div class="box-body">
				<div class="form-horizontal">
					<div class="form-group">
						<label class="col-sm-2 control-label">Username</label>
						<div class="col-sm-10">
							<input class="form-control" type="text" required name="username" value="<?php echo $username; ?>" <?php echo $readonly; ?>/>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Nama</label>
						<div class="col-sm-10">
							<input class="form-control" type="text" required name="nama_user" value="<?php echo $nama_user; ?>" />
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Password</label>
						<div class="col-sm-10">
							<input class="form-control" type="password" name="password" value="" />
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
                	    	    	echo img(array("src"=>"img/foto/user/".$foto,"width"=>"150","class"=>"img-thumbnail"));
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
	                   
	                </div>
	            </div>
			</div>
			<?php echo form_close(); ?>
		</div>
	<div>
</div>
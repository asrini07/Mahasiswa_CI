<div class="row">
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-aqua">
      <div class="inner">
        <h3><?php echo $q1->jumlah; ?></h3>

        <p>Jumlah Mahasiswa</p>
      </div>
      <div class="icon">
        <i class="ion ion-bag"></i>
      </div>
      <a href="<?php echo site_url('mahasiswa');?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-green">
      <div class="inner">
        <h3><?php echo $q2->jumlah; ?></h3>

        <p>Jumlah Mahasiswa Perempuan</p>
      </div>
      <div class="icon">
        <i class="ion ion-stats-bars"></i>
      </div>
      <a href="<?php echo site_url('mahasiswa');?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-yellow">
      <div class="inner">
        <h3><?php echo $q3->jumlah; ?></h3>

        <p>Jumlah Mahasiswa Laki-laki</p>
      </div>
      <div class="icon">
        <i class="ion ion-person-add"></i>
      </div>
      <a href="<?php echo site_url('mahasiswa');?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-red">
      <div class="inner">
        <h3><?php echo $q4->jumlah; ?></h3>

        <p>Jumlah Matakuliah</p>
      </div>
      <div class="icon">
        <i class="ion ion-pie-graph"></i>
      </div>
      <a href="<?php echo site_url('mahasiswa');?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
</div>
<div class="row">
  <div class="col-md-12">
    <!-- USERS LIST -->
    <div class="box box-danger">
      <div class="box-header with-border">
        <h3 class="box-title">Mahasiswa</h3>

        <div class="box-tools pull-right">
          <span class="label label-danger"><?php echo $q1->jumlah; ?> Mahasiswa Terdaftar</span>
        </div>
      </div>
      <!-- /.box-header -->
      <div class="box-body no-padding">
        <ul class="users-list clearfix">
          <?php
            foreach ($q5 as $data) {
             echo '
                <li>';
                if (empty($data->foto)){
                  echo img(array("src"=>"img/avatar5.png","width"=>"50","class"=>"img-circle"));
                } else {
                  echo img(array("src"=>"img/foto/mahasiswa/".$data->foto,"width"=>"50","class"=>"img-circle"));
                }

             echo'     <a class="users-list-name" href="#">'.$data->nama.'</a>
                  <span class="users-list-date">'.$data->nim.'</span>
                </li>
             ';
            }
          ?>
          
          
        </ul>
        <!-- /.users-list -->
      </div>
      
    </div>
    <!--/.box -->
  </div>
</div>
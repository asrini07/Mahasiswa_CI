<?php 
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=Laporan Identitas Mahasiswa.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>
<table>
	<tr>
		<th colspan='7' align="left">LAPORAN IDENTITAS MAHASISWA</th>
	</tr>
	<tr>
		<th colspan='2' align='right'>Tanggal : <?php echo date("d-m-Y");?></th>
	</tr>
</table>
<table id="myTable" class="table table-bordered table-hover">
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

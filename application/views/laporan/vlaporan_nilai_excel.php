<?php 
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=Laporan Nilai Mahasiswa.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>
<table>
	<tr>
		<th colspan='7' align="left">LAPORAN NILAI MAHASISWA</th>
	</tr>
	<tr>
		<th colspan='2' align='right'>Tanggal : <?php echo date("d-m-Y");?></th>
	</tr>
</table>
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
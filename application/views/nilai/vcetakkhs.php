<script type="text/javascript">
	window.print();
</script>
<style type="text/css">
    body{
        font-family: 'Source Sans Pro', sans-serif;
        font-size: 12px; 
    }
</style>
<?php
        $content =  "<table cellpadding=5px   cellspacing=0 width=100%>
                    <tr>
                        <td width=10%><img src='".base_url()."img/logo_umc.png' style='width:70px'></td>
                        <td width=90%><font style='font-weight:bold;font-size:12px'>UNIVERSITAS MUHAMMADIYAH CIREBON</font><br>
                            <font>Jalan Tuparev No.70 Cirebon 45153 Telp: 0231-204276</font>
                        </td>
                    </tr>
                    <tr>
                        <td colspan=2 align=center style='font-weight:bold;font-size:14px'>KARTU HASIL STUDI<br>JURUSAN ".strtoupper($row->jurusan)."</td>
                    </tr>
                </table>";
    $content .= "
                <table border='0' cellpadding='2' cellspacing='0' width='100%' align=center>
                    <tr>
                        <td width=10%>NIM</td>
                        <td width=2%>:</td>
                        <td width=56%>".$row->nim."</td>
                    </tr>
                    <tr>
                        <td>Nama</td><td>:</td><td>".$row->nama."</td>
                    </tr>
                </table>
                <br>
    ";
$content.='<table border="1" cellpadding="2" cellspacing="0" width=90% align=center>
                        <tr>
                            <th width="5%">No</th>
                            <th width="10%">Kode Matakuliah</th>
                            <th width="35%">Nama Matakuliah</th>
                            <th width="15%">SKS</th>
                            <th width="10%">Semester</th>
                            <th width="20%">Tahun Akademik</th>
                            <th width="5%">Nilai</th>
                        </tr>
';
$i = 0;
                            foreach ($row1->result() as $data) {
                                $i++;
                                $content.= "<tr id='data' href=''>
                                        <td>".$i."</td>
                                        <td>".$data->kode_mk."</td>
                                        <td>".$data->nama_mk."</td>
                                        <td align='center'>".$data->sks."</td>
                                        <td align='center'>".$data->semester."</td>
                                        <td align='center'>".$data->thn_akademik."</td>
                                        <td align='center'>".$data->nilai."</td>>
                                      </tr>";
                                      
                            }
$content .="
    <br><br>
    <table border='0' cellpadding='0' cellspacing='0' width='100%' align=center>
        <tr>
            <td width='75%'>&nbsp;</td>
            <td width='25%'>Cirebon,&nbsp;".date("j M Y")."<br>Dosen Wali,<P>&nbsp;<P>___________</td>
        </tr>
    </table>";
echo $content;

?>
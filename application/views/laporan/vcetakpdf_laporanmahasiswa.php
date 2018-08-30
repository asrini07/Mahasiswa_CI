<?php
tcpdf();
$obj_pdf = new TCPDF("P", PDF_UNIT, PDF_PAGE_FORMAT, true, "UTF-8", false);
$obj_pdf->SetCreator(PDF_CREATOR);
$title = "PDF Report";
$obj_pdf->SetTitle($title);
//$obj_pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, $title, PDF_HEADER_STRING);
//$obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, "", PDF_FONT_SIZE_MAIN));
$obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, "", PDF_FONT_SIZE_DATA));
//$obj_pdf->SetDefaultMonospacedFont("helvetica");
//$obj_pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
$obj_pdf->SetPrintHeader(false);
$obj_pdf->SetPrintFooter(false);
$margin_left  = 15;
$margin_right = 15;
$margin_top   = 20;
$obj_pdf->SetMargins($margin_left, $margin_top, $margin_right);
$obj_pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
$obj_pdf->SetFont("helvetica", "", 12);
$obj_pdf->setFontSubsetting(false);
	$obj_pdf->AddPage();
	$content =  "<table border='0' cellpadding='2' cellspacing='0' width='100%'>
	                <tr>
                        <td width=100%><font style='font-weight:bold;font-size:12px'><b>UNIVERSITAS MUHAMMADIYAH CIREBON</b></font><br>
                            <font>Jalan Tuparev No.70 Cirebon 45153 Telp: 0231-204276</font>
                        </td>
                    </tr>
                    <tr>
                        <td colspan=2 align=center style='font-weight:bold;font-size:14px'><br><b>LAPORAN DATA MAHASISWA</b></td>
                    </tr>";
	$content .= '</table><br><br><br><br>';

	$content.='<table border=2 cellpadding=2 cellspacing=0 width=100%>
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
				<tbody>';
						$i=0;
						foreach ($row->result() as $data) {
							$i++;
							$content.= "
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
				$content.='</tbody>			
				</table>';
				$content.="<br><br><table>
						<tr>
							<td width=80%></td>
							<td width=20%>
							Cirebon, ".date('d-m-Y').",<br><br><br><br> <b>".$nama_user."</b>
							</td>
						</tr>
				</table>";
	
	$obj_pdf->writeHTML($content, true, true, true, false, '');

$obj_pdf->lastPage();
//$js = 'print(true);window.close(true)';
//$obj_pdf->IncludeJS($js);
$obj_pdf->Output('output.pdf', 'I');
?>
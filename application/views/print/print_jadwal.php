<?php


    



// Extend the TCPDF class to create custom Header and Footer
$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);
$pdf->setPrintFooter(false);
$pdf->setPrintHeader(false);
$pdf->SetTitle('Jadwal Mahasiswa Praktek');
$pdf->SetTopMargin(10);
$pdf->SetRightMargin(16);
$pdf->setFooterMargin(0);
$pdf->SetAutoPageBreak(false);
$pdf->SetDisplayMode('real', 'default');
$pdf->AddPage();

// Set some content to print
$pdf->Image('assets/img/logopemprovsumbar.png', 1, 15, 40, 27, 'PNG', 30, 30, false, 10, '', false, false, '', false, false, false);
$pdf->Cell(35, 5, "", 0, 'L', 1, 0, '', '', true);
$pdf->SetFont('BookmanOldStyleb', '', 14);
$pdf->Cell(12, 15, 'PEMERINTAH PROVINSI SUMATERA BARAT', 0, 'C', 1, 0, '', '', true);
$pdf->Cell(13, 25, 'BADAN LAYANAN UMUM DAERAH', 0, 'C', 1, 0, '', '', true);
$pdf->SetFont('BookmanOldStyleb', '', 20);
// $pdf->Cell(1, 22, 'SUMATERA BARAT', 0, 'L', 1, 0, '', '', true);
$pdf->ln(1);
$pdf->Cell(22, 25, '', 0, 'C', 1, 0, '', '', true);
$pdf->Cell(1, 35, 'RS. JIWA PROF. HB. SAANIN PADANG', 0, 'C', 1, 0, '', '', true);
$pdf->ln(10);
$pdf->SetFont('times', '', 11);
$pdf->Cell(43, 25, '', 0, 'C', 1, 0, '', '', true);
$pdf->Cell(1, 35, 'Jl. Raya Ulu Gadut Padang Telp. (0751) 72001, Fax (0751) 71379', 0, 'C', 1, 0, '', '', true);
$style = array('width' => 1, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0));
$pdf->Line(20, 45, 189, 45, $style);
$pdf->Image('assets/img/LOGOhbs.png', 174, 15, 27, 27, 'PNG', 30, 30, false, 10, '', false, false, '', false, false, false);

$pdf->ln(35);

$html = <<<EOD
<h1>Student  list</h1>
<div class="table-responsive mb-5">
    <table class="table tabled-bordered table-sm" id="tabel_jadwal_modal" width="100%">
        <thead class="thead-light">
          <tr>
            <th>No.</th>
            <th>Nama Mahasiswa</th>                 
            <th>NPM</th>
            <th>Jenis Kelamin</th>                                                                                                       
          </tr>
        </thead>                                                            
    </table>    
</div>
EOD;

// Print text using writeHTMLCell()
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

// ---------------------------------------------------------

// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$pdf->Output('helo_world.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+


    
<?php
//============================================================+
// File name   : example_051.php
// Begin       : 2009-04-16
// Last Update : 2013-05-14
//
// Description : Example 051 for TCPDF class
//               Full page background
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: Full page background
 * @author Nicola Asuni
 * @since 2009-04-16
 */

// Include the main TCPDF library (search for installation path).
require_once('examples/tcpdf_include.php');

$this->load->library('Bepdf');

// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends Bepdf {
    //Page header
    public function Header() {
        // get the current page break margin
        $bMargin = $this->getBreakMargin();
        // get current auto-page-break mode
        $auto_page_break = $this->AutoPageBreak;
        // disable auto-page-break
        $this->SetAutoPageBreak(false, 0);
        // set bacground image
        $img_file = base_url('assets/images/border.png');
        $this->Image($img_file, 0, 0,297,210 , '', '', '', false, 300, '', false, false, 0);
        // restore auto-page-break status
        $this->SetAutoPageBreak($auto_page_break, $bMargin);
        // set the starting point for the page content
        $this->setPageMark();
    }
}

// create new PDF document
$pdf = new MYPDF('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('TCPDF Example 051');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(0);
$pdf->SetFooterMargin(0);

// remove default footer
$pdf->setPrintFooter(false);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, 10);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
//$pdf->SetFont('times', '', 48);
$pdf->SetFont('times', '', 48);

// add a page
$pdf->AddPage('L','A4');

// Print a text

$title=strtoupper('Attestation de formation');
$subject=strtoupper($training['title']);
$to='Décerné à';
$content='Pour avoir suivi une formation de '.$count_hours.' heures en '.$subject;
$session=$dates_session;
//$certificat_date='Le '.date('d M Y');
setlocale(LC_TIME, "fr_FR");
$signature='Responsable formation';


$image_file= base_url('assets/images/public/logo.png');
$pdf->Image($image_file, 22, 22, 55, '', 'PNG', '', 'T', false, 30000, '', false, false, 0, false, false, false);


$html_par1 = '
<p stroke="0.2" fill="true" strokecolor="black" color="black" style="font-family:helvetica;font-weight:bold;font-size:26pt; text-align: center">'.
    $title.'
</p>';

$pdf->Cell(0, 0, '', 0, 1, 'C', 0, '', 1);



$pdf->writeHTML($html_par1, true, false, true, false, '');

//$pdf->Cell(0, 0, '', 0, 1, 'C', 0, '', 1);

$html_part2 = '
<p stroke="0.2" fill="true" strokecolor="black" color="black" style="font-family:helvetica;font-weight:bold;font-size:26pt; text-align: center">'.
    $subject
.'</p>';

$pdf->writeHTML($html_part2, true, false, true, false, '');


$html_part3 = '
<p stroke="0.2" fill="true" strokecolor="black" color="black" style="text-transform:uppercase;font-family:helvetica;font-size:14pt; text-align: center">'.
    $to
.'</p>';

$pdf->Cell(0, 5,'', 0, 1, 'C', 0, '', 1,true);

$pdf->writeHTML($html_part3, true, false, true, false, '');

$pdf->Cell(0, 5, '', 0, 1, 'C', 0, '', 1,true);


//$fontname = TCPDF_FONTS::addTTFfont(base_url('assets/fonts/admin/symphony.ttf'));
//$pdf->SetFont('dejavusansb', '', 48);
$html_part5 = '
<p stroke="0.2" fill="true" strokecolor="black" color="black" style="text-transform:uppercase;font-family:lucidacalligraphyi;font-size:50pt; text-align: center">'.
    $trainee_name
    .'</p>';

$pdf->writeHTML($html_part5, true, false, true, false, '');

$html_part6 = '
<p stroke="0.2" fill="true" strokecolor="black" color="black" style="font-family:helvetica;font-size:14pt; text-align: center">'.
    $content
    .'</p>';

$pdf->writeHTML($html_part6, true, false, true, false, '');

$html_part7 = '
<p stroke="0.2" fill="true" strokecolor="black" color="black" style="font-family:helvetica;font-size:14pt; text-align: center">'.
    $session
    .'</p>';

$pdf->writeHTML($html_part7, true, false, true, false, '');


$pdf->Cell(0, 10, '', 0, 1, 'C', 0, '', 0,true);
$pdf->Cell(110, 0, '', 0, 0, 'C', 0, '', 0,true);
$pdf->Cell(50, 0, '', 1, 1, 'C', 0, '', 0,true);

$html_part8 = '
<p strokecolor="black" color="black" style="font-size: 15px; text-align: center">'.$certificat_date.'</p>';

$pdf->Cell(0, 5, '', 0, 1, 'C', 0, '', 1,true);
$pdf->writeHTML($html_part8, true, false, true, false, '');

$html_part9 = '
<p strokecolor="black" color="black" style="font-size: 15px; text-align: center">'.$signature.'</p>';

$pdf->Cell(0, 5, '', 0, 1, 'C', 0, '', 1,true);
$pdf->writeHTML($html_part9, true, false, true, false, '');


// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('example_051.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+

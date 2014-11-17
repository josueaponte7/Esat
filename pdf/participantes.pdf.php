<?php
//============================================================+
// File name   : example_061.php
// Begin       : 2010-05-24
// Last Update : 2010-08-08
//
// Description : Example 061 for TCPDF class
//               XHTML + CSS
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               Manor Coach House, Church Hill
//               Aldershot, Hants, GU12 4RQ
//               UK
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: XHTML + CSS
 * @author Nicola Asuni
 * @since 2010-05-25
 */
require_once('../config.php');
require_once('../lib/classes/tcpdf/config/lang/spa.php');
require_once('../lib/classes/tcpdf/tcpdf.php');
require_once('../lib/inc/database.php');
require_once('../lib/inc/functions.php');

$lnk = connect();

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('ESAT');
$pdf->SetTitle('Reporte de Participantes');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

//set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

//set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

//set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

//set some language-dependent strings
$pdf->setLanguageArray($l);

// ---------------------------------------------------------

// set font
$pdf->SetFont('helvetica', '', 10);

// add a page
$pdf->AddPage();

/* NOTE:
 * *********************************************************
 * You can load external XHTML using :
 *
 * $html = file_get_contents('/path/to/your/file.html');
 *
 * External CSS files will be automatically loaded.
 * Sometimes you need to fix the path of the external CSS.
 * *********************************************************
 */

// define some HTML content with style
$html = '
<style>
	h1 {
		font-family: Sans;
		font-size: 18pt;
		text-decoration: underline;
		color: #A52A2A;
	}
	
	table.first {
		color: #4D4D4D;
		font-family: helvetica;
		font-size: 8pt;
		border: 1px solid #4D4D4D;
		background-color: #FFFFFF;
	}
	td {
		border: 1px solid #4D4D4D;
		background-color: #FFFFFF;
	}
	th {
		border: 1px solid #4D4D4D;
		background-color: #E5E5E5;
	}
</style>
<h1 class="title">Reporte de Participantes</h1>
<table class="first" cellpadding="6" cellspacing="0">
<tr>
<th>Nombre</th>
<th>Apellido</th>
<th>C&eacute;dula</th>
<th>No. Pasaporte</th>
<th>Edo. Civil</th>
<th>Fecha Nac.</th>
<th>Lugar Nac.</th>
<th>Direcci&oacute;n</th>
</tr>';
$sql = "SELECT * FROM `participantes` ORDER BY `cod_par`";
$qry = mysql_query($sql,$lnk);
if(mysql_num_rows($qry) > 0):
while($row = mysql_fetch_array($qry)):

	$html.= '<tr>
				<td>'.ucwords(utf8_encode($row["nombre"])).'</td>
				<td>'.ucwords(utf8_encode($row["apellido"])).'</td>
				<td>'.$row["cedula"].'</td>
				<td>'.$row["pasaporte"].'</td>
				<td>'.$row["estado_civil"].'</td>
				<td>'._convert_date($row["fecha_nacimiento"]).'</td>
				<td>'.utf8_encode($row["lugar_nacimiento"]).'</td>
				<td>'.utf8_encode($row["direccion"]).'</td>
			</tr>';

endwhile;
 
$html.='</table>';


// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');
else:
	echo "Error al ejecutar la consulta";
endif;
// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

// *******************************************************************
// HTML TIPS & TRICKS
// *******************************************************************

// REMOVE CELL PADDING
//
// $pdf->SetCellPadding(0);
// 
// This is used to remove any additional vertical space inside a 
// single cell of text.

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

// REMOVE TAG TOP AND BOTTOM MARGINS
//
// $tagvs = array('p' => array(0 => array('h' => 0, 'n' => 0), 1 => array('h' => 0, 'n' => 0)));
// $pdf->setHtmlVSpace($tagvs);
// 
// Since the CSS margin command is not yet implemented on TCPDF, you
// need to set the spacing of block tags using the following method.

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

// SET LINE HEIGHT
//
// $pdf->setCellHeightRatio(1.25);
// 
// You can use the following method to fine tune the line height
// (the number is a percentage relative to font height).

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

// CHANGE THE PIXEL CONVERSION RATIO
//
// $pdf->setImageScale(0.47);
// 
// This is used to adjust the conversion ratio between pixels and 
// document units. Increase the value to get smaller objects.
// Since you are using pixel unit, this method is important to set the
// right zoom factor.
// 
// Suppose that you want to print a web page larger 1024 pixels to 
// fill all the available page width.
// An A4 page is larger 210mm equivalent to 8.268 inches, if you 
// subtract 13mm (0.512") of margins for each side, the remaining 
// space is 184mm (7.244 inches).
// The default resolution for a PDF document is 300 DPI (dots per 
// inch), so you have 7.244 * 300 = 2173.2 dots (this is the maximum 
// number of points you can print at 300 DPI for the given width).
// The conversion ratio is approximatively 1024 / 2173.2 = 0.47 px/dots
// If the web page is larger 1280 pixels, on the same A4 page the 
// conversion ratio to use is 1280 / 2173.2 = 0.59 pixels/dots

// *******************************************************************

// reset pointer to the last page
$pdf->lastPage();

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('reporte-participantes.pdf', 'I');

//============================================================+
// END OF FILE                                                
//============================================================+

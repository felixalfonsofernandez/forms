<?php

ini_set('max_execution_time', 9999999999);
require_once('tcpdf_include.php');
// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('MDSJL');
$pdf->SetTitle('Cuponera');
$pdf->SetSubject('Reporte Cuponera');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set header and footer fonts

// set default monospaced font

$pdf->AddPage();

/////*** INICIO DEL CODIGO DEL QR ***/
$style = array(  // estilo del codigo qr
    'border' => 2,
    'vpadding' => 'auto',
    'hpadding' => 'auto',
    'fgcolor' => array(0,0,0),
    'bgcolor' => false, //array(255,255,255)
    'module_width' => 1, // width of a single module in points
    'module_height' => 1 // height of a single module in points
);
//$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
// EN LOS LABEL SE INSERTA EL $GET 
// -----------------------------------------------------------------------------
//***************  INICIO DEL FORMATO: CARATULA  **************/
$tbcaratula = '
<br>
<br>
<br>
<table cellpadding="1" style="font-size:10px;" border="0">
<tr>
    <td style="width:10%;" align="left">
    <br>
    </td>
    <td style="width:80%;border:none!important" align="left">
        <p style="text-align:center;margin-top:1%;padding-left:2%;padding-right:2%;margin-top:20%;font-weight:bold;font-size:13px">
            "DIALOGANDO CON JESUS MALDONADO"
        </p>
        <br>
        <p style="text-align:left;margin-top:1%;padding-left:2%;padding-right:2%;margin-top:20%;font-weight:bold;font-size:11px">
          Nro de Orden: <label id="Labeltext" style="display:block"></label>
        </p>
        <p style="text-align:left;margin-top:1%;padding-left:2%;padding-right:2%;margin-top:20%;font-weight:bold;font-size:11px">
          Apellidos y nombres: <label id="Labeltext1" style="display:block"></label>
        </p>
        <p style="text-align:left;margin-top:1%;padding-left:2%;padding-right:2%;margin-top:20%;font-weight:bold;font-size:11px">
          Documento: <label id="Labeltext2" style="display:block"></label>
        </p>
        <p style="text-align:left;margin-top:1%;padding-left:2%;padding-right:2%;margin-top:20%;font-weight:bold;font-size:11px">
          Telefono: <label id="Labeltext3" style="display:block"></label>
        </p>
        <br>
    </td>
    <td style="width:10%;" align="left">
    <br>
    </td>
</tr>
</table>

<table cellpadding="5" style="font-size:10px;" border="0">
<tr>
    <td style="width:10%;" align="left">
    <br>
    </td>
    <td style="width:80%;border:none!important" align="left">
        <p style="text-align:left;margin-top:1%;padding-left:2%;padding-right:2%;margin-top:20%;font-weight:bold;font-size:11px">
          Tema: <label id="Labeltext4" style="display:block"></label> 
        </p>
        <br>
    </td>
    <td style="width:10%;" align="left">
    <br>
    </td>
</tr>
</table>

<table cellpadding="5" style="font-size:10px;" border="0">
<tr>
    <td style="width:10%;" align="left">
    <br>
    </td>
    <td style="width:80%;border:none!important" align="left">
        <p style="text-align:left;margin-top:1%;padding-left:2%;padding-right:2%;margin-top:20%;font-weight:bold;font-size:11px">
          Derivado a: <label id="Labeltext5" style="display:block"></label> 
        </p>
        <br>
    </td>
    <td style="width:10%;" align="left">
    <br>
    </td>
</tr>
</table>

<table cellpadding="5" style="font-size:10px;" border="0">
<tr>
    <td style="width:10%;" align="left">
    <br>
    </td>
    <td style="width:80%;border:none!important" align="left">
        <p style="text-align:left;margin-top:1%;padding-left:2%;padding-right:2%;margin-top:20%;font-weight:bold;font-size:11px">
          Finalizado: <input type="checkbox" name="box" value="1" readonly="true"/> 
        </p>
        <br>
    </td>
    <td style="width:10%;" align="left">
    <br>
    </td>
</tr>
</table>';
$contenido = $tbcaratula;
$pdf->writeHTML($contenido, true, false, true, false, '');    

$pdf->write2DBarcode('https://registro.munisjl.gob.pe/sistema/generaqr.php?c=$idcontribuyenteencriptado', 'QRCODE,H', 100, 253, 0, 0, $style, 'N');

//$pdf->writeHTML($tbcaratula2, true, false, true, false, '');

//$contenido = $tbcaratula . write2DBarcode('texto del código QR', 'QRCODE,H', '', '', 40, 40, $style, 'N') . $tbcaratula2;

$pdf->Output('CUPONERA.pdf', 'I');
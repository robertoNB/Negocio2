<?php 
  include_once("../Utilerias/BaseDatos.php");
  $res = validaOpcion();
  if ($res == ""){
    header("location:../Acceso/");//Login
  }else{
    //include_once("../resources/html/header.php");
  //}

/*?>
<?php*/
    include_once("tcpdf.php");
    //seguridad
    
    include_once("../Utilerias/BaseDatos.php");
    $idreg = $_POST["idreg"];
    $resul = rptVtasXRegion($idreg);
    $pdf = new TCPDF('P','mm','A4');

$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

$pdf->AddPage();
$pdf->setFont('Helvetica','',14);
$pdf->Cell(190,10,"Instituto Tecnologico de Roque",0,1,'C');
$pdf->setFont('Helvetica','',10);
$pdf->Cell(30,5,"Clase",0);
$pdf->Cell(160,5,": Negocion Electronicos II",0);
$pdf->Ln();
$pdf->Cell(30,5,"Alumno",0);
$pdf->Cell(160,5,": Ing Roberto Antonio Narvaez Bustamante",0);
$pdf->Ln();
$pdf->Ln();
$html = "
<table>
    <tr>
        <th>Region</th>
        <th>Sucursal</th>
        <th>Cliente</th>
        <th>Total</th>
    </tr>";

    foreach ($resul as $tupla) {
        $nomr = $tupla["nomreg"];
        $noms = $tupla["nomsuc"];
        $nomc = $tupla["nomcte"];
        $tot = $tupla["total"];
        $html = $html . "
    

    <tr>
        <td>$nomr</td>
        <td>$noms</td>
        <td>$nomc</td>
        <td>$tot</td>
    </tr>";   
}
    $html = $html . "
    
</table>

<style>
 table{ border-collapse:collapse; }
 th,td{
     border:1px solid #888;
 }
</style>";
$pdf->writeHTMLCell(192,0,9,'',$html,0);

$pdf->Output();
}//else

?>
<?php
    include_once("tcpdf.php");
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
           <th>NoControl</th>
           <th>Nombre del Alumno</th>
           <th>Sexo</th>
           <th>Carrera</th>
           <th>Correo</th>
           <th>Telefono</th>
       </tr>
       <tr>
           <td>83647564</td>
           <td>Juan perez</td>
           <td>Masculino</td>
           <td>ing sistemas</td>
           <td>juanperes@hotmail.com</td>
           <td>1234567890</td>
       </tr>
       <tr>
           <td>12345652</td>
           <td>Fernando</td>
           <td>Masculino</td>
           <td>ing gestion</td>
           <td>fernando@hotmail.com</td>
           <td>2322345678</td>
       </tr>
       <tr>
           <td>64735478</td>
           <td>ana</td>
           <td>Femenino</td>
           <td>ing industria</td>
           <td>ana@hotmail.com</td>
           <td>2345645678</td>
       </tr>
   </table>

<style>
    table{ border-collapse:collapse; }
    th,td{
        border:1px solid #888;
    }
</style>";
$pdf->writeHTMLCell(192,0,9,'',$html,0);

$pdf->Output();
?>
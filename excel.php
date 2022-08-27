<?php

$connect = mysqli_connect("localhost", "root", "", "ospedale");
$export = "";

// excel Especialistas
if(isset($_POST["submit"]))
{
 $query = "SELECT * FROM especialistas";
 $res = mysqli_query($connect, $query);
 if(mysqli_num_rows($res) > 0)
 {
 $export .= '

 <table> 
    <tr>
    <th>Especialidad</th>
    <th>Nombres</th>
    <th>documento</th>
    <th>Fecha Inicio Contrato</th>
    <th>Fecha fin Contrato</th>
    <th>vigencia poliza</th>
    <th>correo</th>
    <th>telefono</th>
    </tr>
 ';
 while($row = mysqli_fetch_array($res))
 {
 $export .= '
 <tr>
 <td>'.$row["especialidad"].'</td> 
 <td>'.$row["nombres"].'</td> 
 <td>'.$row["documento"].'</td> 
 <td>'.$row["fecha_inicio"].'</td> 
 <td>'.$row["fecha_fin"].'</td> 
 <td>'.$row["vigencia_poliza"].'</td> 
 <td>'.$row["correo"].'</td> 
 <td>'.$row["telefono"].'</td>
 </tr>
 ';
 }
 $export .= '</table>';
 header('Content-Type: application/xls');
 header('Content-Disposition: attachment; filename=Terceros Asistenciales.xls');
 echo $export;
 }
}

// excel terceros administrativos
if(isset($_POST["submitAli"]))
{
 $query = "SELECT * FROM alianzas";
 $res = mysqli_query($connect, $query);
 if(mysqli_num_rows($res) > 0)
 {
 $export .= '

 <table> 
   <th>Razon Social</th>
   <th>Nit</th>
   <th>Representante Legal</th>
   <th>Objecto del Contrato</th>
   <th>Inicio Contrato</th>
   <th>Fin Contrato</th>
   <th>Prorroga</th>
   <th>Vigencia Camara de Comercio</th>
   <th>Correo</th>
   <th>Telefono</th>
   <th>Supervisor Contrato</th>
 ';
 while($row = mysqli_fetch_array($res))
 {
 $export .= '
 <tr>
 <td>'.$row["razon_social"].'</td> 
 <td>'.$row["nit"].'</td> 
 <td>'.$row["representante"].'</td> 
 <td>'.$row["objecto"].'</td> 
 <td>'.$row["inicioCon"].'</td> 
 <td>'.$row["finCon"].'</td> 
 <td>'.$row["prorroga"].'</td> 
 <td>'.$row["camara"].'</td> 
 <td>'.$row["correo"].'</td> 
 <td>'.$row["telefono"].'</td>
 <td>'.$row["supervisor"].'</td> 
 </tr>
 ';
 }
 $export .= '</table>';
 header('Content-Type: application/xls');
 header('Content-Disposition: attachment; filename=Terceros Administrativos.xls');
 echo $export;
 }
}
?>
<?php 
include("controller/conexion.php");

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estacionamiento</title>
    <link rel="stylesheet" type="text/css" href="styles/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar registro</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="form-row">
      <div class="form-group col-md-12">
      
      </div>
      <form action="controller/add.php" method="post">
 <div class="form-group col-md-4">
 <input type="text" class="form-control" name="placa" placeholder="No. Placa" id="placa" required="true">
 </div>
 <div class="form-group col-md-12">
 <select name="tipo" id="tipo" name="tipo" class="form-control">
  <option value="Oficial">Oficial</option>
  <option value="Residente" selected>Residente</option>
  <option value="No residente">No residente</option>
</select>
 </div>

<div class="form-group col-md-5">
 <input type="time" class="form-control" name="time" placeholder="Hora entrada" id="time2" required="true">
 <br>
</div>
      </div>
      </div>
      <div class="modal-footer">
            <button onclick="href=''" value="btn1" class="btn btn-outline-primary" type="submit" name="action">Agregar</button>
      </div>
    </div>
  </div>
</div>
</form>





<br><br>
<?php 

$fecha = "";
$hora = "";
/* $date_time_obj = new DateTime($mostrar['inicio']);
$horaEx = $date_time_obj->format('H'); */

//Convertimos la fecha a un formato igual al de la Base de datos


$where = "";


if(isset($_POST['btnSend'])) 
{   
    
    $hora = $_POST['time'];
    $fecha = $_POST['date'];
    $timestamp = strtotime($fecha); 
    $newDate = date("Y-m-d", $timestamp );
    if(empty($_POST['date']))
    {
        
        $where = "where DATE_FORMAT(inicio, '%l') = '".$hora."'"; 
    }else if(empty($_POST['time'])) 
    {
        
        $where = "where date(inicio) = '".$newDate."'";
    }else{
        $where = "where DATE_FORMAT(inicio, '%l') = '".$hora."' 
        and  date(inicio) = '".$newDate."'";
    }
}
if(isset($_POST['btnReload'])) 
{
    $where ="";
}

$consulta = "Select * from registros $where";
$resQuery = $conn->query($consulta);
?>

<div id="titulo">
<h3 id="titulo">Registro de parking</h3>
</div>
</form><br><br>
<div class="row">
<form action="" method="post">
    <label for="" id="lblDate">Fecha:</label>
    <input type="date" name="date" id="date">
    <label for="" id="lblTime">Hora:</label>
    <input type="number" min="1" max="12" name="time" id="time">
    <input type="submit" name="btnSend" id="btnSearch" class='btn btn-outline-primary' value="🔍">
    <input type="submit" name="btnReload" id="btnReload" class='btn btn-outline-primary' value="↺">
</form>
<br><br>

<table class="table table -hover table-bordered">
    <thead class="thead-light">
        <tr>
            
            <th>No. Placa</th>
            <th>Tiempo total</th>
            <th>Tipo</th>
            <th>Cantidad</th>
            <th>Hora Entrada</th>
            <th>Hora salida</th>
            
            
        </tr>
    </thead>
            <?php 
            /* //Obtener solamente la hora de la fecha
            $date_time_obj = new DateTime($mostrar['inicio']);
            $horaEx = $date_time_obj->format('H');
            echo $horaEx; */
            
            while($mostrar = $resQuery->fetch_array(MYSQLI_BOTH)) {
            ?>

    			<tr>
                        <td><?php echo $mostrar['placa']?></td>
                        <td><?php
                        $inicio = strtotime($mostrar['inicio']);
                        $fin = strtotime($mostrar['fin']);
                        //Obtener la diferencia de minutos entre las fechas
                        if(empty($mostrar['fin'])) {
                            echo $mostrar['tiempo'];
                        }else{
                        $tiempo = round(abs($inicio - $fin) / 60,1);
                        echo $tiempo.' min.'; }
                        ?></td>
                        <td><?php echo $mostrar['tipo'] ?></td>
                        <td><?php 
                            if($mostrar['tipo']=='Oficial') {
                                $id = $mostrar['placa'];
                                $cons = "UPDATE registros SET cantidad = 0, tiempo = '".$tiempo."'
                                WHERE placa = '".$id."'
                                ";
                                $conn->query($cons); 
                                echo $mostrar['cantidad'];
                            }else if($mostrar['tipo']== 'Residente'){
                                $id = $mostrar['placa'];
                                $cons2 = "UPDATE registros SET cantidad = '".$tiempo."', tiempo= '".$tiempo."'
                                WHERE placa = '".$id."'
                                ";
                                $conn->query($cons2);
                                echo $mostrar['cantidad']; 
                            }
                                else {
                                $tiempo = round(abs($inicio - $fin) / 60);
                                $time = $tiempo*3;
                                $id = $mostrar['placa'];
                                $cons3 = "UPDATE registros SET cantidad = '".$time."'
                                WHERE placa = '".$id."'
                                ";
                                $conn->query($cons3); 
                                echo $mostrar['cantidad'];
                                
                            }
                        ?></td>
                        <td><?php echo $mostrar['inicio']?></td>
                        <td><?php 
                        if(empty($mostrar['fin'])) {?>
                           <a href="add_hour.php?id=<?php echo $mostrar['placa'];?>" class="btn btn-outline-primary">Registrar hora</a>
                        <?php 
                        }else{
                            echo $mostrar['fin']; 
                            
                        }
                        ?> 
                           
                        </td>
                    </tr>
        </td>
    </tr>
    
    <?php } ?>
    
</table>
</div>
</div>

<a href="reports/excel.php" id="btnExcel" widh class="btn btn-outline-primary"  >Descargar excel</a>
<a href="reports/reporte.php" id="btnPDF" target="_blank" widh class="btn btn-outline-primary" >Descargar PDF</a>
<button type="button" id="btnAgregar" widh class="btn btn-outline-primary" data-toggle="modal" data-target="#exampleModal">Agregar</button>                
<br><br>
</body>
</html>
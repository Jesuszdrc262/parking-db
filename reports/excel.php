<?php 
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename= reporte.xls");

?>

<?php
include('conexion.php');

$consulta = "Select * from registros";
$resQuery = $conn->query($consulta);
?>
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
                                echo '$'.$mostrar['cantidad']*0;
                            }else if($mostrar['tipo']== 'Residente'){
                                echo '$'.$tiempo*1;
                                
                            }else if(empty($mostrar['fin'])) {
                                    echo $mostrar['cantidad'];   
                            }else {
                                
                                echo '$'.$tiempo*3;
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
                        <!-- <td><a class='btn btn-info' href="">Editar</a> -->
                    </tr>
        </td>
    </tr>
    
    <?php } ?>
    
</table>
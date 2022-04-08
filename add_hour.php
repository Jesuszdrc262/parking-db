<?php 
include('controller/conexion.php');
$placa = $_GET['id'];
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="styles/styles.css">
<link rel="stylesheet" type="text/css" href="styles/style.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
<title>
Pagina
</title>
</head>
<div class="d-flex justify-content-center align-items-center mt-5">
    <div class="card">
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item text-center"> <a class="nav-link active btl" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Registro de hora</a> </li>
        </ul>
        <form action="controller/update_hour.php" method="post">
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                <div class="form px-4 pt-5"> <input type="text" id="placa"name="placa" value="<?php echo $placa?>" class="form-control" placeholder="Placa" readonly>
                <input type="time" name="date" id="date1" class="form-control">
                <input type="submit" value="Registrar" name="btnUpdate" id="btnUpdate" class="btn btn-outline-primary"> </div>
            </div>
            </div>
        </div>
        </form>
    </div>
</div>

</html>
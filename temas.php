<!--Inicio de Sesion-->
<?php
session_start();

if(!isset($_SESSION["usuario"])){
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Temas</title>
</head>
<body>

    <?php if(isset($_GET["id"])){ 

        require("config/config.php");
        $solicitar = $conexion->query("SELECT * FROM usuarios WHERE id = '".$_GET['id']."'");
        $row = $solicitar->fetch_assoc();
        include("config/top.php");

        $solicitarText = $conexion->query("SELECT * FROM publicaciones WHERE titulo = '".$_GET['id']."'");
        $rowTxt = $solicitarText->fetch_assoc();
        //print_r($rowTxt);
    }?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo $row["titulo"]; ?></title>
    </head>
    <body>
        <div class="container">
            <p><?php echo $rowTxt["mensaje"]; ?></p>
        </div>
    </body>
    </html>

</body>
</html>
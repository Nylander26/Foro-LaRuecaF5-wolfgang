<!--Formato HTML-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
</head>
<body>
    <h1>Registro</h1><hr>
    <form action="" method="POST">
        Usuario: <br>
            <input type="text" name="user"><br>
        Email: <br>
            <input type="email" name="email"><br>
        Clave: <br>
            <input type="password" name="pass"><br>
            <input type="submit" name="reg" value="Registrar">
    </form>

    <!--Recoleccion de datos de registro, control de clonacion de usuarios y redireccion a la pagina de login-->
    <?php

        if(isset($_POST["reg"])){

            require("config/config.php");
            $user = $_POST["user"];
            $email = $_POST["email"];
            $pass = md5($_POST["pass"]);

            $consulta = $conexion->query("SELECT * FROM usuarios WHERE usuario = '$user'");
            $consultaEmail = $conexion->query("SELECT * FROM usuarios WHERE usuario = '$email'");
            $contar = $consulta->num_rows;
            $contarEmail = $consultaEmail->num_rows;
            if($contar > 0 && $contarEmail > 0){

                echo "Ya hay un usuario con ese nombre o correo, cambialo";

            } else{

                $insertar = $conexion->query("INSERT INTO usuarios (usuario, email, clave, fecha) VALUES('$user', '$email', '$pass', now())");
    
                if($insertar){
                    echo "Te has registrado correctamente";
                }
            }
        }
        echo "<a href='login.php'>Log In</a>";

    ?>
</body>
</html>
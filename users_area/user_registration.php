<?php 
    include('../includes/connect.php'); 
    include('../functions/common_function.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de usuario</title>

    <!--bootstrapt CSS link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.min.css" integrity="sha512-Q2N+L5OJdw5qfhBf/24x/NSA+jElMTfc98tPZYm+yyZoXgZfLp0HJLZDPt1wFgUIykw0hflvyCprH4u89vL8Vg==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->

    <!-- link css files -->
    <link rel="stylesheet" href="../css/style_user.css">

</head>
<body>

    <div class="container-fluid my-3">
        <h2 class="text-center">Registro de nuevo usuario</h2>
        <!-- <div class="row d-flex align-items-center justify-content-center"> -->
        <!-- Se tuvo que optar a una alternativa por falta de compatibilidad -->
        <div class="form-outline mb-4 w-50 m-auto">    
            <div clas="col-lg-12 col-xl-6">   <!-- enctype allows files to be sent through a POST-->
                <form action="" method="POST" enctype="multipart/form-data">
                    <!-- username field -->
                    <div class="form-outline mb-4">
                        <label for="user_username" class="form-label">Nombre de usuario</label>
                        <input type="text" id="user_username" class="form-control" placeholder="Introduce el nombre de usuario" autocomplete="off" required="required" name="user_username"/>
                    </div>
                    <!-- email field -->
                    <div class="form-outline mb-4">
                        <label for="user_email" class="form-label">Email</label>
                        <input type="email" id="user_email" class="form-control" placeholder="Introduce el email" autocomplete="off" required="required" name="user_email"/>
                    </div>
                    <!-- image field -->
                    <div class="form-outline mb-4">
                        <label for="user_image" class="form-label">Imagen de usuario</label>
                        <input type="file" id="user_image" class="form-control" required="required" name="user_image"/>
                    </div>
                    <!-- password field -->
                    <div class="form-outline mb-4">
                        <label for="user_password" class="form-label">Contraseña</label>
                        <input type="password" id="user_password" class="form-control" placeholder="Introduce la contraseña" autocomplete="off" required="required" name="user_password"/>
                    </div>
                    <!-- confirm password field -->
                    <div class="form-outline mb-4">
                        <label for="conf_user_password" class="form-label">Confirmar la contraseña</label>
                        <input type="password" id="conf_user_password" class="form-control" placeholder="Confirme la contraseña" autocomplete="off" required="required" name="conf_user_password"/>
                    </div>
                    <!-- address field -->
                    <div class="form-outline mb-4">
                        <label for="user_address" class="form-label">Dirección</label>
                        <input type="text" id="user_address" class="form-control" placeholder="Introduce tu direccion" autocomplete="off" required="required" name="user_address"/>
                    </div>
                    <!-- contact field -->
                    <div class="form-outline mb-4">
                        <label for="user_contact" class="form-label">Contacto</label>
                        <input type="text" id="user_contact" class="form-control" placeholder="Introduce tu número de teléfono" autocomplete="off" required="required" name="user_contact"/>
                    </div>
                    <div class="mt-4 pt-2">
                        <input type="submit" value="Registrar" class="bg-danger py-2 px-3 border-0" name="user_register">
                        <p class="small fw-bold mt-2 pt-1 mb-0">¿Ya tiene una cuenta? Inicie sesión <a href="user_login.php" class="text-danger"> Aquí </a></p>
                    </div>

                </form>

            </div> 
        </div>

    </div>

</body>
</html>

<!-- PHP code for  -->
<?php
    ini_set('display_errors', 1); 
    ini_set('display_startup_errors', 1); 
    error_reporting(E_ALL);

    if( isset($_POST['user_register']) ){
        $user_username=$_POST['user_username'];
        $user_email=$_POST['user_email'];
        $user_password=$_POST['user_password'];
        $conf_user_password=$_POST['conf_user_password'];
        $user_address=$_POST['user_address'];
        $user_contact=$_POST['user_contact'];
        $user_image=$_FILES['user_image']['name'];
        $user_image_tmp=$_FILES['user_image']['tmp_name'];
        $user_ip=getIPAddress();

        // insert_query

        // Este método no funcionó, por lo que se optó por una alternativa
        //move_uploaded_file($user_image_tmp, "../user_images/$user_image");

        move_uploaded_file($user_image_tmp, "./users_area/users_images/$user_image");
        $insert_query="INSERT INTO `user_table` 
                       (username, user_email, user_password, user_image, user_ip, user_address, user_mobile)
                       VALUES ('$user_username', '$user_email', '$user_password', '$user_image', '$user_ip', '$user_address', '$user_contact');";

        $sql_execute=mysqli_query($con, $insert_query);

        if($sql_execute){
            echo" <script> alert('La información se registró con éxito') </script> ";
        }else{
            die( mysqli_error($con) );
        }
    }
    
?>
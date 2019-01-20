<html>
    <head>
        <title> DATA CRUD PHP | Diego Salas</title>
        <link rel="stylesheet" href="assets/css/bootstrap.css">
        <link rel="stylesheet" href="assets/css/bootstrap-theme.css">
        <script src="assets/js/jquery-3.3.1.min.js"></script>
        <script src="assets/js/bootstrap.js"></script>
    </head>
    <body>
        <?php include 'insertar.php' ?>

        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <?php

                        require 'Conexion/db_config.php';

                        if(isset($_GET['id_user'])){
                            $ID_USER = $_GET['id_user'];
                            $query_user = "SELECT * FROM auth_user WHERE id_user = $ID_USER";
                            $result = mysqli_query($conexion, $query_user);

                            if(mysqli_num_rows($result) == 1){
                                $fila = mysqli_fetch_array($result);
                                $id = $fila['id_user'];
                                $nombre = $fila['nombre'];
                                $usuario = $fila['usuario'];
                                $correo = $fila['correo'];
                                $sexo = $fila['sexo'];
                            }
                        }
                        

                        if(isset($_POST['btn_actualizar'])){
                            $idE = $_GET['id']; 
                            $nombreE = $_POST['txtnombre'];
                            $usuarioE = $_POST['txtusuario'];
                            $correoE = $_POST['txtemail'];
                            $sexoE = $_POST['txtsexo'];

                            $query = "UPDATE auth_user SET nombre = '$nombreE', usuario = '$usuarioE', correo = '$correoE', sexo = '$sexoE' WHERE id_user=$idE";
                            mysqli_query($conexion, $query);

                            header('Location: index.php');
                        }


                        if(isset($_GET['id_user'])){
                    ?>

                            <form action="index.php?id=<?php echo $_GET['id_user']; ?>" method='POST'>
                                <div class="form-group">
                                    <input type="hidden" class="form-control" name="txtid_user" value="<?php echo $id; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Nombre: </label>
                                    <input type="text" class="form-control" name="txtnombre" value="<?php echo $nombre; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Usuario: </label>
                                    <input type="text" class="form-control" name="txtusuario" value="<?php echo $usuario; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Correo: </label>
                                    <input type="text" class="form-control" name="txtemail" value="<?php echo $correo; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Sexo: </label>
                                    <input type="text" class="form-control" name="txtsexo" value="<?php echo $sexo; ?>">
                                </div>
                                <div class="form-group">
                                    <button type="submit" name="btn_actualizar" class="btn btn-success btn-block">
                                        Actualizar
                                    </button>
                                </div>
                                <div class="form-group">
                                    <a href="index.php" class="btn btn-danger">
                                        Cancelar
                                    </a>
                                </div>
                            </form>

                    <?php
                        } else {
                    ?>

                    <form action="insertar.php" method='POST'>
                        <div class="form-group">
                            <input type="hidden" class="form-control" name="id_user" >
                        </div>
                        <div class="form-group">
                            <label>Nombre: </label>
                            <input type="text" class="form-control" name="nombre" placeholder="Nombre completo">
                        </div>
                        <div class="form-group">
                            <label>Usuario: </label>
                            <input type="text" class="form-control" name="usuario" placeholder="Sin caracteres especiales">
                        </div>
                        <div class="form-group">
                            <label>Correo: </label>
                            <input type="text" class="form-control" name="email" placeholder="example@example.com">
                        </div>
                        <div class="form-group">
                            <label>Sexo: </label>
                            <input type="text" class="form-control" name="sexo" placeholder="Hombre / Mujer">
                        </div>
                        <div class="form-group">
                            <input type="submit" name="btn_guardar" class="btn btn-success btn-block" value="Guardar">
    
                        </div>
                    </form>

                    <?php

                        }
                    ?>
                    
                </div>
            </div>

            <div class="row">

                <div class="col-md-12">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>CLAVE</th>
                                <th>NOMBRE</th>
                                <th>USUARIO</th>
                                <th>CORREO</th>
                                <th>SEXO</th>
                                <th>OPCIONES</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $consulta = "SELECT * FROM auth_user";
                                $resultado = mysqli_query($conexion, $consulta);

                                while($fila = mysqli_fetch_assoc($resultado)) {
                            ?>
                            <tr>
                                <td> <?php echo $fila['id_user']; ?> </td>
                                <td> <?php echo $fila['nombre']; ?> </td>
                                <td> <?php echo $fila['usuario']; ?> </td>
                                <td> <?php echo $fila['correo']; ?> </td>
                                <td> <?php echo $fila['sexo']; ?> </td>
                                <td> 
                                    <a href="index.php?id_user=<?php echo $fila['id_user']?>" class="btn btn-primary">
                                        editar
                                    </a>

                                    <a href="eliminar.php?id_user=<?php echo $fila['id_user']?>" class="btn btn-danger">
                                        eliminar
                                    </a>
                                </td>
                            </tr>
                            <?php 
                                } 
                            ?>
                        </tbody>
                    </table>
                </div>

            </div>
            
        </div>
        
    </body>
</html>
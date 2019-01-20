<?php
	require 'Conexion/db_config.php';

	if(isset($_POST['btn_guardar'])){

		$nombre = $_POST['nombre'];
		$usuario = $_POST['usuario'];
		$email = $_POST['email'];
		$sexo = $_POST['sexo'];

		$consulta = "INSERT INTO auth_user(id_user, nombre, correo, usuario, password, sexo) VALUES (NULL,'$nombre','$email','$usuario','nulo','$sexo')";
		$resultado = mysqli_query($conexion,$consulta);

		if(!$resultado){
			die("la consulta no se realizo");
		} 

		$_SESSION['message'] = 'agregado correctamente';
		$_SESSION['message_type'] = 'Exito'; 

		header('Location: index.php');

	}
	
?>
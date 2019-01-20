<?php
	require 'Conexion/db_config.php';

	if(isset($_GET['id_user'])){

		$id = $_GET['id_user'];
		$eliminar = "DELETE FROM auth_user WHERE id_user = $id";
		$exito = mysqli_query($conexion, $eliminar);

		if(isset($exito)){
			header('Location: index.php');
		}
	}
?>
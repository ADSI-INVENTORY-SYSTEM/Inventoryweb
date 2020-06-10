<?php
	$servername = "us-cdbr-east-05.cleardb.net";
    $username = "b99c4da36713e8";
  	$password = "362d39c9";
  	$dbname = "heroku_1f5ff059f1d7813";

	$conn = new mysqli($servername, $username, $password, $dbname);
      if($conn->connect_error){
        die("Conexión fallida: ".$conn->connect_error);
      }

    $salida = "";

    $query = "SELECT idUsuario, NombreSede,NombreRol,NombreIdentificacion,Identificacion ,Nombres,Apellidos,Direccion,Telefono,Correo,Usuario,Ambiente,Fecha_Registro From usuarios INNER JOIN rol ON Rol_idRol = idRol INNER JOIN tipoidentificacion ON TipoIdentificacion_idTipoIdentificacion = idTipoidentificacion INNER JOIN sede ON Sede_idSede = idSede ORDER BY idUsuario  ";

    if (isset($_POST['consulta'])) {
    	$q = $conn->real_escape_string($_POST['consulta']);
    	$query = "SELECT idUsuario, NombreSede,NombreRol,NombreIdentificacion,Identificacion ,Nombres,Apellidos,Direccion,Telefono,Correo,Usuario,Ambiente,Fecha_Registro From usuarios INNER JOIN rol ON Rol_idRol = idRol INNER JOIN tipoidentificacion ON TipoIdentificacion_idTipoIdentificacion = idTipoidentificacion INNER JOIN sede ON Sede_idSede = idSede  WHERE NombreRol LIKE '%$q%'";
    }

    $resultado = $conn->query($query);

    if ($resultado->num_rows>0) {
    	$salida.="<table border=1 class='tabla_datos'>
            <thead>
            <tr id='titulo'>
            <td>ID</td>
            <td>Sede</td>
            <td>Rol</td>
            <td>Tipo Identificación</td>
            <td>Identificacion</td>
            <td>Nombres</td>
            <td>Apellidos</td>
            <td>Direccion</td>
            <td>Telefono</td>
            <td>Ambiente</td>
            <td>Fecha</td>
            </tr>
            </thead>
    	<tbody>";

    	while ($fila = $resultado->fetch_assoc()) {
    		$salida.="<tr>
            <td>".$fila['idUsuario']."</td>
            <td>".$fila['NombreSede']."</td>
            <td>".$fila['NombreRol']."</td>
            <td>".$fila['NombreIdentificacion']."</td>
            <td>".$fila['Identificacion']."</td>
            <td>".$fila['Nombres']."</td>
            <td>".$fila['Apellidos']."</td>
            <td>".$fila['Direccion']."</td>
            <td>".$fila['Telefono']."</td>
            <td>".$fila['Ambiente']."</td>
            <td>".$fila['Fecha_Registro']."</td>
            </tr>";

    	}
    	$salida.="</tbody></table>";
    }else{
    	$salida.="No hay usuarios en ese Rol";
    }


    echo $salida;

    $conn->close();



?>
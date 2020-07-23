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

    $query = "SELECT idActivo,Nserial,NombreSede,NombreProveedor,NombreCategoria,NombreEstado,NombreActivo,Precio,Cantidad,Imagen,Fecha_registro FROM activos INNER JOIN sede ON Sede_idSede = idSede INNER JOIN proveedor ON Proveedor_idProveedor = idProveedor INNER JOIN categoria ON Categoria_idcategoria = idcategoria INNER JOIN estado ON Estado_idEstado = idEstado ORDER BY idActivo  ";

    if (isset($_POST['consulta'])) {
    	$q = $conn->real_escape_string($_POST['consulta']);
    	$query = "SELECT idActivo,Nserial,NombreSede,NombreProveedor,NombreCategoria,NombreEstado,NombreActivo,Precio,Cantidad,Imagen,Fecha_registro FROM activos INNER JOIN sede ON Sede_idSede = idSede INNER JOIN proveedor ON Proveedor_idProveedor = idProveedor INNER JOIN categoria ON Categoria_idcategoria = idcategoria INNER JOIN estado ON Estado_idEstado = idEstado  WHERE NombreEstado LIKE '%$q%'";
    }

    $resultado = $conn->query($query);

    if ($resultado->num_rows>0) {
    	$salida.="<table border=1 class='tabla_datos'>
    			<thead>
                    <tr id='titulo'>
                    <td>ID</td>
                    <td>Serial</td>
                    <td>sede</td>
                    <td>Proveedor</td>
                    <td>Categoria</td>
                    <td>Estado</td>
                    <td>Nombre</td>
                    <td>Precio</td>
                    <td>Cantidad</td>
                    <td>Fecha</td>
    				</tr>
    			</thead>
    	<tbody>";

    	while ($fila = $resultado->fetch_assoc()) {
    		$salida.="<tr>
            <td>".$fila['idActivo']."</td>
            <td>".$fila['Nserial']."</td>
            <td>".$fila['NombreSede']."</td>
            <td>".$fila['NombreProveedor']."</td>
            <td>".$fila['NombreCategoria']."</td>
            <td>".$fila['NombreEstado']."</td>
            <td>".$fila['NombreActivo']."</td>
            <td>".$fila['Precio']."</td>
            <td>".$fila['Cantidad']."</td>
            <td>".$fila['Fecha_registro']."</td>
            </tr>";

    	}
    	$salida.="</tbody></table>";
    }else{
    	$salida.="No hay activos en ese Estado";
    }


    echo $salida;

    $conn->close();



?>
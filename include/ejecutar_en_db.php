<?php

class OperacionesMYSQL
{

  function traerDatos(){

    # incluir el archivo
    # conexion cada vez que se quiera
    # hacer algun trabajo con la Base de datos
    # NOTA: Al final de cada funcion NO OLVIDAR $con=null

    require("conexion.php");
    $query = "SELECT * FROM meta";
    print("<table>");

    try {

      $resultado = $con->query($query);

      foreach ( $resultado as $rows) {

        print("<tr>");
        print("<td>".$rows["idMeta"]."</td>");
        print("<td>".utf8_encode($rows["titulo"])."</td>");
        print("<td>".utf8_encode($rows["descripcion"])."</td>");
        print("<td>".$rows["prioridad"]."</td>");
        print("<td>".$rows["fechaLim"]."</td>");
        print("<td>".$rows["categoria"]."</td>");
        print("</tr>");

      }

      print("</table>");

    } catch (PDOException $e) {
      //EN caso de ERROR
    } finally {

      $resultado =null;
      $con=null;

    }

    }

  function actualizarDatos(){

    require("conexion.php");

    $sql= "UPDATE meta SET prioridad='baja' WHERE idMeta=4";

    try {

      $count = $con->exec($sql);
      print($count." Filas afectadas");

    } catch (PDOException $e) {

      # QUE HACER EN CASO DE ERROR

    } finally {

      # Este codigo se ejecuta siempre
      # Aunque de una PDOException.

      $con = null;

    }
  }
}

$pruebaOBJ=new OperacionesMYSQL();
$pruebaOBJ->traerDatos();
print("</br>");
$pruebaOBJ->actualizarDatos();

 ?>

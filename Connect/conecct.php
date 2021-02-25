<?php
class Connection_db{


function conexion(){
  
$mysqli = new mysqli("localhost", "root", "c0cac0la", "solicitud");

    if ($mysqli->connect_errno) {
        echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . 
        $mysqli->connect_error;
    }else{
       // echo "conexion exitosa";
    
    }
return $mysqli;
}

function registration_request($typeS,$mail){
    $con=$this->conexion();
   
    $consult='CALL registration('.$typeS.',@'.$mail.')';
    $qr=$con->exec($consult);
    /*if () {
        echo "Fallo Proceso de almacenamiento " ;
        return false;
    }else{
       // echo "conexion exitosa";
        return true;
    }*/
}





 function consulta(){
    try{
        $con= $this->conexion();

        $consult='SELECT * FROM docente';

        $result_query= mysqli_query( $con,$consult);
        
        
            if (!$result_query) {
                echo "Error de BD, no se pudo consultar la base de datos\n";
                exit;
            }
        else{
            while ($fila = mysqli_fetch_assoc($result_query)) {
            
             echo '<br> HOLA '.$fila['nombre'] ;  
            }
        }
    }catch(Exception){
       
    }

}

function consulta_typeservice(){
    try{
        $con= $this->conexion();

        $consult='SELECT * FROM Estudiante';

        $result_query= mysqli_query( $con,$consult);
        
        
            if (!$result_query) {
                echo "Error de BD, no se pudo consultar la base de datos\n";
                exit;
            }
        else{
            
            echo "<select name='kill'>";
            while ($fila = mysqli_fetch_assoc($result_query)) {
            
             echo '<option >'.$fila['Correo'] ."</option>";  
            }
            echo "</select>";
            
        }
    }catch(Exception){
       
    }

}




}

?>

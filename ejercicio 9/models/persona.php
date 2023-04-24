<?php


   require_once "conexion/Conexion.php";
   class persona{
       public static function getAll(){
           $db = new Connection();
           $query = "SELECT * FROM persona";
           $resultado = $db->query($query);
           
           $datos = [];
           if($resultado->num_rows){
            while($row = $resultado->fetch_assoc()){
                $datos[] = [
                    'ci'=> $row['ci'],
                    'nombre'=> $row['nombreCompleto'],
                    'fecnac'=> $row['fechaNacimiento'],
                    'departamento'=> $row['departamento']
            ];
            }
            return $datos;

           }
       }

       public static function getWhere($ci){
        $db = new Connection();
        $query = "SELECT * FROM persona where ci = $ci";
        $resultado = $db->query($query);
        $datos = [];
        if($resultado->num_rows){
         while($row = $resultado->fetch_assoc()){
             $datos[] = [
                 'ci'=> $row['ci'],
                 'nombreCompleto'=> $row['nombreCompleto'],
                 'fechaNacimiento'=> $row['fechaNacimiento'],
                 'departamento'=> $row['departamento']
         ];
         }
         return $datos;

        }
    }

    public static function insert($ci, $nombreCompleto, $fechaNacimiento, $departamento){
        $db = new Connection();
        $query = "INSERT INTO persona values('".$ci."','".$nombreCompleto."','".$fechaNacimiento."','".$departamento."')";
        $db->query($query);
        if($db->affected_rows){
            return true;
        }else return false;
    }

    public static function update($ci, $nombreCompleto, $fechaNacimiento, $departamento){
        $db = new Connection();
        $query = "UPDATE  persona SET
        ci = '".$ci."', nombreCompleto = '".$nombreCompleto."', fechaNacimiento = '".$fechaNacimiento."', departamento = '".$departamento."'
        where ci = $ci";
        $db->query($query);
        if($db->affected_rows){
            return true;
        }else return false;
    }

    public static function delete($ci){
        $db = new Connection();
        $query = "DELETE FROM persona WHERE  ci = $ci";
        $db->query($query);
        if($db->affected_rows){
            return true;
        }else return false;
    }


   }
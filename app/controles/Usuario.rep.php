<?php

class RepositorioUsuario {

    public static function obtener_todos($conexion) {
        
        $usuarios = array();
        
        if (isset($conexion)) {
            
            try {
                include_once '../modelo/Usuario.obj.php';

                $sql = "SELECT * FROM usuario";

                $sentencia = $conexion->prepare($sql);
                $sentencia->execute();

                $resultado = $sentencia->fetchAll();
                
                if (count($resultado)){
                    foreach ($resultado as $fila){
                        $usuarios[] = new Usuario($fila['id'], $fila['nombre'], $fila['clave']);
                    }
                } else {
                    print 'No hay usuarios';
                }
                
            } catch (PDOException $ex) {
                print "ERROR" . $ex->getMessage();
            }
        }
        return $usuarios;
    }
    
    public static function insertar_usuario($conexion, $usuario) {
        $usuario_insertado = false;

        if (isset($conexion)) {
            try {
                $sql = "INSERT INTO usuario(nombre, email, clave, fecha_registro, activo) VALUES(:nombre, :email, :clave, NOW(), 0)";

                $nombre = $usuario->obtener_nombre();
                $email = $usuario->obtener_email();
                $clave = $usuario->obtener_clave();

                $sentencia = $conexion->prepare($sql);

                $sentencia->bindParam(':nombre', $nombre, PDO::PARAM_STR);
                $sentencia->bindParam(':email', $email, PDO::PARAM_STR);
                $sentencia->bindParam(':clave', $clave, PDO::PARAM_STR);

                $usuario_insertado = $sentencia->execute();
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }

        return $usuario_insertado;
    }

    public static function nombre_existe($conexion, $nombre) {
        $nombre_existe = true;
        
        if (isset($conexion)) {
            try {
                $sql = "SELECT * FROM usuario WHERE nombre = :nombre";
                                               
                $sentencia = $conexion -> prepare($sql);
                
                $sentencia -> bindParam(':nombre', $nombre, PDO::PARAM_STR);
                
                $sentencia -> execute();
                
                $resultado = $sentencia -> fetchAll();
                
                if (count($resultado)) {
                    $nombre_existe = true;
                } else {
                    $nombre_existe = false;
                }
            } catch (PDOException $ex) {
                print 'ERROR' . $ex -> getMessage();
            }
        }
        
        return $nombre_existe;
    } 
    
    public static function email_existe($conexion, $email) {
        $email_existe = true;
        
        if (isset($conexion)) {
            try {
                $sql = "SELECT * FROM usuario WHERE email = :email";
                
                $sentencia = $conexion -> prepare($sql);
                
                $sentencia -> bindParam(':email', $email, PDO::PARAM_STR);
                
                $sentencia -> execute();
                
                $resultado = $sentencia -> fetchAll();
                
                if (count($resultado)) {
                    $email_existe = true;
                } else {
                    $email_existe = false;
                }
            } catch (PDOException $ex) {
                print 'ERROR' . $ex -> getMessage();
            }
        }
        
        return $email_existe;
    }    
}

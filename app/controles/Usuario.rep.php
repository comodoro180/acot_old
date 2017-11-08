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
                $sql = "INSERT INTO usuario (nombre, email, clave, fecha_registro, activo) VALUES(:nombre, :email, :clave, NOW(), 0)";

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

    public static function obtener_usuario_por_email($conexion, $email) {
        $usuario = null;
        
        if (isset($conexion)) {
            try {
                include_once '../modelo/Usuario.obj.php';
                
                $sql = "SELECT * FROM usuario WHERE email = :email";
                
                $sentencia = $conexion -> prepare($sql);
                
                $sentencia -> bindParam(':email', $email, PDO::PARAM_STR);
                
                $sentencia -> execute();
                
                $resultado = $sentencia -> fetch();
                
                if (!empty($resultado)) {
                    $usuario = new Usuario($resultado['id'],
                            $resultado['nombre'],
                            $resultado['email'],
                            $resultado['clave'],
                            $resultado['fecha_registro'],
                            $resultado['activo']);
                }
            } catch (PDOException $ex) {
                print 'ERROR' . $ex -> getMessage();
            }
        }
        
        return $usuario;
    }
    
    public static function insertar_codigo_activacion($conexion, $usuario_id) {
        if (isset($conexion)) {
            try {
                $caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                $numero_caracteres = strlen($caracteres);
                $string_aleatorio = '';

                for ($i = 0; $i < 7; $i++) {
                    $string_aleatorio .= $caracteres[rand(0, $numero_caracteres - 1)];
                }

                $codigo = password_hash($string_aleatorio, PASSWORD_DEFAULT);

                $sql = "INSERT INTO usuario_codigo (usuario_id, codigo) VALUES(:usuario_id, :codigo)";

                $sentencia = $conexion->prepare($sql);

                $sentencia->bindParam(':usuario_id', $usuario_id, PDO::PARAM_STR);
                $sentencia->bindParam(':codigo', $codigo, PDO::PARAM_STR);

                $sentencia->execute();
                
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }
        return $string_aleatorio;
    }
    
    public static function activar_usuario($conexion, $email, $codigo) {

        if (isset($conexion)) {
            try {
                //include_once '../modelo/Usuario.obj.php';
                $sql = "select u.id usuario_id,c.codigo codigo from usuario u,usuario_codigo c " .
                        "where u.id=c.usuario_id and u.email=:email";

                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':email', $email, PDO::PARAM_STR);
                $sentencia->execute();

                $resultado = $sentencia->fetch();

                if (empty($resultado) && !password_verify($codigo, $resultado['clave'])) {
                    return false;
                } else {
                    $sql = "update usuario u set u.activo=1 where u.id=:usuario_id";

                    $sentencia = $conexion->prepare($sql);
                    $sentencia->bindParam(':usuario_id', $resultado['id'], PDO::PARAM_STR);
                    $sentencia->execute();

                    $resultado = $sentencia->fetch();

                    if (empty($resultado)) {
                        return false;
                    } else {
                        return true;
                    }
                    //$usuario = new Usuario($resultado['id'], $resultado['nombre'], $resultado['email'], $resultado['clave'], $resultado['fecha_registro'], $resultado['activo']);                    
                }
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        } else {
            return false;
        }
    }

}

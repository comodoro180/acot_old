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
    
    
    public static function existe_codigo($conexion, $usuario_id, $tipo) {
        $existe_codigo = false;

        if (isset($conexion)) {
            try {
                $sql = "SELECT * FROM usuario_codigo WHERE usuario_id = :usuario_id and tipo=:tipo";

                $sentencia = $conexion->prepare($sql);

                $sentencia->bindParam(':usuario_id', $usuario_id, PDO::PARAM_STR);
                $sentencia->bindParam(':tipo', $tipo, PDO::PARAM_STR);

                $sentencia->execute();

                $resultado = $sentencia->fetchAll();

                if (count($resultado)) {
                    $existe_codigo = true;
                } else {
                    $existe_codigo = false;
                }
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }

        return $existe_codigo;
    }

    public static function insertar_codigo($conexion, $usuario_id, $tipo) {
        if (isset($conexion)) {
            try {
                $caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                $numero_caracteres = strlen($caracteres);
                $string_aleatorio = '';

                for ($i = 0; $i < 7; $i++) {
                    $string_aleatorio .= $caracteres[rand(0, $numero_caracteres - 1)];
                }

                $codigo = password_hash($string_aleatorio, PASSWORD_DEFAULT);

                if (RepositorioUsuario::existe_codigo($conexion,$usuario_id, $tipo)) {
                    $sql = "UPDATE usuario_codigo set codigo=:codigo where usuario_id=:usuario_id and tipo=:tipo";
                    
                } else {
                    $sql = "INSERT INTO usuario_codigo (usuario_id, codigo ,tipo) VALUES(:usuario_id, :codigo, :tipo)";
                }

                $sentencia = $conexion->prepare($sql);

                $sentencia->bindParam(':tipo', $tipo, PDO::PARAM_STR);
                $sentencia->bindParam(':usuario_id', $usuario_id, PDO::PARAM_STR);
                $sentencia->bindParam(':codigo', $codigo, PDO::PARAM_STR);

                $sentencia->execute();
            } catch (PDOException $ex) {                
                print 'ERROR' . $ex->getMessage();
                return '';
            }
        }
        return $string_aleatorio;
    }

    public static function activar_usuario($conexion, $email, $codigo) {

        if (isset($conexion)) {
            try {
                //echo 'paso 0';
                $sql = "select u.id usuario_id,c.codigo codigo from usuario u,usuario_codigo c " .
                        "where u.id=c.usuario_id and u.email=:email and c.tipo='activar'";

                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':email', $email, PDO::PARAM_STR);
                $sentencia->execute();
                //echo 'paso 1';
                $resultado = $sentencia->fetch();
                
                if (!password_verify($codigo, $resultado['codigo'])){
                    //echo '!Codigo incorrecto¡<br>';
                    return false;
                    
                } else {                    
                    $sql = "update usuario u set u.activo=1 where u.id=:usuario_id";

                    $sentencia = $conexion->prepare($sql);
                    //echo 'paso 3.1 ->'.$resultado['usuario_id'];
                    $sentencia->bindParam(':usuario_id', $resultado['usuario_id'], PDO::PARAM_STR);
                    //echo 'paso 3.1';
                    $sentencia->execute();
                    //echo 'paso 3.2';
                    $resultado = $sentencia -> rowCount();
                    //echo 'paso 3.3';
                    if (count($resultado)) {
                        //echo 'paso 4';
                        return true;
                    } else {
                        //echo 'paso 5';
                        return false;
                    }
                }
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        } else {
            //echo 'paso 6';
            return false;
        }
    }
    
    public static function recuperar_clave($email) {
        if (isset($email)) {
            try {
                Conexion::abrir_conexion();
                $conexion = Conexion::obtener_conexion();

                $usuario = RepositorioUsuario::obtener_usuario_por_email($conexion, $email);

                if (isset($usuario)) {
                    $codigo = RepositorioUsuario::insertar_codigo($conexion, $usuario->obtener_id(), 'clave');
                }
                
                if (isset($codigo)){
                    $destinatario = $usuario->obtener_email();
                    $asunto = "ACOT-Recuperación de clave";
                    $mensaje = "Ingresa el siguiente código para recuperar la clave : ".$codigo;

                    $exito = mail($destinatario, $asunto, $mensaje);

                    if (!$exito) {
                            echo 'envio fallido '.$codigo;
                    }                        
                }
                
                Conexion::cerrar_conexion();
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }
    }
    
    public static function validar_codigo($email,$codigo) {
        $codigo_valido=false;
        Conexion::abrir_conexion();
        $conexion= Conexion::obtener_conexion();
        
        $usuario=RepositorioUsuario::obtener_usuario_por_email($conexion, $email);
        
        if (!isset($usuario)) {
            $codigo_valido = false;
        } else {
            if (!RepositorioUsuario::existe_codigo($conexion, $usuario->obtener_id(), 'clave')) {
                $codigo_valido = false;
            } else {
                try {
                    $sql = "select u.id usuario_id,c.codigo codigo from usuario u,usuario_codigo c " .
                            "where u.id=c.usuario_id and u.email=:email and c.tipo='clave'";

                    $sentencia = $conexion->prepare($sql);
                    $sentencia->bindParam(':email', $email, PDO::PARAM_STR);
                    $sentencia->execute();
                    //echo 'paso 1';
                    $resultado = $sentencia->fetch();

                    if (!password_verify($codigo, $resultado['codigo'])) {
                        //echo '!Codigo incorrecto¡<br>';
                        $codigo_valido = false;
                    } else {
                        $codigo_valido = true;
                    }
                } catch (PDOException $ex) {
                    print 'ERROR' . $ex->getMessage();
                }
            }
        }
        Conexion::cerrar_conexion();
        return $codigo_valido;
    }

}

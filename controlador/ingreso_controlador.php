<?php
    
    if(isset($_POST['submit'])){
        $nom_usuario = $_POST['usuario'];
        $clave = $_POST['clave'];
        require_once('../modelo/usuario_modelo.php');
        $ingreso = new Usuario();
        $usuario = $ingreso->consultarUsuario($nom_usuario, $clave);
        if(isset($usuario['nombre'])){            
            session_start();
            $_SESSION["usuario"] = $nom_usuario;
            $_SESSION['tipo'] = $usuario['tipo'];
            require_once('alumnos_controlador.php');            
        }else{            
           header('location:../index.php?error=true');
        }
    }else{ 
        require_once('vista/ingreso_view.php');
    }
    //2023 Ing. Carlos R. Izquierdo G.

    
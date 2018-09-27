<?php

function validar($data) {

        $errores = [];       

        //Nombre
        $nombre = trim($data['nombre']);
        if($nombre == "") {
        $errores['nombre'] = "El nombre es obligatorio";
        }

        //Email
        $email = trim($data['email']);
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        if($email == ""){
        $errores['email'] = "El mail es obligatorio";      
        } elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errores['email'] = "El email ingresado no es válido";
        }

        //Password
        $password = trim($data['password']);
        $cpassword = trim($data['cpassword']);
        if($password == "" ) {
        $errores['password'] = "La contraseña es obligatoria";
        } elseif (strlen($password) < 6) {
        $errores['password'] = "La contraseña debe tener al menos 6 caracteres";
        }
        elseif ($cpassword == "") {
        $errores['cpassword'] = "Debe repetir la contraseña para continuar";
        } elseif($password != $cpassword) {
        $errores['cpassword'] = "Las contraseñas no coinciden";
        }       

       
        //Acepto condiciones
        if(!isset($data['confirm'])) {
                $errores['confirm'] = "Debe aceptar las condiciones para continuar";
        }

        return $errores;

        
}



function old($data)
{
    if(isset($_POST[$data])) {
        return $_POST[$data];
    }
}


function crearUsuario($data)
{
    $usuario =
    [
        'id' => idUsuario(),
        'username' => $data['nombre'],
        'email' => $data['email'],
        'password' => password_hash($data['password'], PASSWORD_DEFAULT),
    ];
    return $usuario;
}


function idUsuario()
{
    $file = file_get_contents("usuarios.json");
    if($file === "") {
        return 1;
    }

    $usuario = explode(PHP_EOL, $file);
    array_pop($usuario);

    $ultimoUsuario = $usuario[count($usuario) - 1];
    $ultimoUsuario = json_decode($ultimoUsuario, true);

    return $ultimoUsuario['id'] + 1;
}

function guardarUsuario($usuario)
{
    $jsonUser = json_encode($usuario);
    file_put_contents("usuarios.json", $jsonUser . PHP_EOL, FILE_APPEND);
}


//Base de datos para Inicios de sesión

function conectarBase()
{
    $base = file_get_contents("usuarios.json");
    $array = explode(PHP_EOL, $base);
    array_pop($array);

    $arrayUsuarios = [];
    foreach($array as $usuario) {
        $arrayUsuarios[] = json_decode($usuario, true);
    }

    return $arrayUsuarios;
}

function validarPassword($password)
{
    $usuarios = conectarBase();
    foreach($usuarios as $usuario)
    {
        if(password_verify($password, $usuario['password']))
        {
            return $usuario;
        }
    }
    return false;
}

function buscarEmail($email)
{
    $usuarios = conectarBase();
    foreach($usuarios as $usuario)
    {
        if($usuario['email'] === $email)
        {
            return $usuario;
        }
    }
    return false;
}

function validateAvatar($data) 
{
    $errores = [];

    $username = $data["username"];
    
    if($_FILES["avatar"]["error"] == UPLOAD_ERR_OK) {
        $nombre = $_FILES["avatar"]["name"];
        $archivo = $_FILES["avatar"]["tmp_name"];
        
        $ext = pathinfo($nombre, PATHINFO_EXTENSION);

        if($ext != "jpg" && $ext != "png" && $ext != "jpeg") {
            $errores["avatar"] = "Solo acepto formatos jpg y png";
            return $errores;
        }

        $miArchivo = dirname(__FILE__);
        $miArchivo = $miArchivo . "/img/";
        $miArchivo = $miArchivo. "perfil" . $username . "." . $ext;
        move_uploaded_file($archivo, $miArchivo);

    } else {
        $errores["avatar"] = "Hubo un error al procesar el archivo";
    }
    return $errores;
}

function photoPath($data)
{
    
    $username = $data["username"];
    
    $nombre = $_FILES["avatar"]["name"];
    
    $ext = pathinfo($nombre, PATHINFO_EXTENSION);

    
    $miArchivo = "perfil" . $username . "." . $ext;
   
    return $miArchivo;
}

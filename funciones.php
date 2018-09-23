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

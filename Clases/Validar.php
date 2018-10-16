<?php

Class Validar
{

    public static function emailValidate($email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    public static function imageValidate($file)
    {
        //...
    }

    public static function passwordMatch($data)
    {
        return $data['password'] == $data['cpassword'];
    }

    public static function validarRegistro(Usuario $usuario, $data)
    {
        $errores = [];       

        //Nombre
        $nombre = trim($usuario->getUsuario());
        if($nombre == "") {
        $errores['nombre'] = "El nombre es obligatorio";
        }

        //Email
        $email = trim($usuario->getEmail());
        if($email == ""){
        $errores['email'] = "El mail es obligatorio";      
        } elseif(!self::emailValidate($email)) {
        $errores['email'] = "El email ingresado no es válido";
        }

        //Password
        $password = trim($usuario->getPassword());
        $cpassword = trim($data['cpassword']);
        if($password == "" ) {
        $errores['password'] = "La contraseña es obligatoria";
        } elseif (strlen($password) < 6) {
        $errores['password'] = "La contraseña debe tener al menos 6 caracteres";
        }
        elseif ($cpassword == "") {
        $errores['cpassword'] = "Debe repetir la contraseña para continuar";
        }

        if(!self::passwordMatch($data)) {
            $errores['cpassword'] = "Las contraseñas no coinciden";
        }

        //Acepto condiciones
        if(!isset($data['confirm'])) {
            $errores['confirm'] = "Debe aceptar las condiciones para continuar";
        }

        return $errores;

    }

    public static function validarPassword($password, $objectPassword)
    {
        return password_verify($password, $objectPassword);
    }

    public static function validarLogin($password, Usuario $usuario)
    {
        return self::validarPassword($password, $usuario->getPassword());

    }

}
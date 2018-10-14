<?php

class Validate
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

    public static function termsAndConditions($data)
    {
        return isset($data['confirm']);

    }

    public static function registerValidate(User $user, $data)
    {
        $errors = [];

        $username = $user->getUsername();

        if($username == "") {
            $errors['username'] = "Me dejaste el username vacio";
        }  

        $email = $user->getEmail();

        if($email == "") {
            $errors['email'] = "Me dejaste el email vacio!";
        } elseif(!self::emailValidate($email)) {
            $errors['email'] = "El email no es valido!";
        }

        $password = trim($user->getPassword());
        $cpassword = trim($data['cpassword']);

        if($password == "") {
            $errors['password'] = "Me dejaste la pass vacia!";
        } elseif($password < 4) {
            $errors['password'] = "La pass debe ser de al menos 4 caracteres!";
        }

        if(!self::passwordMatch($data)) {
            $errors['cpassword'] = "Las contraseñas no es valida";
        }

        if(!isset($data['confirm'])) {
            $errors['confirm'] = "Tenes que aceptar terminos y condiciones";
        }
        return $errors;
        
    }

    public static function passwordValidate($password, $objectPassword)
    {
        return password_verify($password, $objectPassword);
    }

    public static function loginValidate($password, User $user)
    {
        return self::passwordValidate($password, $user->getPassword());

    }

}
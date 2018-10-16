<?php

require 'Clases/Usuario.php';
require 'Clases/Validar.php';
require 'Clases/DataBase.php';
require 'Clases/JSONDataBase.php';
require 'Clases/Auth.php';
require 'helpers.php';

$db = new JSONDataBase('usuarios.json');
Auth::set();

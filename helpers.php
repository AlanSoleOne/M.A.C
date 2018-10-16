<?php

function old($field)
{
    if(isset($_POST[$field])){
        return $_POST[$field];
    }
}

function redirect($url)
{
    header('Location: ' . $url);
    exit;
}

function guest()
{
    return !check();
}
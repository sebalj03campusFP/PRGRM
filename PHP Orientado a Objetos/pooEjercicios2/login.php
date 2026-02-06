<?php

// Classes
class Login {
    public $usuario;
    public $password;

    public function __construct($usuario, $password)
    {
        $this->usuario = $usuario;
        $this->password = $password;
    }

    public function comprobar(){
        if ((isset($this->password) != 1234)){
            echo "<br>";
            echo " Contraseña Incorrecta \n";
        } else {
            echo "<br>";
            echo "\n Acceso concedido a ". $this->usuario;
        }

    }
}

//Contraseña incorrecta

$user = new Login("Sebastian", 5267);
$user->comprobar();

//Contraseña correcta

$user2 = new Login("Juan Luis", 1234);
$user2->comprobar();
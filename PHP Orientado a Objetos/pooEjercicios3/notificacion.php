<?php

class Notificacion {
    public $mensaje;

    public function __construct($mensaje)
    {
        $this->mensaje = $mensaje;

    } 
    public function enviar(){
        echo "<br>Enviando: ". $this->mensaje;
    }

}

class Email extends Notificacion {
    public $destinatario;
    public function __construct($mensaje, $destinatario)
    {
        parent::__construct($mensaje);
        $this->destinatario = $destinatario;
    }

    public function enviar(){
        echo "Para: ". $this->destinatario;
        parent::enviar();
    }
}
//Objeto
$email = new Email("Hola que tal, te envio un mail y te lo muestro através de PHP, genial no?", "JuanLu@gmail.com");
//logica con metodo
$email->enviar();
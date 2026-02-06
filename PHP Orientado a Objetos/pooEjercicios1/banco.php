<?php
// Creacion de clase
class CuentaBancaria
{
    public $titular;
    public $saldo;
    public $tipoDeCuenta;

    //funcion depositar se usa += para aumentar la cantidad que habia de saldo con la que se ingrese despues
    public function depositar($cantidad)
    {
        if (!empty($cantidad)) {

            $this->saldo += $cantidad;
            echo "Se ha agregado $cantidad € a tu cuenta";
        }
        return $this->saldo;
    }
    // funcion de retirar con -= se resta y colocamos un condicional para que no se pueda retirar mas de lo que tenga la cuenta
    public function retirar($cantidad)
    {
        if (!empty($cantidad) && ($cantidad <= $this->saldo)) {
            $this->saldo -= $cantidad;

            echo "Has retirado $cantidad € de tu cuenta";
        } else {
            echo "No puedes retirar esa cantidad de dinero o 0 €";
        }
    }

    public function mostrarInfo()
    {
        echo "Nombre: " . $this->titular . "\n";
        echo "Cuenta: " . $this->tipoDeCuenta . "\n";
        echo "Saldo: " . $this->saldo . " €\n";
    }
}

// logica del programa
$nombre = "Sebastian";
$tipo = "Ahorros";
$saldo = null;

$cantidad = 20;

$cuenta = new CuentaBancaria();
$cuenta->titular = $nombre;
$cuenta->saldo = $saldo;
$cuenta->tipoDeCuenta = $tipo;
echo "<br>";
$cuenta->mostrarInfo($nombre, $tipo, $saldo);
echo "<br>";
$cuenta->depositar($cantidad);
echo "<br>";
$cuenta->mostrarInfo($nombre, $tipo, $saldo);
echo "<br>";
$cantidad = 10;
echo "<br>";
$cuenta->retirar($cantidad);
echo "<br>";
$cuenta->mostrarInfo($nombre, $tipo, $saldo);

<?php

/** 
 * @author Cristian Manuel Alcobendas Beorlegui
 * @version 1.0
 * */

namespace app\Models;

class Cuenta {
    private float $saldo;

    public function __construct() {
        $this->saldo = 0;
    }

    public function getSaldo():float {
        return $this->saldo;
    }

    public function ingresar(float $quantitat) {
        // $quantitat tiene dos decimales
        $strQuantitat = strval($quantitat);
        
        if ($quantitat > 0 && $this->validarCantidad($quantitat)) {
            $this->saldo += $quantitat;
        }
    }

    private function validarCantidad(float $quantitat): bool {
        $valid = false;
        
        if (round($quantitat, 2) == $quantitat) {
            $valid = true;
        }

        return $valid;
    }

    public function transferir(int $cantidad, Cuenta $cuenta) {
        if ($cantidad > 0) {
            $this->saldo -= $cantidad;
            $cuenta->ingresar($cantidad);
        }
    }
}

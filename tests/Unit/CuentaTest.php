<?php

/** 
 * @author Cristian Manuel Alcobendas Beorlegui
 * @version 1.0
 * */
namespace Tests\Unit;

use App\Models\Cuenta;
use PHPUnit\Framework\TestCase;

class CuentaTest extends TestCase {
    public function test_cuenta() {
        $cuenta = new Cuenta();
        $this->assertNotNull($cuenta);
    }

    public function test_cuenta_cero() {
        $cuenta = new Cuenta();
        $this->assertEquals(0, $cuenta->getSaldo());
    }

    public function test_ingresar_dinero() {
        $cuenta = new Cuenta();
        $cuenta->ingresar(100);
        $this->assertEquals(100, $cuenta->getSaldo());
    }
    
    public function test_ingresar_3000_dinero() {
        $cuenta = new Cuenta();
        $cuenta->ingresar(3000);
        $this->assertEquals(3000, $cuenta->getSaldo());
    }

    public function test_dos_ingresos_dinero() {
        $cuenta = new Cuenta();
        $cuenta->ingresar(100);
        $cuenta->ingresar(3000);
        $this->assertEquals(3100, $cuenta->getSaldo());
    }

    public function test_ingresar_negatiu() {
        $cuenta = new Cuenta();
        $cuenta->ingresar(-100);
        $this->assertEquals(0, $cuenta->getSaldo());
    }

    public function test_ingresar_euros() {
        $cuenta = new Cuenta();
        $cuenta->ingresar(123.45);
        $this->assertEquals(123.45, $cuenta->getSaldo());
    }

    public function test_ingresar_decimals() {
        $cuenta = new Cuenta();
        $cuenta->ingresar(100.252);
        $this->assertEquals(0, $cuenta->getSaldo());
    }

    public function test_transferir_cuenta() {
        $cuenta = new Cuenta();
        $cuenta2 = new Cuenta();
        $cuenta->ingresar(100);
        $cuenta->transferir(100, $cuenta2);
        $this->assertEquals(0, $cuenta->getSaldo());
        $this->assertEquals(100, $cuenta2->getSaldo());
    }
}

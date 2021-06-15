<?php

use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase {

    public function testTrue() {
        $this->assertTrue(true);
    }

    public function testFalse(){
        $var = false;
        $this->assertFalse($var);
    }

    public function testEquals() {
        $result = 5 + 5;
        $this->assertEquals($result, "10"); // ==
    }

    public function testSame() {
        // Compara tipos
        $result = 5 + 5;
        $this->assertSame($result, 10); // ===
    }

    public function testArray() {
        $this->assertIsArray([]);
    }
}
<?php

/**
 * Created by PhpStorm.
 * User: Vasso
 * Date: 1/2/2015
 * Time: 11:23 μμ
 */

class Test extends PHPUnit_Framework_TestCase {
    public function testSetup() {
        $this->assertTrue(true);
    }

    public function testCarItems() {
        $_GET["action"] = "list";
        ob_start();
        include(__DIR__ . '\carItemsActions.php');
        $actual = ob_get_clean();
        //$actual = "";

        $this->assertNotEmpty($actual);
    }
}

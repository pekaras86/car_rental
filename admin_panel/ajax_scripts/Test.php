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

    public function testCarItemsList() {
        $_GET["action"] = "list";
        ob_start();
        include(__DIR__ . '\carItemsActions.php');
        $actual = ob_get_clean();
        //$actual = "";

        $this->assertNotEmpty($actual);
    }

    public function testCarItemsCreate() {
        $_GET["action"] = "create";

        $_POST["plate_number"] = "test-123";
        $_POST["car_type_id"] = 1;
        $_POST["location_ID"] = 1;

        ob_start();
        include(__DIR__ . '\..\..\scripts\database_connection.php');
        include(__DIR__ . '\carItemsActions.php');
        $actual = ob_get_clean();
        $expected = "test";

        //$this->assertEquals($expected,$actual);
        $this->assertNotEmpty($actual);
        $this->assertContains("Result\":\"OK", $actual);
    }

}

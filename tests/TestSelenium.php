<?php
/**
 * Created by PhpStorm.
 * User: Vasso
 * Date: 2/2/2015
 * Time: 1:17 πμ
 */

class TestSelenium extends PHPUnit_Extensions_Selenium2TestCase {
    protected function setUp()
    {
        $this->setBrowser('firefox');
        $this->setBrowserUrl('http://localhost');
    }

    public function testTitle()
    {
        $this->url('http://localhost/car_rental/');
        $this->assertEquals('Thessaloniki Car Rentals', $this->title());
    }
}

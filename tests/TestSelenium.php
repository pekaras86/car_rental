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

    public function testAdminPanel(){
        $this->url('http://localhost/car_rental/log_in_form.php');
        $form = $this->byId('loginform');

        $this->byName('user') -> value('giorgos');
        $this->byName('pass') -> value('1256');
        $form->submit();

        sleep(5);
        $this->url('http://localhost/car_rental/admin_panel/dashboard.php');
        $this->assertEquals('Thessaloniki Car Rental Administrator panel', $this->title());

    }


}
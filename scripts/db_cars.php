<?php
/**
 * Created by PhpStorm.
 * User: George
 * Date: 27/12/2014
 * Time: 2:59 μμ
 */


function getCars($dbcon, $pickup_location, $category, $order_by) {

    $query = "SELECT cars.id, cars.name, car_categories.name as car_category, cars.description, car_locations.name as car_location, price, pic_path FROM cars " .
        "INNER JOIN car_locations ON car_locations.id = cars.location_ID " .
        "INNER JOIN car_categories ON car_categories.id = cars.car_Category_ID " .
        "WHERE active = 1 AND car_locations.name = '{$pickup_location}' ";

    if ($category <> 'Any') {$query .= " AND car_categories.name = '{$category}' ";}
    $query .= "ORDER BY price";
    if ($order_by == "DESC") {$query .= " " . $order_by;}
    $result = mysqli_query($dbcon, $query);
    return $result;
}

function getCarByID($dbcon, $car_id) {

    $query = "SELECT cars.id, cars.name, car_categories.name as car_category, cars.description, car_locations.name as car_location, price, pic_path FROM cars " .
        "INNER JOIN car_locations ON car_locations.id = cars.location_ID " .
        "INNER JOIN car_categories ON car_categories.id = cars.car_Category_ID " .
        "WHERE cars.id = '{$car_id}'";

    return mysqli_query($dbcon, $query);
}

function getCarCharacteristics($dbcon, $car_id){
    $query = "SELECT * FROM car_characteristics WHERE car_id = '{$car_id}'";
    return mysqli_query($dbcon, $query);
}
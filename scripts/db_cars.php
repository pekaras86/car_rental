<?php
/**
 * Created by PhpStorm.
 * User: George
 * Date: 27/12/2014
 * Time: 2:59 μμ
 */

function getAvailableCarTypesAPI($dbcon, $pickup_location, $pickup_date, $dropoff_date, $category){
    return getAvailableCarTypes($dbcon, $pickup_location, $pickup_date, $dropoff_date, $category, "", "");
}

function getAvailableCarTypes($dbcon, $pickup_location, $pickup_date, $dropoff_date, $category, $order_by, $limitation="") {

    $query = "SELECT car_types.*, car_categories.name as car_category,car_locations.name as car_location, count(car_items.id) as car_quantity " .
    "FROM car_types  " .
    "INNER JOIN car_categories ON car_types.car_Category_ID = car_categories.id  " .
    "INNER JOIN car_items ON car_items.car_type_id = car_types.id  " .
    "INNER JOIN car_locations ON car_items.location_ID = car_locations.id  " .
    "WHERE car_locations.id = '{$pickup_location}' AND car_items.id NOT IN (SELECT DISTINCT car_id  " .
    "  																		   FROM reservations  " .
    "																			WHERE (date_format(pickup_datetime, '%d/%m/%Y') BETWEEN '{$pickup_date}' AND '{$dropoff_date}')  " .
    "																			OR ( date_format(dropoff_datetime, '%d/%m/%Y')  BETWEEN '{$pickup_date}' AND '{$dropoff_date}')  " .
    "																			OR ( '{$pickup_date}' BETWEEN date_format(pickup_datetime, '%d/%m/%Y') AND  date_format(dropoff_datetime, '%d/%m/%Y') ) ) ";

    if ($category <> 'Any') {$query .= " AND car_categories.id = '{$category}' ";}

    $query .= " GROUP BY car_types.id";
    $query .= " ORDER BY price";

    if ($order_by == "DESC") {$query .= " " . $order_by;}

    $query .= " " . $limitation;

    $result = mysqli_query($dbcon, $query);
    return $result;
}

function getFirstAvailableCarByTypeID($dbcon, $pickup_location, $pickup_date, $dropoff_date, $car_type_id) {

    $query = "SELECT car_items.id " .
        "FROM car_types  " .
        "INNER JOIN car_categories ON car_types.car_Category_ID = car_categories.id  " .
        "INNER JOIN car_items ON car_items.car_type_id = car_types.id  " .
        "INNER JOIN car_locations ON car_items.location_ID = car_locations.id  " .
        "WHERE car_locations.id = '{$pickup_location}' AND car_items.id NOT IN (SELECT DISTINCT car_id  " .
        "  																		   FROM reservations  " .
        "																			WHERE (date_format(pickup_datetime, '%d/%m/%Y') BETWEEN '{$pickup_date}' AND '{$dropoff_date}')  " .
        "																			OR ( date_format(dropoff_datetime, '%d/%m/%Y')  BETWEEN '{$pickup_date}' AND '{$dropoff_date}')  " .
        "																			OR ( '{$pickup_date}' BETWEEN date_format(pickup_datetime, '%d/%m/%Y') AND  date_format(dropoff_datetime, '%d/%m/%Y') ) ) " .
        " AND car_types.id ='{$car_type_id}' LIMIT 1";


    $result = mysqli_query($dbcon, $query);
    return $result;
}


function getCarByID($dbcon, $car_id) {

    $query = "SELECT car_items.id, car_types.name, car_categories.name as car_category, car_types.description, car_locations.name as car_location, car_types.price, car_types.pic_path " .
        "FROM car_types " .
        "INNER JOIN car_categories ON car_types.car_Category_ID = car_categories.id  " .
        "INNER JOIN car_items ON car_items.car_type_id = car_types.id  " .
        "INNER JOIN car_locations ON car_items.location_ID = car_locations.id  " .
        "WHERE car_items.id = '{$car_id}'";

    return mysqli_query($dbcon, $query);
}

function getCarCharacteristics($dbcon, $car_id){
    $query = "SELECT * FROM car_characteristics WHERE car_id = '{$car_id}'";
    return mysqli_query($dbcon, $query);
}

function getAllCars($dbcon, $order_by, $limitation="") {

	 $query = "SELECT car_types.*, car_categories.name as car_category,car_locations.name as car_location, count(car_items.id) as car_quantity " .
    "FROM car_types  " .
    "INNER JOIN car_categories ON car_types.car_Category_ID = car_categories.id  " .
    "INNER JOIN car_items ON car_items.car_type_id = car_types.id  " .
    "INNER JOIN car_locations ON car_items.location_ID = car_locations.id  " .
    "GROUP BY car_types.id  " .
    "ORDER BY price";

    if ($order_by == "DESC") {$query .= " " . $order_by;}

    $query .= " " . $limitation;

    $result = mysqli_query($dbcon, $query);
    return $result;
}
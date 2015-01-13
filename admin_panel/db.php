<?php
/**
 * Created by PhpStorm.
 * User: George
 * Date: 28/12/2014
 * Time: 7:49 μμ
 */

/* =========== CarLocations ================== */
function getCarLocations($dbcon){
    return mysqli_query($dbcon, "SELECT * FROM car_locations;");
}

function getCarLocationsOptions($dbcon){
    return mysqli_query($dbcon, "SELECT name as DisplayText, id as Value FROM car_locations;");
}

function insertCarLocations($dbcon, $name, $description, $lat, $long){
    return mysqli_query($dbcon, "INSERT INTO car_locations(name, description, lat, `long`) " .
                                 "VALUES('" . $name . "', '" . $description . "', " . $lat . ", " . $long . ");");
}

function getLastInsertedCarLocation($dbcon){
    return mysqli_query($dbcon, "SELECT * FROM car_locations WHERE id = LAST_INSERT_ID();");
}

function updateCarLocation($dbcon, $name, $description, $lat, $long, $id) {
    return mysqli_query($dbcon, "UPDATE car_locations SET name = '" . $name . "', description = '" . $description . "', lat = " . $lat . ", `long`=" . $long . " WHERE id = " . $id . ";");
}

function deleteCarLocation($dbcon, $id){
    return mysqli_query($dbcon, "DELETE FROM car_locations WHERE id = " . $id . ";");
}

/* =========== CarCategories ================== */
function getCarCategories($dbcon){
    return mysqli_query($dbcon, "SELECT * FROM car_categories;");
}

function insertCarCategories($dbcon, $name){
    return mysqli_query($dbcon, "INSERT INTO car_categories(name) " .
        "VALUES('" . $name . "');");
}

function getLastInsertedCarCategory($dbcon){
    return mysqli_query($dbcon, "SELECT * FROM car_categories WHERE id = LAST_INSERT_ID();");
}

function updateCarCategory($dbcon, $name, $id) {
    return mysqli_query($dbcon, "UPDATE car_categories SET name = '" . $name . "' WHERE id = " . $id . ";");
}

function deleteCarCategory($dbcon, $id){
    return mysqli_query($dbcon, "DELETE FROM car_categories WHERE id = " . $id . ";");
}

/* =========== CarTypes ================== */
function getCarTypes($dbcon){
    return mysqli_query($dbcon, "SELECT * FROM car_types;");
}

function getCarTypesOptions($dbcon){
    return mysqli_query($dbcon, "SELECT name as DisplayText, id as Value FROM car_types;");
}



/* =========== CarItems ================== */
function getCarItems($dbcon){
    return mysqli_query($dbcon, "SELECT * FROM car_items limit 100;");
}


/* ================ Reservations count ============================== */
function getReservationsCountbyDate($dbcon, $date){
    $query = "select count(*) from reservations where date(reserv_date) ='" . $date . "'";
    $result = mysqli_query($dbcon, $query);

    return mysqli_fetch_row($result)[0];
}

function getMonthReservationsCountbyDate($dbcon, $date){

    $from = date('Y-m-01', strtotime($date));
    $to = date('Y-m-t', strtotime($date));

    $query = "select count(*) from reservations where date(reserv_date) BETWEEN '" . $from . "' AND '" . $to . "'";
    $result = mysqli_query($dbcon, $query);
    return mysqli_fetch_row($result)[0];
}

function getWeekReservationsCountbyDate($dbcon, $date){

    $from = getWeekDates(getYearOfDate($date), getWeekIndexByDate($date));
    $to = getWeekDates(getYearOfDate($date), getWeekIndexByDate($date),false);

    $query = "select count(*) from reservations where date(reserv_date) BETWEEN '" . $from . "' AND '" . $to . "'";
    $result = mysqli_query($dbcon, $query);
    return mysqli_fetch_row($result)[0];
}


/* ===================== date functions =============================== */
function getWeekIndexByDate($date){
    $week =  date('W', strtotime($date));
    return $week;
}
function getYearOfDate($date){
    $year =  date('Y', strtotime($date));
    return $year;
}

function getWeekDates($year, $week, $start=true, $format=1){
    if ($format == 1) {
        $from = date("Y-m-d", strtotime("{$year}-W{$week}-1")); //Returns the date of monday in week
        $to = date("Y-m-d", strtotime("{$year}-W{$week}-7"));   //Returns the date of sunday in week
    }else{
        $from = date("d/m/Y", strtotime("{$year}-W{$week}-1")); //Returns the date of monday in week
        $to = date("d/m/Y", strtotime("{$year}-W{$week}-7"));   //Returns the date of sunday in week
    }
    if($start) {
        return $from;
    } else {
        return $to;
    }
    //return "Week {$week} in {$year} is from {$from} to {$to}.";
}


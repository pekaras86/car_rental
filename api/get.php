<?php
/**
 * Created by PhpStorm.
 * Date: 5/1/2015
 * Time: 1:37 μμ
 */
require_once ('../scripts/database_connection.php');

if (isset($_GET['format'], $_GET['num'])) {

//Set our variables
    $format = strtolower($_GET['format']);
    $num = intval($_GET['num']);

//Connect to the Database
    //$con = mysql_connect('localhost', 'root', '') or die ('MySQL Error.');
    //mysql_select_db('api', $con) or die('MySQL Error.');

//Run our query
    $result = mysqli_query($con, 'SELECT * FROM car_types LIMIT ' . $num);

//Preapre our output
    if($format == 'json') {

        $cars = array();
        while($car = mysqli_fetch_array($result, MYSQL_ASSOC)) {
            $cars[] = array('car'=>$car);
        }
        $output = json_encode(array('cars' => $cars));

    } elseif($format == 'xml') {

        header('Content-type: text/xml');
        $output  = "<?xml version=\"1.0\"?>\n";
        $output .= "<cars>\n";

        for($i = 0 ; $i < mysqli_num_rows($result) ; $i++){
            $row = mysqli_fetch_assoc($result);
            $output .= "<car> \n";
            $output .= "<car_id>" . $row['id'] . "</car_id> \n";
            $output .= "<car_name>" . $row['name'] . "</car_name> \n";
            $output .= "<car_description>" . $row['description'] . "</car_description> \n";
            $output .= "</car> \n";
        }

        $output .= "</cars>";

    } else {
        die('Improper response format.');
    }

//Output the output.
    echo $output;
} else {
    die('Improper API call.');

}


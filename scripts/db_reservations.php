<?php
/**
 * Created by PhpStorm.
 * Date: 12/1/2015
 * Time: 6:25 μμ
 */

function getLastReservations($dbcon)
{
    $query = "SELECT * FROM reservations ORDER BY ID DESC LIMIT 50";
    return mysqli_query($dbcon, $query);
}

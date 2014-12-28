<?php

require_once('../scripts/database_connection.php');

try
{
	//Open database connection
	//$con = mysqli_connect("localhost","root","ghawk79","thessaloniki_car_rental");
	//mysql_select_db("jtabletestdb", $con);
	//mysqli_set_charset($con,'utf8');

	//Getting records (listAction)
	if($_GET["action"] == "list")
	{
		//Get records from database

		$result = mysqli_query($con, "SELECT * FROM car_locations;");
		
		//Add all records to an array
		$rows = array();
		while($row = mysqli_fetch_array($result))
		{
		    $rows[] = $row;
		}

		//Return result to jTable
		$jTableResult = array();
		$jTableResult['Result'] = "OK";
		$jTableResult['Records'] = $rows;
		print json_encode($jTableResult);
	}
	//Creating a new record (createAction)
	else if($_GET["action"] == "create")
	{
		//Insert record into database
		$result = mysqli_query($con, "INSERT INTO car_locations(name, description, lat, `long`) VALUES('" . $_POST["name"] . "', '" . $_POST["description"] . "', " . $_POST["lat"] . ", " . $_POST["long"] . ");");
		//Get last inserted record (to return to jTable)
		$result = mysqli_query($con, "SELECT * FROM car_locations WHERE id = LAST_INSERT_ID();");
		$row = mysqli_fetch_array($result);

		//Return result to jTable
		$jTableResult = array();
		$jTableResult['Result'] = "OK";
		$jTableResult['Record'] = $row;
		print json_encode($jTableResult);
	}
	//Updating a record (updateAction)
	else if($_GET["action"] == "update")
	{
		//Update record in database
		$result = mysqli_query($con, "UPDATE car_locations SET name = '" . $_POST["name"] . "', description = '" . $_POST["description"] . "', lat = " . $_POST["lat"] . ", `long`=" . $_POST["long"] . " WHERE id = " . $_POST["id"] . ";");

		//Return result to jTable
		$jTableResult = array();
		$jTableResult['Result'] = "OK";
		print json_encode($jTableResult);
	}
	//Deleting a record (deleteAction)
	else if($_GET["action"] == "delete")
	{
		//Delete from database
		$result = mysqli_query($con, "DELETE FROM car_locations WHERE id = " . $_POST["id"] . ";");

		//Return result to jTable
		$jTableResult = array();
		$jTableResult['Result'] = "OK";
		print json_encode($jTableResult);
	}

	//Close database connection
	mysqli_close($con);

}
catch(Exception $ex)
{
    //Return error message
	$jTableResult = array();
	$jTableResult['Result'] = "ERROR";
	$jTableResult['Message'] = $ex->getMessage();
	print json_encode($jTableResult);
}

<?php

require_once('../../scripts/database_connection.php');
require_once('../db.php');

try
{

	//Getting records (listAction)
	if($_GET["action"] == "list")
	{
		//Get records from database
		$result = getCarItems($con);
		
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
		$result =  insertCarLocations($con, $_POST["name"], $_POST["description"], $_POST["lat"], $_POST["long"]);

		//Get last inserted record (to return to jTable)
		$result = getLastInsertedCarLocation($con);

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
		$result = updateCarLocation($con, $_POST["name"], $_POST["description"], $_POST["lat"], $_POST["long"], $_POST["id"]);

		//Return result to jTable
		$jTableResult = array();
		$jTableResult['Result'] = "OK";
		print json_encode($jTableResult);
	}
	//Deleting a record (deleteAction)
	else if($_GET["action"] == "delete")
	{
		//Delete from database
		$result = deleteCarLocation($con, $_POST["id"]);

		//Return result to jTable
		$jTableResult = array();
		$jTableResult['Result'] = "OK";
		print json_encode($jTableResult);
	}
	else if($_GET["action"] == "getCarTypes")
	{
		//Get records from database
		$result = getCarTypesOptions($con);

		//Add all records to an array
		$rows = array();
		while($row = mysqli_fetch_array($result))
		{
			$rows[] = $row;
		}

		//Return result to jTable
		$jTableResult = array();
		$jTableResult['Result'] = "OK";
		$jTableResult['Options'] = $rows;
		print json_encode($jTableResult);
	}
	else if($_GET["action"] == "getCarLocations")
	{
		//Get records from database
		$result = getCarLocationsOptions($con);

		//Add all records to an array
		$rows = array();
		while($row = mysqli_fetch_array($result))
		{
			$rows[] = $row;
		}

		//Return result to jTable
		$jTableResult = array();
		$jTableResult['Result'] = "OK";
		$jTableResult['Options'] = $rows;
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

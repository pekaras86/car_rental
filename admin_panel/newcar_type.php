<?php
if (isset($_REQUEST['success_message'])) {
    $success_message = $_REQUEST['success_message'];
} else {
    $success_message = NULL;
}

require_once ('admin_views.php');

// Requires the <HEAD></HEAD> part of the page
display_head("Thessaloniki Car Rentals Administration");

// Requires the navbar
$tag = "newcar";
display_navbar($tag);

?>
<div class="page-wrapper">
<div class="container">
    <div class="row">
        <?php
        if(isset($success_message)) {
            echo <<<EOD
                     <span id="success_message"><b>{$success_message}</b></span>
EOD;
        }
        ?>
        <div class="col-lg-12">
        <form method="post" action="add_new_car.php" name="addcar" enctype="multipart/form-data">
            <div class="form-group">
                <table class="addcar">
                    <tbody>
                    <tr>
                        <td width="200">
                            *
                            <b>Car Name:</b>
                        </td>
                        <td>
                            <input type="text" size="40" name="cname" class="form-control" id="cname" style="width:200px;">
                        </td>
                    </tr>
                    <tr>
                        <td width="200" valign="top">
                            *
                            <b>Car Image:</b>
                        </td>
                        <td>
                            <span class="btn btn-default btn-file"><input type="file" size="35" name="cimg" id="cimg"></span>
                        </td>
                    </tr>
                    <tr>
                        <td width="200">
                            *
                            <b>Car Category:</b>
                        </td>
                        <td>
                            <select size="4" multiple="multiple" name="ccat" class="form-control" id="ccat" style="width:200px;">
                                <option name="ccat" value="2">Suv</option>
                                <option name="ccat" value="3">Station Wagon</option>
                                <option name="ccat" value="1">City Car</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td width="200">
                            *
                            <b>Car Description:</b>
                        </td>
                        <td>
                            <textarea rows="4" cols="50" name="cdescription" id="cdescription" class="form-control"></textarea>
                        </td>
                    </tr>
                    <!--<tr>
                      <td width="200">
                        *
                        <b>Location:</b>
                      </td>
                      <td>
                          <select size="4" multiple="multiple" name="clocation" id="clocation" class="form-control" style="width:250px;">
                            <option name="clocation" value="1">ATHENS AIRPORT</option>
                            <option name="clocation" value="2">THESSALONIKI AIRPORT</option>
                            <option name="clocation" value="4">VOLOS</option>
                            <option name="clocation" value="5">ALEKSANDROUPOLI</option>
                            <option name="clocation" value="3">CHANIA</option>
                            <option name="clocation" value="7">KATERINI</option>
                          </select>
                       </td>
                    </tr>-->
                    <tr>
                        <td width="200">
                            *
                            <b>Car Characteristics:</b>
                        </td>
                        <td>
                            <img class="char-img" src="images/char-icons/ac.png">
                            <select name="air_con">
                                <option name="air_con" value="1">Yes</option>
                                <option name="air_con" value="0">No</option>
                            </select>

                            <img class="char-img" src="images/char-icons/engine.png">
                            <input type="text" name="cccar" id="cccar" style="width:70px;">

                            <img class="char-img" src="images/char-icons/airbag.png">
                            <select name="airbags">
                                <option name="airbags" value="0">0</option>
                                <option name="airbags" value="1">1</option>
                                <option name="airbags" value="2">2</option>
                                <option name="airbags" value="4">4</option>
                            </select>

                            <img class="char-img" src="images/char-icons/body.png">
                            <select name="passengers">
                                <option name="passengers" value="2">2</option>
                                <option name="passengers" value="4">4</option>
                                <option name="passengers" value="5">5</option>
                                <option name="passengers" value="6">6</option>
                            </select>

                            <img class="char-img" src="images/char-icons/door.png">
                            <select name="doors">
                                <option name="doors" value="2">2</option>
                                <option name="doors" value="4">4</option>
                            </select>

                            <img class="char-img" src="images/char-icons/radio.png">
                            <select name="radio">
                                <option name="radio" value="1">Yes</option>
                                <option name="radio" value="0">No</option>
                            </select>
                        </td>
                    </tr>
                    <!--<tr>
                      <td width="200">
                        *
                        <b>Plate Number:</b>
                      </td>
                      <td>
                        <input type="text" size="4" value="" name="plate" id="plate" class="form-control" style="width:200px;">
                      </td>
                      </tr>-->
                    <tr>
                        <td width="200">
                            *
                            <b>Price/Day:</b>
                        </td>
                        <td>
                            <input type="text" size="4" value="" name="cprice" id="cprice" class="form-control" style="width:100px;">
                        </td>
                    <tr>
                        <td>
                            <input type="submit" value="Submit" class="btn btn-default btn-file" onClick="return addCarFields();">
                        </td>
                    </tr>
                    </tr>
                    </tbody>
                </table>
            </div>
        </form>
    </div>
    </div>
</div> <!-- /container -->
</div>

<?php

$jqScript = <<<EOD
<script>
    function addCarFields(){
        var cname = document.getElementById("cname").value;
        if(cname === ""){
            alert("Car Name field is necessary!");
            return false;
        }

        var cimg = document.getElementById("cimg").value;
        if(cimg === ""){
            alert("Car Image field is necessary!");
            return false;
        }

        var ccat = document.getElementById("ccat").value;
        if(ccat === ""){
            alert("Car Category field is necessary!");
            return false;
        }

        var cdescription = document.getElementById("cdescription").value;
        if(cdescription === ""){
            alert("Car Description field is necessary!");
            return false;
        }

        var clocation = document.getElementById("clocation").value;
        if(clocation === ""){
            alert("Car Location field is necessary!");
            return false;
        }

        var cccar = document.getElementById("cccar").value;
        if(cccar === ""){
            alert("Car Engine field is necessary!");
            return false;
        }

        var plate = document.getElementById("plate").value;
        if(plate === ""){
            alert("Plate Number field is necessary!");
            return false;
        }

        var cprice = document.getElementById("cprice").value;
        if(cprice === ""){
            alert("Price/Day field is necessary!");
            return false;
        }

    } // end addCarFields()
</script>
<script>
    $(document).ready(function(){
        $("#success_message").fadeOut(4000);
    }); // end document
</script>
EOD;

// Requires the footer (JS declarations) part of the page
display_footer($jqScript);

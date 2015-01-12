<?php

require_once('scripts/database_connection.php');
require_once('scripts/views.php');

//session_start();

// Requires the <HEAD></HEAD> part of the page
display_head("Thessaloniki Car Rentals");

/*-----------------------Elegxos user--------------------------------*/

//ean exei setaristei cookie kane elegxo tou user pou kanei sign in
if (!isset($_COOKIE['user_id'])) {

    if(isset($_POST['button']) && $_POST['button'] == 'LogIn') {


        //elegkse ean o user symplirose ti forma
        if (isset($_POST['user'])) {

            $username = mysqli_real_escape_string($con, trim($_REQUEST['user']));
            $password = mysqli_real_escape_string($con, trim($_REQUEST['pass']));

            //psakse ton user ston pinaka admins
            $query = sprintf("SELECT users.id, username, usergroups.id as usergroup_id FROM users " .
                "INNER JOIN usergroups ON usergroups.id = users.user_group_id" .
                " WHERE username = '%s' AND " .
                " password = '%d';",
                $username, $password);

            $results = mysqli_query($con, $query);

            //ean vrethike ston pinaka users
            if (mysqli_num_rows($results) == 1) {

                $result = mysqli_fetch_array($results);

                $user_id = $result['id'];  //ean yparxei eksygage to user_id tou
                $username = $result['username'];  //kai to username tou
                $usergroup_id = $result['usergroup_id'];  //kai ton typo toy user (admin or simple user)

                setcookie('user_id', $user_id);  // kai ftiakse cookie me to user_id tou
                setcookie('username', $username); // kai to username tou
                setcookie('password', $password);


                if ($usergroup_id == 1) { //einai administrator
                    setcookie('admin', 'admin');
                    header("Location: admin_panel/admin.php");   // sti synexeia katefthine ton sti selida show_user kai pare mazi to cookie user_id

                    exit();  //telos selidas
                } else { //einai pelatis
                    setcookie('user', 'user');
                    header("Location: user_panel.php");
                }


            } else {
                //ean den yparxei ston pinaka kane anakatefthinsi edw me error message

                $error_message = "Your username/password combination was invalid.";
                header("Location: log_in_form.php?error_message={$error_message}");
            }


        }
    } else { //register was pressed

    }
    // Requires the navbar
    $tag = "logIn";
    display_navbar($tag);
    ?>


    <!-- Main component for a primary marketing message or call to action -->
    <div class="container" style="margin-bottom:20px;">

        <?php
        if (isset($_REQUEST['error_message'])) {
            echo <<<EOD
                     <span class="error_message"><b>{$_REQUEST['error_message']}</b></span>
                     <p></p>
EOD;
        }
        ?>
        <div class="row">
            <div class="col-md-6">
                <div class="login-card" style="box-shadow: rgba(0, 0, 0, 0.3) 20px 20px 20px; margin-bottom:28px;">
                    <h1>Log-in</h1><br>

                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                        <input type="text" name="user" placeholder="Username">
                        <input type="password" name="pass" placeholder="Password">
                        <input type="submit" name="button" class="btn btn-info btn-block" value="LogIn">
                    </form>

                    <div class="login-help">
                        <a href="#">Forgot Password</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title text-center">Please Register</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                            <div class="form-group">
                                <input type="text" name="first_name" id="first_name" class="form-control input-sm"
                                       placeholder="First Name">
                            </div>

                            <div class="form-group">
                                <input type="text" name="last_name" id="last_name" class="form-control input-sm"
                                       placeholder="Last Name">
                            </div>

                            <div class="form-group">
                                <input type="email" name="email" id="email" class="form-control input-sm"
                                       placeholder="Email Address">
                            </div>

                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="password" name="password" id="password"
                                               class="form-control input-sm" placeholder="Password">
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="password" name="password_confirmation" id="password_confirmation"
                                               class="form-control input-sm" placeholder="Confirm Password">
                                    </div>
                                </div>
                            </div>

                            <input type="submit" name="button" value="Register" class="btn btn-info btn-block">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- /container -->



    <?php

    // Requires the footer (JS declarations) part of the page
    display_footer();

} else {
    //ean exei setaristei cookie anakatefthine ton sto index...apagorevete na mpei edw
    header("Location: index.php");
}



?>

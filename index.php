<?php

$username   = '';
$email      = '';
$remember   = '';

if (isset($_COOKIE['username'])) {
    $username = $_COOKIE['username'];
}

if (isset($_COOKIE['email'])) {
    $email = $_COOKIE['email'];
}

if (isset($_COOKIE['remember'])) {
    $remember = 'checked';
}

?>
<!DOCTYPE html>
<html>

<head>
    <title>Lab 5 COMP 3015</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="css/style.css" rel="stylesheet">
</head>

<body>

    <div id="wrapper">

        <div class="container">

            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <h1 class="login-panel text-center text-muted">My Classes</h1>
                    <div class="login-panel panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Add or Remove Classes</h3>
                        </div>
                        <div class="panel-body">
                            <form name="signup" role="form" action="results.php" method="post">
                                <fieldset>
                                    <div class="form-group">
                                        <input class="form-control" name="className" placeholder="ex. COMP 3015" type="text" value="<?php echo $username; ?>" />
                                        <input type="submit" class="btn btn-sm btn-success btn-block" value="Add" />
                                    </div>
                                    <div class="form-group medium">
                                        <input type="checkbox" name="classes[]" />
                                        <label for="class">COMP 3015</label>
                                        <button class="pull-right btn-danger">Remove</button>
                                    </div>



                                    <!-- <div class="form-group">
                                        <div class="pull-right">
                                            <label for="remember" class=" ">
                                                Remember Me
                                            </label>
                                            <input type="checkbox" name="remember" value="remember" <?php echo $remember; ?> />
                                        </div> -->
                                    <!-- </div>
                        <input type="submit" class="btn btn-lg btn-info btn-block" value="Sign Up!" /> -->
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>
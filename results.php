<?php

define('THIRTY_DAYS', time() + 60 * 60 * 24 * 30);
$redirect = false;

$username   = trim($_POST['username']);
$password   = trim($_POST['password']);
$verify     = trim($_POST['verify_password']);
$email      = trim($_POST['email']);

if (!preg_match('/^[a-z]([a-z]|[0-9]){6}([a-z]|[0-9])*[0-9]+$/i', $username)) {
    $redirect = true;
} else if (!preg_match('/((?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[,.\/\?\*!])){8}/', $password)) {
    $redirect = true;
} elseif ($password != $verify) {
    $redirect = true;
} elseif (!preg_match('/^[a-z](([a-z]|[0-9])*([.+])*([a-z]|[0-9])){7,}+@{1}(gmail\.com|bcit\.ca)$/i', $email)) {
    $redirect = true;
}

if ($redirect) {
    header('Location: index.html');
    exit();
}

// Remember, md5() is just for demonstration purposes.
// Do not do this in production for passwords.
$fp = fopen('signups.txt', 'a+');
fwrite($fp, $username . '@' . md5($password) . '@' . $email . PHP_EOL);
fclose($fp);

if (isset($_POST['remember'])) {
    setcookie('username', $username, THIRTY_DAYS);
    setcookie('email', $email, THIRTY_DAYS);
    setcookie('remember', 1, THIRTY_DAYS);
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>COMP 3015</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="css/style.css" rel="stylesheet">
</head>

<body>

    <div id="wrapper">

        <div class="container">

            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <h1 class="login-panel text-center text-muted">COMP 3015</h1>
                    <div class="alert alert-success text-center">
                        Thanks! <?php echo $username; ?>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>
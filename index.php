<?php

$contents = json_decode(file_get_contents('./courses.json'), true);

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
                            <form name="addClass" role="form" action="newCourse.php" method="post">
                                <div class="form-group">
                                    <input class="form-control" name="class_Name" placeholder="ex. COMP 3015" type="text" />
                                    <input type="submit" name="submit" class="btn btn-sm btn-success btn-block" value="Add" />
                                </div>
                            </form>
                            <br>
                            <?php foreach ($contents as $className => $class) : ?>
                                <div class="courses" style="margin-bottom: 20px;">
                                    <form style=" display: inline" action="update.php" method="post">
                                        <input type="hidden" name="class_Name" value="<?php echo $className ?>">
                                        <input type="checkbox" name="status" value="1" <?php echo ($class['completed'] ? 'checked' : '') ?>>
                                    </form>
                                    <div class="space">
                                    </div>
                                    <?php echo $className ?>

                                    <form style="display: inline" action="delete.php" method="post">
                                        <input type="hidden" name="class_Name" value="<?php echo $className ?>">
                                        <button class="btn btn-sm btn-danger"> Delete</button>
                                    </form>
                                    <form style="display: inline" action="edit.php" method="post">
                                        <input type="hidden" name="class_Name" value="<?php echo $className ?>">
                                        <button class="btn btn-sm btn-grey"> Edit</button>
                                    </form>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script>
        const checkboxes = document.querySelectorAll('input[type=checkbox]');
        checkboxes.forEach(ch => {
            ch.onclick = function() {
                this.parentNode.submit()
            };
        })
    </script>
</body>

</html>
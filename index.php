<?php

$contents = json_decode(file_get_contents('./courses.json'), true);

// // Initialize JSON file 
// if (!file_exists('courses.json')) {
//     file_put_contents('courses.json', '[]');
// }

// // Now you are free to start writing and reading from your JSON file.

// // Check if the request is coming in via POST.
// // Do your processing up top above your HTML otherwise you can run into "Headers already sent..." errors.
// if (isset($_POST['submit'])) {

//     $input = json_decode(file_get_contents('courses.json'), true);
//     print_r($input);

//     // This is what the user typed in.
//     $id = 0;
//     $input = $_POST['className'];

//     $courses[] = array(
//         "id" => ++$id,
//         "course" => $input
//     );

//     // Write the array back to the file.
//     $courses = json_encode($courses, JSON_PRETTY_PRINT);
//     file_put_contents('courses.json', $courses);
// }

// // Finally, read out the latest contents from your file so your form has access to it.
// $contents = file_get_contents('courses.json');
// $dataFromFile = json_decode($contents, true);
// $singleData = array_filter($dataFromFile, function ($var) use ($id) {
//     return (!empty($var['id']) && $var['id'] == $id);
// });
// $singleData = array_values($singleData)[0];

// // Delete button is clicked
// if (isset($_POST['delete'])) {
// }
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
                                <fieldset>
                                    <div class="form-group">
                                        <input class="form-control" name="className" placeholder="ex. COMP 3015" type="text" />
                                        <input type="submit" name="submit" class="btn btn-sm btn-success btn-block" value="Add" />
                                    </div>
                                </fieldset>
                            </form>
                            <br>
                            <?php foreach ($contents as $className => $className) : ?>
                                <div class="courses">
                                    <form style="display: inline" action="update.php" method="post">
                                        <input type="hidden" name="className" value="<?php echo $className ?>">
                                        <input type="checkbox" name="status" value="1" <?php echo ($contents['completed'] ? 'checked' : '') ?>>
                                    </form>
                                    <?php echo $className ?>
                                    <form style="display: inline" action="delete.php" method="post">
                                        <input type="hidden" name="className" value="<?php echo $className ?>">
                                        <button>Delete</button>
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
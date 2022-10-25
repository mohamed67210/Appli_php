<!DOCTYPE html>
<?php
    $id = (isset($_GET["id"])) ? $_GET["id"] : "";
    require 'db_functions.php';
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>product</title>
</head>
<body>
    <main>
        <div class='card'>
            <?php echo findOneById($conn)?>
        </div>
    </main>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Positive Number</title>
</head>
<body>
    <?php 

    if(!is_numeric((int)$_POST["number"])){
        echo "it's not a number";
    }

    elseif ($_POST["number"] <= 0) {
        echo "It's not a positive integer";
    }

    else {
    for ($i = 0; $i <= $_POST["number"]; $i = $i + 2) {
        echo $i, '<br>';
        }
    }

    ?>
</body>
</html>

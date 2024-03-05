
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
</head>
<body>
    <?php
        $name = $email = $password1 = $password2 = $gender = '';
 
        // Handle the form submit
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password1 = $_POST['password1'];
            $password2 = $_POST['password2'];
 
            if ($name == '' OR $email == '' OR $password1 == '' OR $password2 == '') {
                echo "Please fill all the fields.";
            } elseif ($_POST['password1'] != $_POST['password2']) {
                echo "Passwords don't match.";
            } elseif (!isset($_POST['gender'])) {
                echo "Please fill all the fields.";
            } else {
                if ($_POST['gender'] == 'other') {
                    $gender = $_POST['fillin'];
                } else {
                    $gender = $_POST['gender'];
                }
 
                // Save the values to the database...
                echo "Welcome ", $name, "\n";
                echo $email, " ", $password1, " ", $gender;
                // TODO: print the values of variable $name, $email,
                // $password1 and $gender here on the page
            }
        } 
    ?>
    <form action="task3.php" method="post">
        Name:
        <input name="name" value="<?php echo $name;?>" /><br>
 
        Female:
        <input type="radio" name="gender" value="female"><br>
        Male:
        <input type="radio" name="gender" value="male"><br>
        Other:
        <input type="radio" name="gender" value="other">
        <input name="fillin"><br>
        <br>
        Email:
        <input name="email" type="email" value="<?php echo $email;?>"/><br>
        Password:
        <input name="password1" type="password" value="<?php echo $password1;?>"/><br>
        Repeat password:
        <input name="password2" type="password" value="<?php echo $password2;?>"/><br>
        <button type="submit">Register</button>
        <!--
            TODO:
            Add radio buttons for gender information
            male female other (+ fill in text field)
            if the user selected other handle the fill in field.
            In any case save the gender info to variable $gender as a string. 
        -->
    </form>
</body>
</html>

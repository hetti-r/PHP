
<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Welcome</title>

</head>

<body>

    <?php
        $name = $email = $passdord1 = $password2 = $gender = '';
        // Check that all the fields are filled and that the passwords match
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $gender = $_POST['gender'];
            $password1 = $_POST['password1'];
            $password2 = $_POST['password2'];
        }

       if ($_POST ['name']== ''
            OR $_POST ['email']== ''
            OR $_POST ['password1']== ''
            OR $_POST ['password1']== ''
            OR $_POST ['gender']== '')
            {
                echo "Please fill all the fields.";
                echo '<a href="task2.html">Back to the form</a>';
            }
            elseif ($_POST ['password1'] != $_POST ['password1']) {
                echo "Passwords don't match.";
            }
            else {
                echo "Welcome", $_POST['name'];
            }
    
            if (isset($gender) && $gender=="Other") 
            {
                echo $_POST ['Please spesify'];
            }

        // If everything is ok show a personalized Welcome message

        // If something is wrong show a link back to the form

    ?>
        <form action="task2.php" method="post">

Name: <input name="name" value="<?php echo $name;?>"/><br>

Email: <input name="email" type="email" value="<?php echo $email;?>"/><br>

Gender: <input type="radio" name="gender" value="<?php echo $gender;?>"/><br>

Please Spesify; 

Password: <input name="password1" type="password" value="<?php echo $password1;?>"/><br>

Repeat password: <input name="password2" type="password" value="<?php echo $password2?>"/><br>

<button type="submit">Register</button>

</form>

</body>

</html>

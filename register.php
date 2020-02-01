
<?php
session_start();
if (isset($_SESSION["email"])){
    header('Location: home.php');
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <link rel="stylesheet" href="CSS/stylesheet.css">
</head>

<body>
    <div class="main">
        <div class="cover">
            <h1>Register</h1>
        </div>
        <div id="form_div">
            <form action="handle_register.php" method="POST">
                <div class="email_div">
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" placeholder="Please Enter your email"><br>
                </div>
                <div>
                    <label for="password">Password:</label>
                    <input type="password" name="password" id="password" placeholder="Please Enter your Password"
                        pattern="(?=.*[a-z])(?=.*[A-Z]).{8,}"
                        title="must include small, capital letters and a minimum of 8 characters"><br>
                </div>
                <input type="submit" id='submit_button' name="register" value="Register">
            </form>
        </div>
    </div>
</body>

</html>





<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = test_input($_POST["username"]);
    $password = test_input($_POST["password"]);
  }
  
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
?>
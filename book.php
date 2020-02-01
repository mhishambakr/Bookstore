<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <link rel="stylesheet" href="CSS/stylesheet.css">
</head>

<body>
    <?php
    echo "<hr>";
    if (isset($_SESSION["email"])){
        echo '<nav id="navbar">
        <a href="login.php" id="" class="navlink">Login</a>
        <a href="register.php" id="" class="navlink">Register</a>
        </nav>';
        
    } else{
        echo '<nav id="navbar">
        <a href="form.php" id="" class="navlink">Add a book</a>
        <a href="logout.php" id="" class="navlink">Logout</a>
        </nav>';
        
    ?>

    <?php
        include 'database.php';

        session_start();
        $id = $_GET['id'];
        $books = new Database("localhost");
        $books->conn();
        $books->presentFromQuerySingle($id);
        
    }
    ?>

    
</body>

</html>

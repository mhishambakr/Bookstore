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
        <a href="home.php" id="" class="navlink">Home</a>
        <a href="form.php" id="" class="navlink">Add a book</a>
        <a href="logout.php" id="" class="navlink">Logout</a>
        
        </nav>';
    }  
    ?>

    <?php
    session_start();
    if (isset($_SESSION["email"])){

    }else{
        header('Location: home.php');
    }

    include 'database.php';


    $book_title = $_POST['book_title'];
    $book_description = $_POST['book_description'];
    $img = $_POST['img'];


    $book = new Database("localhost");
    $book->conn();
    $book->insertIntoQuery($book_title, $book_description, $img);
    ?>

    
</body>

</html>




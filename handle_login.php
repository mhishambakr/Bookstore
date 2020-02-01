<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign in</title>
    <link rel="stylesheet" href="CSS/stylesheet.css">
</head>

<body>
    <div class="main">
        <div class="cover">
            <h1>Sign in</h1>
        </div>
        <div class="php_part">
            <?php

            if (isset($_POST["email"])){
                
            } else{
                header('Location: home.php');
            }

            class Database{
                public $servername;
                public $dbuser;
                public $dbpassword;
                public $dbname;
                public $conn;


                function conn(){
                    $this->servername = "localhost";
                    $this->dbuser = "root";
                    $this->dbpassword = ""; 
                    $this->dbname = "book_store";
                    $this->conn = new mysqli($this->servername,$this->dbuser,$this->dbpassword,$this->dbname); 
                    if ($this->conn->connect_error){
                        die("Connection failed: ".$conn->connect_error); 
                    } else{
                        // echo "connected successfully<br>";
                    }
                }
                //======================================QUERY======================================

                public $query;   
                public $email;
                public $password;

                function checkUser(){
                    $this->email = $_POST["email"];
                    $this->password = $_POST["password"];
                    
                    $this->query = "SELECT `email`, `password` 
                    FROM `users` 
                    WHERE `email` = '$this->email'";
                    
                    $result=$this->conn->QUERY($this->query);

                    if ($result->num_rows > 0) { 
                        while($row = $result->fetch_assoc()) { 
                            if ($this->password == $row["password"]){
                                $email = $_POST["email"];
                                $password = $_POST["password"];


                                session_start();

                                $_SESSION["email"] = $email;
                                $_SESSION["password"] = $password;

                                echo "<span>Welcome, go to <a href='home.php'>Home</a> or <a href='logout.php'>Logout</a></span>";
                            } else{
                                echo "<span>Wrong password<br></span>";
                                echo "<span><a href='login.php'>Try again</a> or <a href='register.php'>Register</a></br></span>";
                            }

                        }
                    } else {
                        echo "<span>User name doesn't exist<br></span>";
                        echo "<span><a href='login.php'>Login</a> or <a href='register.php'>Register</a></br></span>";
                    }
                }
            }


            $signUser = new Database("localhost");
            $signUser->conn();
            $signUser->checkUser();



            ?>
        </div>
    </div>
</body>

</html>

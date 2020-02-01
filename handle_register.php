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
            <h1>Register</h1>
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
                function __construct($serverName){ 
                    echo "<span>Welcome to our site<br></span>";
                }

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

                function registerUser(){
                    $this->email = $_POST["email"];
                    $this->password = $_POST["password"];
                    
                    $this->query = "INSERT INTO `users`(`email`, `password`) 
                    VALUES ('$this->email','$this->password')";

                    $result=$this->conn->QUERY($this->query);

                    echo "<span>Registered.<br></span><span>email: $this->email<br></span><span>Password: $this->password<br></span>";
                    echo "<span><a href='login.php'>Login</a></span>";
                }
                function checkUser(){
                    $this->email = $_POST["email"];
                    $this->query = "SELECT * 
                    FROM `users` 
                    WHERE `email` = '$this->email'";
                    
                    $result=$this->conn->QUERY($this->query);

                    if ($result->num_rows > 0) { 
                        while($row = $result->fetch_assoc()) { 
                            echo "<span>This email already exists. If this is you, please <a href='login.php'>Login</a><br></span>";
                        }
                    } else {
                        $this->registerUser();
                    }
                }
            }


            $newUser = new Database("localhost");
            $newUser->conn();
            $newUser->checkUser();

            ?>
        </div>
    </div>
</body>

</html>






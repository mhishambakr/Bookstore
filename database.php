<div class="database">

    <?php


    // if (isset($_SESSION["email"])){
        
    // } else{
    //     header('Location: home.php');
    // }

    class Database{
        public $servername;
        public $dbuser;
        public $dbpassword;
        public $dbname;
        public $conn;
        // function __construct($serverName){ 
        //     echo "Welcome to our site<br>";
        // }
        // function __destruct(){
        //     echo "Thank You<br>";
            
        // }

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
        public $book;
        
        function presentFromQuery(){
            $this->query = "SELECT `id`, `book_title`, `book_description`, `img`
            FROM `books`";
            $result=$this->conn->QUERY($this->query);
            echo "<div class='book_show'>";
            if ($result->num_rows > 0) { 
                while($row = $result->fetch_assoc()) {
                    echo "<div id='present_query_home'><img src='".$row["img"]."' alt='' width='75' height='100'><br>"." || ".$row["id"]." || ".$row["book_title"]." || ".$row["book_description"]." || "."<br>"."<a href='http://localhost/RouteExam2/book.php?id=".$row["id"]."'> Show ".$row["book_title"]."</a><br>";
                    if (isset($_SESSION["email"])){
                        echo "<a href='http://localhost/RouteExam2/edit.php?id=".$row["id"]."'>edit/delete</a><br>";
                    }
                    echo "</div>";
                }
            } else {
                echo "0 Books in store";
            }
            echo "</div>";
        }
        function presentFromQuerySingle($id){
            $this->query = "SELECT `id`, `book_title`, `book_description`, `img`
            FROM `books`
            WHERE `book_title` ='$id' OR `id` = '$id'";
            echo "<div class='book'>";
            $result=$this->conn->QUERY($this->query);
            if ($result->num_rows > 0) { 
                while($row = $result->fetch_assoc()) { 
                    echo "<img src='".$row["img"]."' alt='' width='250' height='350'><br>";
                    echo " ID: ".$row["id"]."<br>"."Book name: ".$row["book_title"]."<br>"."Description: ".$row["book_description"]."<br>";
                    if (isset($_SESSION["email"])){
                        echo "<a href='http://localhost/RouteExam2/edit.php?id=".$row["id"]."'>edit/delete</a><br>";
                    }
                }
            } else {
                echo "0 Books in store";
            }
            echo "</div>";
        }
        function insertIntoQuery($book_title, $book_description, $img){
            $this->query = "INSERT INTO `books`(`book_title`, `book_description`, `img`) 
            VALUES ('$book_title','$book_description', '$img')";
            $result=$this->conn->QUERY($this->query);
            echo "Added!<br>";
            $this->presentFromQuerySingle($book_title);
        }
        function editQuery($id, $book_title, $book_description, $img){
            $this->query = "UPDATE `books` 
            SET `book_title`='$book_title',`book_description`='$book_description',`img`='$img'
            WHERE `id` = '$id'";
            $result=$this->conn->QUERY($this->query);
            echo "Edited!<br>";
            $this->presentFromQuerySingle($book_title);
        }
        function deleteQuery($id){
            $this->query = "DELETE FROM `books` 
            WHERE `id` = '$id'";
            $result=$this->conn->QUERY($this->query);
            echo "<span id ='delete'>Deleted!<br></span>";
        }
    }


    ?>
</div>
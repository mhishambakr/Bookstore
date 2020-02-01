<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add a Book</title>
    <link rel="stylesheet" href="CSS/stylesheet.css">
    <style>
        #navbar{
            position: relative;
        }
    </style>
</head>

<body>
    <nav id="navbar">
        <a href="home.php" id="" class="navlink">Home</a>
        <a href="logout.php" id="" class="navlink">Logout</a>
    </nav>
    <div class="main">
        <div class="cover">
            <h1>Add a Book</h1>
        </div>
        <div id="form_div">
            <form action="form_handle.php" method="post">
                <div>
                    <label for="book_title">Enter book title:</label>
                    <input type="text" name="book_title" id="book_title"><br>
                </div>
                <div id="textarea">
                    <label for="book_description">Enter Book Description:</label>
                    <textarea name="book_description" id="book_description" cols="30" rows="10"></textarea><br>    
                </div>
                <div class="img">
                    <label for="book_pic">Image source:</label>
                    <input type="file" name="img" id="img"><br>
                </div>
                <input type="submit" id='submit_button' name="Register" value="Add">
            </form>
        </div>
    </div>
</body>

</html>




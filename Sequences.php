<?php
/**
 * Created by PhpStorm.
 * User: DragomirGalinov
 * Date: 26/10/2018
 * Time: 12:54
 */
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Nunito"/>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="ckeditor/ckeditor.js"></script>
</head>
<body style="font-family: 'Nunito', sans-serif;background:#d9d9d9">
<div class="topnav">
    <a href="index.php">Dashboard</a>
    <a class="active" href="Sequences.php">Sequences</a>
</div>
<div class="topnavS">
    <a class="active" href="Sequences.php">Newsletter</a>
    <a href="challengeaudit.php">Challenge Audit</a>
    <a href="webinars.php">Webinars</a>
    <a href="blog.php">Blog</a>
</div>
<div>
    <div class="vertical-menu">
        <a class="active" href="#" class="circle">+</a>
        <a href="#">Step 1</a>
        <a href="#">Step 2</a>
        <a href="#">Step 3</a>
    </div>
    <form action="" method="post">
        <textarea class="ckeditor" name="editor"></textarea>
        <input type="submit" value="INSERT">
    </form>
</div>

</body>
</html>
<?php
    if(isset($_POST['editor'])){
        $text = $_POST['editor'];

        // connect to db

        $conn = mysqli_connect('localhost','root','','bd_leads') OR DIE("ERROR WITH THE CONNECT");

        // insert the data

        $query = mysqli_query($conn, "INSERT INTO mails(text) VALUES ('$text')");
        if($query){
            echo "ADDED INTO DB";
        } else {
            echo "ERROR WHILE INSERTING";
        }
    }
?>
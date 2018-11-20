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
    <a href="Sequences.php">Newsletter</a>
    <a class="active" href="challengeaudit.php">Challenge Audit</a>
    <a href="webinars.php">Webinars</a>
    <a href="blog.php">Blog</a>
</div>
<div class="editor">
    <textarea class="ckeditor" name="editor"></textarea>
    <script>
        CKEDITOR.replace( 'editor1' );
    </script>
</div>
</body>
</html>
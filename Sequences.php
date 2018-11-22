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
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet"
              id="bootstrap-css">
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
    <section class="indent-1">
        <section style="width: 10%">
            <div class="vertical-menu">
                <?php
                $idComparado = "";
                require("db_connection.php");

                $query = "SELECT * FROM newslettermail";
                if (!$result = mysqli_query($con, $query)) {
                    exit(mysqli_error($con));
                }

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $idComparado = $row['id'];
                        echo "<a  onclick='onStepClicked($idComparado)'>" . $row['name'] . "</a>";
                    }
                    echo "<input type='hidden' id='stepsNum' value='".mysqli_num_rows($result)."'>";
                }
                ?>
                <a class="active" onclick='newStep()'>+</a>
            </div>
        </section>
        <section style='width: 90%' id='new'>
            <form action="" method="post">
                <p>Name of Sequence</p>
                <textarea class="boxInfo" name="nameSequence"></textarea>
                <p>Email Subject</p>
                <textarea class="boxInfo" name="subject"></textarea>
                <p>Email Content</p>
                <textarea class="ckeditor" name="editor"></textarea>
                <input type="submit" value="INSERT">
            </form>
        </section>
        <?php
        $idComparar = "";
        require("db_connection.php");
        $query = "SELECT * FROM newslettermail ";

        if (!$result = mysqli_query($con, $query)) {
            exit(mysqli_error($con));
        } else {

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $idComparar = $row['id'];
                    echo "
                        <section style='width: 90%' id='".$idComparar."'>
                            <form action=\"\" method=\"post\">
                                <div style='width: 90%;' id='".$idComparar."'>
                                    <p>Name of Sequence </p>
                                    <textarea class='boxInfo' name='nameSequence'>" . $row['name'] . "</textarea>
                                    <p>Email Subject</p>
                                    <textarea class='boxInfo' name='subject'>" . $row['subject'] . "</textarea>
                                    <p>Email Content</p>
                                    <textarea class='ckeditor' name='editor'>" . $row['content'] . "</textarea>
                                    <input type='submit' value='INSERT'>
                                </div>
                            </form>
                        </section> ";

                }
            }
        }

        ?>
<script>
    var stepsNum = document.getElementById("stepsNum").value;
    onStepClicked("new");
    function onStepClicked(id){
        if(id != "new"){
            document.getElementById("new").style.display = "none";
        }

        var i;
        for (i = 1; i < stepsNum+1; i++) {
            if(i != id){
                document.getElementById(i).style.display = "none";
            }else{
                document.getElementById(i).style.display = "block";
            }
        }
    }
    function newStep(){
        document.getElementById("new").style.display = "block";

    }
</script>
    </section>

    </body>
    </html>
<?php
if (isset($_POST['nameSequence'])) {
    if (isset($_POST['subject'])) {
        if (isset($_POST['editor'])) {
            $content = $_POST['editor'];
            $subject = $_POST['subject'];
            $nameSequence = $_POST['nameSequence'];

            $conn = mysqli_connect('localhost', 'mytelanto', 'npT4KE5Z', 'bd_leads') OR DIE("ERROR WITH THE CONNECT");

            $query = mysqli_query($conn, "INSERT INTO newslettermail(name, content, subject) VALUES ('$nameSequence', '$content', '$subject')");
            if ($query) {
            } else {
                echo "ERROR WHILE INSERTING";
            }
        }
    }
}

?>
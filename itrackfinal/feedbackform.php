<?php
    session_start();
    require "adminheader.php";
    include_once 'includes/admin.inc.php';     
    if(!isset($_SESSION['userId'])){
        header("Location: index.php");
    }
    if(isset($_POST['feedback-submit'])){
        
        $userId = $_SESSION['userId'];
        $benNum = $_GET['benNum'];
        $feedbackAns = $_POST['feedbackAns'];
        $dateAns = $_POST['dateAns'];
        $process = $_POST['process'];
        $accomodate = $_POST['accomodate'];
        $service = $_POST['service'];

        $sql = "INSERT INTO feedback (userId, benNum, feedbackAns, dateAns, process, accomodate, service)
        VALUES ('$userID', '$benNum', '$feedbackAns', '$dateAns' '$process', '$accomodate', '$service')";      
        if (!$conn->query($sql)){
            $error = "Something went wrong";
        }else{
            header("Location: complainantview.php?");
        }
    }
    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>iTrack</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<style>


</style>

<body>
    <center>
        <form method="POST" id="form">
         <b>1. Ano ang masasabi mo sa pag proseso ng inyong report? 
         <br>
         (What can you say about the processing of the report?)</b>
         <br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="process" id="radio1" value="napakahusay">
                <label class="form-check-label" for="napakahusay">
                Napakahusay
                </label>
            </div>

            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="process" id="radio2" value="mahusay">
                <label class="form-check-label" for="mahusay">
                Mahusay
                </label>
            </div>

            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="process" id="option3" value="hindimahusay">
                <label class="form-check-label" for="hindimahusay">
                Hindi Mahusay
                </label>
            </div>

            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="process" id="questionthree" value="nangangailangan">
                <label class="form-check-label" for="nangangailangan">
                Nangangailangan ng Pagbabago
                </label>
            </div>
            <br>
            <br>

            <b>2. Kumusta ang pakikitungo sayo ng mga police-in-charge
            <br>
            (How well did the police accomodate you?)</b>
            <br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="accomodate" id="radio1" value="napakahusay">
                <label class="form-check-label" for="napakahusay">
                Napakahusay
                </label>
            </div>

            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="accomodate" id="radio2" value="mahusay">
                <label class="form-check-label" for="mahusay">
                Mahusay
                </label>
            </div>

            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="accomodate" id="option3" value="hindimahusay">
                <label class="form-check-label" for="hindimahusay">
                Hindi Mahusay
                </label>
            </div>

            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="accomodate" id="questionthree" value="nangangailangan">
                <label class="form-check-label" for="nangangailangan">
                Nangangailangan ng Pagbabago
                </label>
            </div>
            <br>
            <br>

            <b>3. Sa kabuuan, ano ang masasabi mo sa serisyo ng mga police na nag-aasikaso sayo? 
            <br>
            (What can you say about the service of the police-in-charged who accomodated you?)</b>
            <br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="service" id="radio1" value="napakahusay">
                <label class="form-check-label" for="napakahusay">
                Napakahusay
                </label>
            </div>

            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="service" id="radio2" value="mahusay">
                <label class="form-check-label" for="mahusay">
                Mahusay
                </label>
            </div>

            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="service" id="option3" value="hindimahusay">
                <label class="form-check-label" for="hindimahusay">
                Hindi Mahusay
                </label>
            </div>

            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="service" id="questionthree" value="nangangailangan">
                <label class="form-check-label" for="nangangailangan">
                Nangangailangan ng Pagbabago
                </label>
            </div>
            <br>
            <br>
            <div class="form-group">
            <b> Komento at Suhestiyon? (Comments and Suggestions) </b>
            <br>
            <textarea name="comment" rows="5" cols="50"></textarea>
            </div>

            <button type="submit" name="feedback-submit" class="btn btn-primary">Submit</button>
        </form>

    </center>

<script src="js/jquery-3.3.1.slim.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>

</body>

</html>


<?php
	require "viewingfooter.php";
?>

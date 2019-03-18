<?php
session_start();
	require "viewingheader.php";
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
    <?php if(!isset($_GET['status'])){?>
        <form action="includes/feedbackform.inc.php" method="POST">
         <b>1. Ano ang masasabi mo sa pag proseso ng inyong report?
         <br>
         (What can you say about the processing of the report?)</b>
         <br>
            <div class="form-check form-check-inline">
                <input id="process_napakahusay" class="form-check-input" type="radio" name="process" value="napakahusay" required> 
                <label class="form-check-label" for="process_napakahusay">
                Napakahusay
                </label>
            </div>

            <div class="form-check form-check-inline">
                <input id="process_mahusay" class="form-check-input" type="radio" name="process" id="radio2" value="mahusay" required>
                <label class="form-check-label" for="process_mahusay">
                Mahusay
                </label>
            </div>

            <div class="form-check form-check-inline">
                <input id="process_hindimahusay" class="form-check-input" type="radio" name="process" id="option3" value="hindimahusay" required>
                <label class="form-check-label" for="process_hindimahusay">
                Hindi Mahusay
                </label>
            </div>

            <div class="form-check form-check-inline">
                <input id = "process_nangangailangan" class="form-check-input" type="radio" name="process" id="questionthree" value="nangangailangan" required>
                <label class="form-check-label" for="process_nangangailangan">
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
                <input id="accomodate_napakahusay"class="form-check-input" type="radio" name="accomodate" id="radio1" value="napakahusay" required>
                <label class="form-check-label" for="accomodate_napakahusay">
                Napakahusay
                </label>
            </div>

            <div class="form-check form-check-inline">
                <input id="accomodate_mahusay"class="form-check-input" type="radio" name="accomodate" id="radio2" value="mahusay" required>
                <label class="form-check-label" for="accomodate_mahusay">
                Mahusay
                </label>
            </div>

            <div class="form-check form-check-inline">
                <input id="accomodate_hindimahusay"class="form-check-input" type="radio" name="accomodate" id="radio3" value="hindimahusay" required>
                <label class="form-check-label" for="accomodate_hindimahusay">
                Hindi Mahusay
                </label>
            </div>

            <div class="form-check form-check-inline">
                <input id="accomodate_nangangailangan"class="form-check-input" type="radio" name="accomodate" id="radio4" value="nangangailangan" required>
                <label class="form-check-label" for="accomodate_nangangailangan">
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
                <input id="service_napakahusay" class="form-check-input" type="radio" name="service" id="radio1" value="napakahusay" required>
                <label class="form-check-label" for="service_napakahusay">
                Napakahusay
                </label>
            </div>

            <div class="form-check form-check-inline">
                <input id="service_mahusay" class="form-check-input" type="radio" name="service" id="radio2" value="mahusay" required> 
                <label class="form-check-label" for="service_mahusay">
                Mahusay
                </label>
            </div>

            <div class="form-check form-check-inline">
                <input id="service_hindimahusay" class="form-check-input" type="radio" name="service" id="option3" value="hindimahusay" required>
                <label class="form-check-label" for="service_hindimahusay">
                Hindi Mahusay
                </label>
            </div>

            <div class="form-check form-check-inline">
                <input id="service_nangangailangan" class="form-check-input" type="radio" name="service" id="questionthree" value="nangangailangan" required>
                <label class="form-check-label" for="service_nangangailangan">
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

            <input type="hidden" name="benNum" value="<?php echo $_GET['id']; ?>">
            <button type="submit" name="submit-feedback" class="btn btn-primary">Submit</button>
        </form>
    <?php }else{ ?>
        Yay!!! Thanks
    <?php } ?>

</center>

<script src="js/jquery-3.3.1.slim.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>

</body>

</html>


<?php
	require "viewingfooter.php";
?>

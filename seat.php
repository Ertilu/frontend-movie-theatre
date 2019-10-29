<?php
session_start();
if(!isset($_SESSION["login"])) {
	header("Location: login.php");
}
require 'config/API.php';
$get_data = callAPI('GET', 'http://restful-api-movie-theatre.herokuapp.com/seat', false);
$response = json_decode($get_data, true);
$errors = $response['error'];
$seats = $response['data'];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Select Seat</title>
    <!-- Meta-Tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta name="keywords" content="Movie Seat Selection">
    <script>
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!-- //Meta-Tags -->
    <!-- Index-Page-CSS -->
    <link rel="stylesheet" href="css/seat.css" type="text/css" media="all">
    <!-- //Custom-Stylesheet-Links -->
    <!--fonts -->
    <link href="//fonts.googleapis.com/css?family=Source+Sans+Pro:200,200i,300,300i,400,400i,600,600i,700,700i,900,900i" rel="stylesheet">
    <!-- //fonts -->
</head>

<body onload="onLoaderFunc()">
    <h1>Movie Seat Selection</h1>
    <div class="container">

        <div class="w3ls-reg">
            <div class="agileits-left">
                <p><a href="index.php" rel="noopener noreferrer">Back to home</a></p>
            </div>
            <!-- input fields -->
            <div class="inputForm">
                <h2>fill the required details below and select your seats</h2>
                <div class="mr_agilemain">
                    <div class="agileits-right">
                        <label> Number of Seats
                            <span>*</span>
                        </label>
                        <input type="number" id="Numseats" required min="1">
                    </div>
                </div>
                <button onclick="takeData()">Start Selecting</button>
            </div>
            <!-- //input fields -->
            <!-- seat availabilty list -->
            <ul class="seat_w3ls">
                <li class="smallBox greenBox">Selected Seat</li>

                <li class="smallBox redBox">Reserved Seat</li>

                <li class="smallBox emptyBox">Empty Seat</li>
            </ul>
            <!-- seat availabilty list -->
            <!-- seat layout -->
            <div class="seatStructure txt-center" style="overflow-x:auto;">
                <table id="seatsBlock">
                    <p id="notification"></p>
                    <tr>
                        <?php  
                            $i=0;
                            for ($j=0; $j <= 12; $j++) : 
                            ?>                              
                            <td>        
                                <label for="<?= $seats[$j]["_id"] ?>" style="position: absolute; color:black; margin-left:8px; margin-top:7px; font-size: 8px;"><?= $seats[$j]["name"] ?></label>
                                <input type="checkbox" class="seats" value="<?= $seats[$j]["name"] ?>" data-id="<?= $seats[$j]["_id"] ?>">
                            </td>
                        <?php 
                        $i++;
                        endfor; ?>
                    </tr>
                    <tr>
                        <?php  
                            $i=0;
                            for ($j=12; $j <= 24; $j++) : 
                            ?>  
                            <td>                                
                                <label for="<?= $seats[$j]["_id"] ?>" style="position: absolute; color:black; margin-left:8px; margin-top:7px; font-size: 8px;"><?= $seats[$j]["name"] ?></label>
                                <input type="checkbox" class="seats" value="<?= $seats[$j]["name"] ?>" data-id="<?= $seats[$j]["_id"] ?>">
                            </td>
                        <?php 
                        $i++;
                        endfor; ?>
                    </tr>
                    <tr>
                        <?php  
                            $i=0;
                            for ($j=24; $j <= 36; $j++) : 
                            ?>  
                            <td>                                
                                <label for="<?= $seats[$j]["_id"] ?>" style="position: absolute; color:black; margin-left:8px; margin-top:7px; font-size: 8px;"><?= $seats[$j]["name"] ?></label>
                                <input type="checkbox" class="seats" value="<?= $seats[$j]["name"] ?>" data-id="<?= $seats[$j]["_id"] ?>">
                            </td>
                        <?php 
                        $i++;
                        endfor; ?>
                    </tr>
                    <tr>
                        <?php  
                            $i=0;
                            for ($j=36; $j <= 48; $j++) : 
                            ?>  
                            <td>                                
                                <label for="<?= $seats[$j]["_id"] ?>" style="position: absolute; color:black; margin-left:8px; margin-top:7px; font-size: 8px;"><?= $seats[$j]["name"] ?></label>
                                <input type="checkbox" class="seats" value="<?= $seats[$j]["name"] ?>" data-id="<?= $seats[$j]["_id"] ?>">
                            </td>
                        <?php 
                        $i++;
                        endfor; ?>
                    </tr>
                    <tr>
                        <?php  
                            $i=0;
                            for ($j=48; $j <= 60; $j++) : 
                            ?>  
                            <td>                                
                                <label for="<?= $seats[$j]["_id"] ?>" style="position: absolute; color:black; margin-left:8px; margin-top:7px; font-size: 8px;"><?= $seats[$j]["name"] ?></label>
                                <input type="checkbox" class="seats" value="<?= $seats[$j]["name"] ?>" data-id="<?= $seats[$j]["_id"] ?>">
                            </td>
                        <?php 
                        $i++;
                        endfor; ?>
                    </tr>
                    <tr>
                        <?php  
                            $i=0;
                            for ($j=60; $j <= 72; $j++) : 
                            ?>  
                            <td>                                
                                <label for="<?= $seats[$j]["_id"] ?>" style="position: absolute; color:black; margin-left:8px; margin-top:7px; font-size: 8px;"><?= $seats[$j]["name"] ?></label>
                                <input type="checkbox" class="seats" value="<?= $seats[$j]["name"] ?>" data-id="<?= $seats[$j]["_id"] ?>">
                            </td>
                        <?php 
                        $i++;
                        endfor; ?>
                    </tr>
                    <tr>
                        <?php  
                            $i=0;
                        for ($j=72; $j <= 79; $j++) : 
                            ?>  
                            <td>
                                
                                <label for="<?= $seats[$j]["_id"] ?>" style="position: absolute; color:black; margin-left:8px; margin-top:7px; font-size: 8px;"><?= $seats[$j]["name"] ?></label>
                                <input type="checkbox" class="seats" value="<?= $seats[$j]["name"] ?>" data-id="<?= $seats[$j]["_id"] ?>">
                            </td>
                        <?php 
                        $i++;
                        endfor; ?>
                        <?php  
                            $i=0;
                            for ($j=0; $j <= 4; $j++) : 
                            ?>  
                            <td>
                                
                                <label for="<?= $seats[$j]["_id"] ?>" style="position: absolute; color:black; margin-left:8px; margin-top:7px; font-size: 8px;"><?= $seats[$j]["name"] ?></label>
                                <input type="checkbox" class="seats" value="<?= $seats[$j]["name"] ?>" data-id="<?= $seats[$j]["_id"] ?>">
                            </td>
                        <?php 
                        $i++;
                        endfor; ?>
                    </tr>
                    
                </table>

                <div class="screen">
                    <h2 class="wthree">Screen this way</h2>
                </div>
                <button onclick="updateTextArea('<?= $_SESSION["user"]["name"]; ?>', '<?= $_SESSION["user"]["_id"]; ?>')">Confirm Selection</button>
            </div>
            <!-- //seat layout -->
            <!-- details after booking displayed here -->
            <div class="displayerBoxes txt-center" id="table" style="overflow-x:auto;">
            </div>
            <!-- //details after booking displayed here -->
        </div>
    </div>
    <!-- js -->
    <script src="js/jquery.min.js"></script>
    <!-- //js -->
    <!-- script for seat selection -->
    <script src="js/seat.js"></script>
    <!-- //script for seat selection -->
</body>

</html>
<?php

    if(isset($_POST["submit"])) {
     
        $gallonsRequested = $_POST["Gallons"];
       // $deliveryAddress = $_POST["deliveryAddress"];
        $deliveryDate = $_POST["deliveryDate"];
        //$totalAmount = $_POST["totalAmount"];

        //$gallonsRequested = "test";
        //$deliveryDate = 10;

        if(empty($gallonsRequested) || empty($deliveryDate)) {
            if(empty($gallonsRequested) && !empty($deliveryDate)) {
                header("location: ../fuel-form.php?error=emptyGallons");
            }
            else if(!empty($gallonsRequested) && empty($deliveryDate)) {
                header("location: ../fuel-form.php?error=emptyDate");
            }
            else {
                header("location: ../fuel-form.php?error=emptyInput");
            }
            exit();
        }
        else if(gettype($deliveryDate) !== "string" && !is_numeric($gallonsRequested)) {
            header("location: ../fuel-form.php?error=invalidInput");
            exit();
        }
        else if(!is_numeric($gallonsRequested)) {
            header("location: ../fuel-form.php?error=invalidGallons");
            exit();
        }
        else if(gettype($deliveryDate) !== "string") {
            header("location: ../fuel-form.php?error=invalidDate");
            exit();
        }
        else if($gallonsRequested < 0) {
            header("location: ../fuel-form.php?error=invalidGallons");
            exit();
        }

       /* $user = 'root';
        $pass = '';
        $db = 'fuel_firm_db';
        
        $db = new mysqli("localhost", $user, $pass, $db, 3307) or die("Unable to Connect");*/



        header("location: ../fuel-history.php");
    }
   
  
 






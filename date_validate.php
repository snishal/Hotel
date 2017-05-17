<?php
    if(isset($_POST['submit_date'])){
        $check_in = strtotime($_POST['check-in']);
        $check_out = strtotime($_POST['check-out']);
        if($check_in < time() || $check_out < time() || $check_in > $check_out || ($check_out-$check_in)/(60*60*24) > 365){
            $_SESSION['date_validate'] = false;
        }
        else{
            $_SESSION['date_validate'] = true;
        }
    }
?>
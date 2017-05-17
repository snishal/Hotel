<?php

   if($_SESSION['date_validate']){
        $conn = new mysqli("localhost","root","snishal","hotelcs");
        $query = "Select * from rooms r where r.roomno not in (SELECT roomno from room_date where (check_in <= '$check_in' and check_out >= '$check_out') or (check_in >= '$check_in' and check_in <= '$check_out') or (check_out >= '$check_in' and check_out <= '$check_in')) group by ";
        $result = $conn->query($query);
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                echo $row['roomtype']."<br/>";
            }
        }
    }

?>
<?php
    if(isset($_POST['search'])){
        $check_in_date = $_POST['check-in'];
        $check_out_date = $_POST['check-out'];
        $check_in = strtotime($check_in_date);
        $check_out = strtotime($check_out_date);
        $_SESSION['check-in'] = $check_in_date;
        $_SESSION['check-out'] = $check_out_date;
        $num_days = ($check_out-$check_in)/(60*60*24);
        $_SESSION['num-days'] = $num_days;
        if($check_in >= time() && $check_out >= time() && $check_in < $check_out && $num_days <= 30 && ($check_in <= time()+ 365*24*60*60) && ($check_out <= time()+ 365*24*60*60)){
            $conn = mysqli_connect("localhost","root","snishal","hotelcs");
            $query = "Create table available(roomtype varchar(30));";
            $result = mysqli_query($conn, $query) or die("Query Failed".mysql_error());
            $query = "Insert into available Select r.roomtype from rooms r where r.roomno not in (SELECT roomno from room_date where ('$check_in_date' <= check_in and '$check_out_date' <= check_out and '$check_out_date' >= check_in) or ('$check_in_date' >= check_in  and  '$check_out_date' <= check_out) or ('$check_in_date' >= check_in and '$check_out_date' >= check_out and '$check_in_date' <= check_out)) group by r.roomtype;";
            if(mysqli_query($conn, $query)){
                $query = "Select * from available where roomtype='Standard Single Room';";
                $result = mysqli_query($conn, $query) or die("hello".mysql_error());
                $count = 0;
                if(mysqli_num_rows($result) == 0){
                    echo "<script>document.getElementById('1').style.visibility = 'hidden';</script>";                    
                    $count++;
                }
                $query = "Select * from available where roomtype='Standard Double Room';";
                $result = mysqli_query($conn, $query) or die("hello".mysql_error());
                if(mysqli_num_rows($result) == 0){
                    echo "<script>document.getElementById('2').style.visibility = 'hidden';</script>";                    
                    $count++;
                }
                $query = "Select * from available where roomtype='Deluxe Single Room';";
                $result = mysqli_query($conn, $query) or die("hello".mysql_error());
                if(mysqli_num_rows($result) == 0){
                    echo "<script>document.getElementById('3').style.visibility = 'hidden';</script>";                    
                    $count++;
                }
                $query = "Select * from available where roomtype='Deluxe Double Room';";
                $result = mysqli_query($conn, $query) or die("hello".mysql_error());
                if(mysqli_num_rows($result) == 0){
                    echo "<script>document.getElementById('4').style.visibility = 'hidden';</script>";                    
                    $count++;
                }
                $query = "Select * from available where roomtype='Super Deluxe Single Room';";
                $result = mysqli_query($conn, $query) or die("hello".mysql_error());
                if(mysqli_num_rows($result) == 0){
                    echo "<script>document.getElementById('5').style.visibility = 'hidden';</script>";                    
                    $count++;
                }
                $query = "Select * from available where roomtype='Super Deluxe Double Room';";
                $result = mysqli_query($conn, $query) or die("hello".mysql_error());
                if(mysqli_num_rows($result) == 0){
                    echo "<script>document.getElementById('6').style.visibility = 'hidden';</script>";                    
                    $count++;
                }
                if($count == 6 ){
                    echo "<script>document.getElementById('alertbut').innerHTML = 'No Rooms Available....Try Another Dates';</script>";
                    echo "<script>document.getElementById('alertbut').style.backgroundColor = '#f44336';</script>";
                    echo "<script>document.getElementById('alertbut').style.display = 'block';</script>";
                }
                else{
                    echo "<script>document.getElementById('alertbut').style.display = 'block';</script>";
                }
            }
            $query = "Drop table available;";
            $result = mysqli_query($conn, $query) or die("fail".mysql_error());
            mysqli_close($conn);
        }
        else{
            echo "<script>
                    var modal = document.getElementById('myModal');
                    modal.style.display = 'block';
                  </script>";
        } 
    }
?>
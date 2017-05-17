<?php
    if(isset($_POST['cancel'])){
        $check_in_date = $_POST['arrival'];
        $check_out_date = $_POST['depart'];
        $roomno = $_POST['roomno'];
        $check_in = strtotime($check_in_date);
        $check_out = strtotime($check_out_date);
        if($check_in >= time() && $check_out >= time() && $check_in < $check_out){
        $conn = mysqli_connect("localhost","root","snishal","hotelcs");
        
        $query = "DELETE FROM reservation where arrival = '$check_in_date' and depart = '$check_out_date' and roomno = '$roomno'";
            if(mysqli_query($conn, $query)){
                $query = "DELETE FROM room_date where check_in = '$check_in_date' and check_out = '$check_out_date' and roomno = '$roomno'"; 
                mysqli_query($conn, $query);
                echo "<script>
                                var modal = document.getElementById('myModal');
                                var header = document.getElementById('modalheader');
                                var body = document.getElementById('modalbody');
                                var footer = document.getElementById('modalfooter');
                                footer.innerHTML = '<h3>Successful</h3>';
                                header.style.backgroundColor = 'green';
                                footer.style.backgroundColor = 'green';
                                body.innerHTML = 'Your Reservation has been cancelled';
                                modal.style.display = 'block';
                              </script>";
                  
            }
            else{
            echo "<script>
                    var modal = document.getElementById('myModal');
                    modal.style.display = 'block';
                  </script>";
            }
            mysqli_close($conn);
        }
    }
 
?>
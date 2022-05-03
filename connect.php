<?php

if( !isset($_POST['name'])){
    echo "Bad Input";
}else{
    //database connection
    $conn = new mysqli('localhost', 'root', '', 'bikerent');
    if($conn->connect_error){
        die('Connection Failed : '.$conn->connect_error);
    }else{
        
        $name = $_POST['name'];
        $email = $_POST['email'];
        $number = $_POST['number'];
        $bikes = $_POST['bikes'];
        $pickdate = $_POST['book_pick_date'];
        $dropdate = $_POST['book_off_date'];
        $bikename = $_POST['bike_name'];
        
        echo $name;

        $stmt = $conn->prepare("insert into booking(name, email, number, bikes, pickdate, dropdate, bikename) values(?, ?, ?, ?, ?, ?,?)");
        $stmt->bind_param("ssiisss", $name, $email, $number, $bikes , $pickdate, $dropdate, $bikename);
        $stmt->execute();

        echo " Your booking has been confirmed";

        $stmt->close();
        $conn->close();
    }  
}


?>





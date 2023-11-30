<?php
    $conn = mysqli_connect("localhost:3307","root","","jookebox");
    if (!$conn) {
        die(mysqli_error($conn));
    }
?>
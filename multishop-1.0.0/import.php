<?php
$con = mysqli_connect("localhost", "root", "", "test");

if (isset($_POST['submit'])) {
    if (!empty($_FILES['upload']['name'])) {
        $file_name = $_FILES['upload']['tmp_name'];

        if (($handle = fopen($file_name, "r")) !== false) {
            while (($data = fgetcsv($handle, 1000, ",")) !== false) {
                if (count($data) >= 2) {
                    $img = mysqli_real_escape_string($con, $data[0]);
                    $pname = mysqli_real_escape_string($con, $data[1]);
                    $price = mysqli_real_escape_string($con, $data[2]);
                    $category = mysqli_real_escape_string($con, $data[3]);
                    $details = mysqli_real_escape_string($con, $data[4]);


                    $sql = "INSERT INTO demo (img,pname,price,category,details) VALUES ('$img', '$pname','$price','$category','$details')";
                    mysqli_query($con, $sql);
                }
            }
            fclose($handle);
   }
}
}
?>
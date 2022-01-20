<?php 

include "config.php";


  if (isset($_POST['submit'])) {

    $pname = $_POST['pname'];

    $pdesc = $_POST['pdesc'];

    $pdest = $_POST['pdest'];

    $dsent = $_POST['dsent'];

    $darrive = $_POST['darrive'];

    $sql = "INSERT INTO `products`(`pname`, `pdesc`, `pdest`, `dsent`, `darrive`) VALUES (' $pname','$pdesc','$pdest','$dsent','$darrive')";

    $result = $conn->query($sql);

    if ($result == TRUE) {

      echo "New Product Added Successfully.";

    }else{

      echo "Error:". $sql . "<br>". $conn->error;

    } 

    $conn->close(); 

  }

?>

<!DOCTYPE html>

<html>

<head>

<head>

<title>Add Product</title>

<style type="text/css">
        fieldset {
            margin: auto;
            margin-top: 100px;
            width: 70%;
        }
 
        input {
            padding-top: 8px;
        }
    </style>

</head>

</head>

<body>

<h2>New Product</h2>

<form action="" method="POST">

  <fieldset>

    <legend>Add New Product:</legend>

    Product Name :

    <input type="text" name="pname"  maxlength="12" required>

    <br>
    <br>

    Product Description:

    <input type="text" name="pdesc" maxlength="12" required>

    <br>
    <br>

    Product Destination:

    <input type="text" name="pdest" maxlength="12" required>

    <br>
    <br>

    Dispatch Date:

    <input type="datetime-local" name="dsent" maxlength="12" required>

    <br>
    <br>

    Estimated Date Of Delivery:

    <input type="datetime-local" name="darrive" maxlength="12" required>

    <br><br>

    <input type="submit" name="submit" value="submit">

    <a href="view.php">Back</a>

  </fieldset>

  

</form>

</body>

</html>
